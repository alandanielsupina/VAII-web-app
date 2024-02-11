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
                <h2 class="text-center mb-4">Editácia služby</h2>
                <form action="{{ route('new_services.update', $service->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Názov:</label>
                        <input type="text" value="{{ $service->name }}" class="form-control" id="name" name="name"
                            placeholder="Vložte názov služby" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="company_name">Názov podniku:</label>
                        <input type="text" value="{{ $service->company_name }}" class="form-control" id="company_name"
                            name="company_name" placeholder="Vložte názov podniku" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="city_name">Názov mesta:</label>
                        <input type="text" value="{{ $service->city_name }}" class="form-control" id="city_name"
                            name="city_name" placeholder="Vložte názov mesta" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Potvrdiť</button>
                </form>
                <form id="deleteservice" action="{{ route('new_services.destroy', $service->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-3">Odstrániť službu</button>
                </form>
            </div>
        </div>
    </div>

    @include('new_my_partials.new_footer')
</body>

</html>