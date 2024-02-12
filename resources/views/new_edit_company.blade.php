<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Welcome page') }} --}}
            Akutalizácia podniku
        </h2>
    </x-slot>

    <div class="mt-10 mx-auto max-w-md">
        @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 " role="alert">
            <p class="font-bold">{{ session('success') }}</p>
        </div>
        @endif

        <form method="post" action="{{ route('new_companies.update', $company->id) }}" enctype="multipart/form-data">
            @csrf
            <label>Názov podniku</label>
            </br>
            <input type="text" value="{{ $company->name }}" name="name" id="name" class="ownInputs" required>
            </br>
            </br>
            <label>Mesto</label>
            </br>
            <input type="text" value="{{ $company->city }}" name="city" id="city" class="ownInputs" required>
            </br>
            </br>
            <label>Kategória</label>
            </br>
            <input type="text" value="{{ $company->category }}" name="category" id="category" class="ownInputs" required>
            </br>
            </br>
            <label>Adresa</label>
            </br>
            <input type="text" value="{{ $company->address }}" name="address" id="address" class="ownInputs" required>
            </br>
            </br>
            @if(isset($company->image))
            <img src="{{ "/" . $company->image }}" alt="" style="max-width: 25%; height: auto;">
            @endif
            <input type="file" name="image" id="image" class="ownInputs">
            </br>
            </br>
            <input type="submit" value="Odoslať" class="ownSubmits" style="background: rgb(62, 62, 237); color: white;" required>
        </form>

        <form method="post" action="{{ route('new_companies.destroy', $company->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="submit" value="Odstrániť podnik" class="ownSubmits" style="margin-top: 15px ;background: red; color: white;" required>
        </form>
    </div>
</x-app-layout>