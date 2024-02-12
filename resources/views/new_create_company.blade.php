<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Welcome page') }} --}}
            Vytvorenie podniku
        </h2>
    </x-slot>
    {{-- <div class="mx-auto mt-10 w-full lg:w-3/4">
        <form method="post" action="{{ route('new_companies.store') }}" enctype="multipart/form-data"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Názov
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" type="text" placeholder="Názov">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                    Mesto
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="city" type="text" placeholder="Mesto">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                    Kategória
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="category" type="text" placeholder="Kategória">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                    Adresa
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="address" type="text" placeholder="Adresa">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                    Fotka podniku
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="image" type="file" id="image">
            </div>

            <input type="submit" value="Odoslať" class="ownSubmits">
        </form>
    </div> --}}

    <div class="mt-10 mx-auto max-w-md">
        @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 " role="alert">
            <p class="font-bold">{{ session('success') }}</p>
        </div>
        @endif

        <form method="post" action="{{ route('new_companies.store') }}" enctype="multipart/form-data">
            @csrf
            <label>Názov podniku</label>
            </br>
            <input type="text" name="name" id="name" class="ownInputs" required>
            </br>
            </br>
            <label>Mesto</label>
            </br>
            <input type="text" name="city" id="city" class="ownInputs" required>
            </br>
            </br>
            <label>Kategória</label>
            </br>
            <input type="text" name="category" id="category" class="ownInputs" required>
            </br>
            </br>
            <label>Adresa</label>
            </br>
            <input type="text" name="address" id="address" class="ownInputs" required>
            </br>
            </br>
            <input type="file" name="image" id="image" class="ownInputs">
            </br>
            </br>
            <input type="submit" value="Odoslať" class="ownSubmits" style="background: rgb(62, 62, 237); color: white;" required>
        </form>
    </div>
</x-app-layout>