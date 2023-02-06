<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /* THIS WORKS WITH MASS ASIGNED ATRIBUTES */
    //The guarded variable allow us to say what columns are out of the scope
    // when creating a new row in this table for MySQL.
    //In this particular case, we are saying that no matter what value is given
    // in the static function "Post::create()" for the column "id", this will
    // be ignored
    protected $guarded = ['id'];
    //fillable is the complete oposite of guarded, where you have to declare, 
    // which columns are allowed to be modified.
    protected $fillable = ['title','excerpt','body','category_id'];

    //This is gonna be usable when in our routers file
    // we dont want to always do a "/posts/{posts:slug}"
    // this way, we can eliminate the slug in the string and 
    // it will look like "/posts/{post}"

    // With the variable "with" we are saying to laravel
    // that everytime that we ask for a post in the database
    // we should also get the information of the author and category
    // that is realated with it. so this means we dont have
    // to specify in the routres/web.php file, that the post
    // should ne loaded with this options.
    protected $with = ['category', 'author'];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query
                    ->where('title', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%');
            }
            );
                
        });
        $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->whereHas('author',function ($query) use ($author){
                    $query->where('username', $author);
            });
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category',function ($query) use ($category){
                    $query->where('slug', $category);
            });
            // $query
            //     ->whereExists(function ($query) use ($category) {
            //         $query
            //             ->from('categories')
            //             ->whereColumn('categories.id','posts.category_id')
            //             ->where('categories.slug',$category);
            //     });
        });
        // if($filters['search'] ?? false){
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')      
        //         ->orWhere('excerpt', 'like', '%' . request('search') . '%');
        // }

            
    }
}

