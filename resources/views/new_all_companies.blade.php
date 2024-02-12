<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Companies') }} --}}
            Podniky
        </h2>
    </x-slot>

    {{--TODO: pridať spacing medzi jednotlivými buttons. Myslieť na to, že musí fungovať akoboty ten flex-wrao --}}
    <div class="filter-buttons mt-10 flex justify-center items-center">
        <div class="text-center">
            @php
            $tempArray = [];
            $arrayWithoutDuplicities = [];

            foreach ($companies as $val) {
            if (!in_array($val['city'], $tempArray)) {
            $tempArray[] = $val['city'];
            $arrayWithoutDuplicities[] = $val;
            }
            }

            @endphp
            @if(isset($companies) && isset($arrayWithoutDuplicities))
            @foreach( $arrayWithoutDuplicities as $companyWithoutDuplicities )
            @php
            $companyWithoutSpaces = str_replace(' ', '', $companyWithoutDuplicities->city);
            @endphp
            <button
                class="inline-block rounded bg-sky-600 px-8 py-3 text-sm font-medium text-white transition hover:bg-sky-400 hover:shadow-xl focus:outline-none  active:bg-sky-400"
                onclick="filterDivsCompanies('{{ $companyWithoutSpaces }}')">{{
                $companyWithoutDuplicities->city }}</button>
            @endforeach
            <button
                class="inline-block rounded bg-sky-600 px-8 py-3 text-sm font-medium text-white transition hover:bg-sky-400 hover:shadow-xl focus:outline-none  active:bg-sky-400"
                onclick="showAllCompanies()">Zobraziť všetky</button>
            @endif
        </div>
    </div>

    <div class="mt-5">
        <div class="max-w-7xl mx-auto px-2">
            <div class="filterable-divs flex justify-center text-2xl">
                <div id="companiesContainer" class="w-full lg:w-3/4">
                    @if(isset($companies))
                    @foreach( $companies as $companiesContainer )
                    @php
                    $companyWithoutSpaces = str_replace(' ', '', $companiesContainer->city);
                    @endphp
                    <a href="{{ route('new_companies.edit', $companiesContainer->id) }}"
                        class="companiesContainer-link {{ $companyWithoutSpaces }}">
                        <div class="one-firm mb-4">
                            <div class="container-one-firm-card">
                                <div class="flex">
                                    <div class="w-1/4 lg:ml-10">
                                        <h4>{{ $companiesContainer->category }}</h4>
                                    </div>
                                    <div class="w-3/4 lg:mr-10 flex flex-col text-right">
                                        <h4>{{ $companiesContainer->name }}</h4>
                                        <h6 class="text-lg">{{ $companiesContainer->city }}</h6>
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

<script>
function showAllCompanies() {
    let links = document.querySelectorAll('#companiesContainer > a.companiesContainer-link');
    links.forEach(link => {
        link.style.display = 'block';
    });
}

function filterDivsCompanies(className) {
    let links = document.querySelectorAll('#companiesContainer  > a.companiesContainer-link');
    links.forEach(link => {
        link.style.display = 'none';
    });

    let filteredLinks = document.querySelectorAll(`#companiesContainer > a.${className}`);
    filteredLinks.forEach(link => {
        link.style.display = 'block';
    });
}
</script>

</x-app-layout>