<!doctype html>
<html>

<head>
    @include('new_my_partials.new_head')
</head>

<body class="d-flex flex-column min-vh-100">

    @include('new_my_partials.new_header')

    <div class="container text-center">
        <div class="row justify-content-center mt-2 g-5">
            <div class="col-md-10 col-lg-8">
                <div class="card">
                    <div class="card-body" style="padding: 2rem;">
                        <h5 class="card-title">Chcete hľadať podľa názvu mesta alebo podniku?</h5>
                        <a href="{{ route('new_choosing_city') }}" class="btn btn-primary" style="margin-top: 1.5rem;">
                            Podľa mesta
                        </a>
                        </br>
                        <a href="{{ route('new_choosing_firm') }}" class="btn btn-primary" style="margin-top: 1.5rem;">
                            Podľa podniku
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row flex-lg-row-reverse align-items-center p-5 g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="{{ asset('/my_images/index-scheduler.webp') }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
        <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
        </div>
      </div>
    </div>

    @include('new_my_partials.new_footer')

</body>

</html>