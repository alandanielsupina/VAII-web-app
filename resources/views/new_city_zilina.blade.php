<!doctype html>
<html>

<head>
    @include('new_my_partials.new_head')

    <style>
        .one-firm {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .one-firm:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container-one-firm-card {
            padding: 2px 16px;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    @include('new_my_partials.new_header')

    <div class="container text-center" style="margin-bottom: 3rem;">
        <div class="row justify-content-center mt-2 g-5">
            <div class="col-md-10 col-lg-8 border p-5">
                <h5>Služby v meste Žilina</h5>

                <div class="row mb-5">
                    <form method="post" action="#">
                        <div class="d-flex">
                            <input type="text" class="form-control" id="inputCity" placeholder="Názov mesta">
                            <button type="submit" class="btn btn-primary" style="margin-left: 1.3rem;">Vyhľadať</button>
                        </div>
                    </form>
                </div>

                <div class="one-firm mb-4">
                    <div class="container-one-firm">
                        <div class="row">
                            <div class="col">
                                <h4>Kategória</h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Názov firmy</h4>
                                </div>
                                <div class="row">
                                    <h6>Mesto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="one-firm mb-4">
                    <div class="container-one-firm">
                        <div class="row">
                            <div class="col">
                                <h4>Kategória</h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Názov firmy</h4>
                                </div>
                                <div class="row">
                                    <h6>Mesto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="one-firm mb-4">
                    <div class="container-one-firm">
                        <div class="row">
                            <div class="col">
                                <h4>Kategória</h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Názov firmy</h4>
                                </div>
                                <div class="row">
                                    <h6>Mesto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="one-firm mb-4">
                    <div class="container-one-firm">
                        <div class="row">
                            <div class="col">
                                <h4>Kategória</h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Názov firmy</h4>
                                </div>
                                <div class="row">
                                    <h6>Mesto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="one-firm mb-4">
                    <div class="container-one-firm">
                        <div class="row">
                            <div class="col">
                                <h4>Kategória</h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Názov firmy</h4>
                                </div>
                                <div class="row">
                                    <h6>Mesto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="one-firm mb-4">
                    <div class="container-one-firm">
                        <div class="row">
                            <div class="col">
                                <h4>Kategória</h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Názov firmy</h4>
                                </div>
                                <div class="row">
                                    <h6>Mesto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="one-firm mb-4">
                    <div class="container-one-firm">
                        <div class="row">
                            <div class="col">
                                <h4>Kategória</h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Názov firmy</h4>
                                </div>
                                <div class="row">
                                    <h6>Mesto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="one-firm mb-4">
                    <div class="container-one-firm">
                        <div class="row">
                            <div class="col">
                                <h4>Kategória</h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Názov firmy</h4>
                                </div>
                                <div class="row">
                                    <h6>Mesto</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            

            </div>
        </div>
    </div>

    @include('new_my_partials.new_footer')

</body>

</html>