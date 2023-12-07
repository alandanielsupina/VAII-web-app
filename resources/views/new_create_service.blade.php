<!doctype html>
<html>

<head>
    @include('new_my_partials.new_head')

    <style>

    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    @include('new_my_partials.new_header')

    <div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="text-center mb-4">Vytvorenie novej služby</h2>
            <form method="post" action="{{ route('new_services.store') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Názov:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Vložte názov služby" required>
                </div>
                <div class="form-group mb-3">
                    <label for="company_name">Názov podniku:</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Vložte názov podniku" required>
                </div>
                <div class="form-group mb-3">
                    <label for="city_name">Názov mesta:</label>
                    <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Vložte názov mesta" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Potvrdiť</button>
            </form>
        </div>
    </div>
</div>

    @include('new_my_partials.new_footer')

</body>

</html>