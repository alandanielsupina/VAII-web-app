<!doctype html>
<html>

<head>
    @include('new_my_partials.new_head')
</head>

<body class="d-flex flex-column min-vh-100">

    @include('new_my_partials.new_header')

    <div class="container text-center" style="margin-bottom: 3rem;">
        <div class="row justify-content-center mt-2 g-5">
            <div class="col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-body" style="padding: 2rem;">
                        <h5 class="card-title" style="margin-top: 2rem; margin-bottom: 2rem;">Zadajte názov podniku</h5>
                        <form method="post" action="#">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="inputFirm" placeholder="Názov podniku">
                            </div>
                            <button type="submit" class="btn btn-primary">Vyhľadať</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('new_my_partials.new_footer')

</body>

</html>