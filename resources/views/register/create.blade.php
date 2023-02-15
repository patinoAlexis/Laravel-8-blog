<x-layout>
    <section class="px-6 py-8 ">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Register</h1>
                <form method="POST" action="/register" class="mt-10">
                    @csrf
                    {{-- Name --}}
                    <x-form.input name="name"></x-form.input>
                    {{-- Username --}}
                    <x-form.input name="username"></x-form.input>
                    {{-- Email --}}
                    <x-form.input name="email" type="email"></x-form.input>
                    {{-- Password --}}
                    <x-form.input name="password" type="password"></x-form.input>
                    {{-- LOG IN SUBMIT --}}
                    <div class="mt-6">
                        <x-form.button>Submit</x-form.button>
                    </div>
                    @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </form>
            </x-panel>
        </main>

    </section>
</x-layout>