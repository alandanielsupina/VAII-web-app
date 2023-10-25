<!doctype html>
<html>

<head>
    @include('new_my_partials.new_head')

    <style>
        #zamestnanci {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .jeden-zamestnanec{
            border: 1px solid grey;
            border-radius: 3rem;
            transition: 0.3s;
            margin: 1rem;
        }

        .jeden-zamestnanec:hover{
            transform: translate(0, -10px);
        }

        .btn-instagram {
            background-color: blue;
            border: 1px solid black;
            color: white;
            padding: 1.1rem 2rem;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 3rem;
            font-size: 1rem;
        }

        .btn-instagram:hover {
            background-color: white;
            color: blue;
        }

        .udaje-zamestnanca {
            padding: 1.5rem 1.3rem;
        }

        .udaje-zamestnanca h4{
            font-weight: bold;
            color: blue;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    @include('new_my_partials.new_header')

    <div class="container text-center" style="margin-bottom: 3rem;">
        <div class="row justify-content-center mt-2 g-5">
            <div class="col-md-10 col-lg-8 border p-5">
                <h5 class="mb-5">Naši zamestnanci</h5>

                <div id="zamestnanci">

                    <div class="jeden-zamestnanec">
                        <div class="udaje-zamestnanca">
                            <h4>Jožko Mrkvička</h4>
                            <p>Dizajnér</p>
                            <button class="btn-instagram">INSTAGRAM</button>
                        </div>
                    </div>

                    <div class="jeden-zamestnanec">
                        <div class="udaje-zamestnanca">
                            <h4>Jožko Mrkvička</h4>
                            <p>Dizajnér</p>
                            <button class="btn-instagram">INSTAGRAM</button>
                        </div>
                    </div>

                    <div class="jeden-zamestnanec">
                        <div class="udaje-zamestnanca">
                            <h4>Jožko Mrkvička</h4>
                            <p>Dizajnér</p>
                            <button class="btn-instagram">INSTAGRAM</button>
                        </div>
                    </div>

                    <div class="jeden-zamestnanec">
                        <div class="udaje-zamestnanca">
                            <h4>Jožko Mrkvička</h4>
                            <p>Dizajnér</p>
                            <button class="btn-instagram">INSTAGRAM</button>
                        </div>
                    </div>

                    <div class="jeden-zamestnanec">
                        <div class="udaje-zamestnanca">
                            <h4>Jožko Mrkvička</h4>
                            <p>Dizajnér</p>
                            <button class="btn-instagram">INSTAGRAM</button>
                        </div>
                    </div>

                    <div class="jeden-zamestnanec">
                        <div class="udaje-zamestnanca">
                            <h4>Jožko Mrkvička</h4>
                            <p>Dizajnér</p>
                            <button class="btn-instagram">INSTAGRAM</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @include('new_my_partials.new_footer')

</body>

</html>