<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

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
    <h1 class="pb-2 mb-3 font-bold border-b border-b-gray-300">
        Úvodná stránka
    </h1>
    <div>
        @auth
        <p>Logged in</p>
        @endauth
        @guest
        <p>Not logged in</p>
        @endguest
    </div>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
</body>

</html>