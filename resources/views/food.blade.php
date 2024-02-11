<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Food') }}
        </h2>
    </x-slot>

    <div class="flex py-12">
        <div class="max-w-7xl mx-auto px-6">
            <form method="post" action="{{ route('food.create') }}" enctype="multipart/form-data">
                @csrf
                <label>Názov jedla</label>
                </br>
                <input type="text" name="name" id="name" class="ownInputs">
                </br>
                </br>
                <label>Cena jedla</label>
                </br>
                <input type="number" step="0.01" name="price" id="price" class="ownInputs">
                </br>
                </br>
                <input type="file" name="image" id="image" class="ownInputs">
                </br>
                </br>
                <input type="submit" value="Odoslať" class="ownSubmits">
            </form>
        
            </br>
            <h1 style="color: blue; font-weight: bold;;">Všetky jedlá</h1>
            @if(isset($food))
            @foreach( $food as $oneFood )
            {{ $oneFood->name }}
            {{ $oneFood->price }}
            {{-- if pretoze najskor som nemal dostupne obrazky --}}
            @if(isset($oneFood->image))
                <img src="{{ $oneFood->image }}" alt="" style="width: 70px; height: 100px;">
            @endif
            </br>
            @endforeach
            @endif
        </div>
    </div>
</x-app-layout>


{{--
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="p-4">


    @if (Route::has('login'))
    <div class="text-right">
        <a href="{{ route('food') }}" class="" id="navJedlo">Jedlo</a>
        @auth
        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="">Log in</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4">
            Register</a>
        @endif
        @endauth
    </div>
    @endif
    <form method="post" action="{{ route('food.create') }}">
        @csrf
        <label>Názov jedla</label>
        </br>
        <input type="text" name="name" id="name" class="ownInputs">
        </br>
        </br>
        <label>Cena jedla</label>
        </br>
        <input type="number" step="0.01" name="price" id="price" class="ownInputs">
        </br>
        </br>
        <input type="submit" value="Odoslať" class="ownSubmits">
    </form>

    </br>
    <h1 style="color: blue; font-weight: bold;;">Všetky jedlá</h1>
    @if(isset($food))
    @foreach( $food as $oneFood )
    {{ $oneFood->name }}
    {{ $oneFood->price }}
    </br>
    @endforeach
    @endif
</body>

</html>
--}}