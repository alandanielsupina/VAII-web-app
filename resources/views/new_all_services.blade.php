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

        a {
            color: inherit;
            /* Prenasleduje farbu textu zo svojho nadradeného elementu */
            text-decoration: none;
            /* Zrušuje podčiarknutie textu */
            cursor: pointer;
            /* Zmení kurzor na ruku pre naznačenie klikateľnosti */
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

                {{--TODO: pridať spacing medzi jednotlivými buttons. Myslieť na to, že musí fungovať akoboty ten flex-wrao --}}
                <div class="filter-buttons mb-3">
                @php
                $tempArray = [];
                $arrayWithoutDuplicities = [];

                foreach ($services as $val) {
                if (!in_array($val['city_name'], $tempArray)) {
                $tempArray[] = $val['city_name'];
                $arrayWithoutDuplicities[] = $val;
                }
                }

                @endphp
                @if(isset($services) && isset($arrayWithoutDuplicities))
                @foreach( $arrayWithoutDuplicities as $serviceWithoutDuplicities )
                @php
                $serviceWithoutSpaces = str_replace(' ', '', $serviceWithoutDuplicities->city_name);
                @endphp
                <button type="button" class="btn btn-warning" onclick="filterDivs('{{ $serviceWithoutSpaces }}')">{{ $serviceWithoutDuplicities->city_name }}</button>
                @endforeach
                <button type="button" class="btn btn-warning" onclick="showAll()">Zobraziť všetky</button>
                @endif
                </div>

                <div class="filterable-divs">
                    @if(isset($services))
                    @foreach( $services as $service )
                    @php
                    $serviceWithoutSpaces = str_replace(' ', '', $service->city_name);
                    @endphp
                    <a href="{{ route('new_services.edit', $service->id) }}" class="service-link {{ $serviceWithoutSpaces }}">
                        <div class="one-firm mb-4">
                            <div class="container-one-firm">
                                <div class="row">
                                    <div class="col">
                                        <h4>{{ $service->name }}</h4>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <h4>{{ $service->company_name }}</h4>
                                        </div>
                                        <div class="row">
                                            <h6>{{ $service->city_name }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

    @include('new_my_partials.new_footer')

    <script>
        function filterDivs(className) {
            let links = document.querySelectorAll('.filterable-divs  > a.service-link');
            links.forEach(link => {
                link.style.display = 'none';
            });

            let filteredLinks = document.querySelectorAll(`.filterable-divs > a.${className}`);
            filteredLinks.forEach(link => {
                link.style.display = 'block';
            });
        }

        function showAll() {
            let links = document.querySelectorAll('.filterable-divs > a.service-link');
            links.forEach(link => {
                link.style.display = 'block';
            });
        }
    </script>

</body>

</html>