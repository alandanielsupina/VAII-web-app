<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Welcome page') }} --}}
            Akutalizácia pracovníka
        </h2>
    </x-slot>

    <div class="mt-10 mx-auto max-w-md">
        @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 " role="alert">
            <p class="font-bold">{{ session('success') }}</p>
        </div>
        @endif

        <form method="post" action="{{ route('new_workers.update', $worker->id) }}">
            @csrf
            <label>Meno</label>
            </br>
            <input type="text" value="{{ $worker->name }}" name="name" id="name" class="ownInputs" required>
            </br>
            </br>
            <label>Profesia</label>
            </br>
            <input type="text" value="{{ $worker->profession }}" name="profession" id="profession" class="ownInputs" required>
            </br>
            </br>
            <label>Instagram</label>
            </br>
            <input type="text" value="{{ $worker->instagram }}" name="instagram" id="instagram" class="ownInputs" required>
            </br>
            </br>
            <input type="submit" value="Odoslať" class="ownSubmits" style="background: rgb(62, 62, 237); color: white;" required>
        </form>

        <form method="post" action="{{ route('new_workers.destroy', $worker->id) }}">
            @csrf
            <input type="submit" value="Odstrániť pracovníka" class="ownSubmits" style="margin-top: 15px ;background: red; color: white;" required>
        </form>
    </div>
</x-app-layout>