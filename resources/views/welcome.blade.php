<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uvítacia stránka - všetky služby našich partnerov') }}
        </h2>
    </x-slot>

    <div class="mt-5">
        <div class="max-w-7xl mx-auto px-2">
            <div class="filterable-divs flex justify-center text-2xl">
                <div id="servicesContainer" class="w-full lg:w-3/4">
                    {{-- @if(isset($services))
                    @foreach( $services as $service )
                    @php
                    $serviceWithoutSpaces = str_replace(' ', '', $service->city_name);
                    @endphp
                    <a href="{{ route('new_services.edit', $service->id) }}"
                        class="service-link {{ $serviceWithoutSpaces }}">
                        <div class="one-firm mb-4">
                            <div class="container-one-firm-card">
                                <div class="flex">
                                    <div class="w-1/4 lg:ml-10">
                                        <h4>{{ $service->name }}</h4>
                                    </div>
                                    <div class="w-3/4 lg:mr-10 flex flex-col text-right">
                                        <h4>{{ $service->company_name }}</h4>
                                        <h6 class="text-lg">{{ $service->city_name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @endif --}}
                </div>
            </div>
        </div>
    </div>

    {{-- TODO: vymaž toto divko dole. Tu dole a aj hore mám dva id="servicesContainer", kde sa dávajú služby. Pričom by sa mala dávať, len do horného --}}
    <div id="servicesContainer"></div>

    <div class="flex justify-center items-center mb-5">
        <button id="backToFirstPage"
            class="bg-sky-600 text-white py-2 px-4 rounded-l-lg hover:bg-sky-400 focus:outline-none focus:bg-sky-400">
            Späť na 1
        </button>
        <button id="loadLessButton"
            class="bg-sky-600 text-white py-2 px-4 hover:bg-sky-400 focus:outline-none focus:bg-sky-400">
            < </button>
                <span id="servicesPaginationNumber" class="bg-sky-600 text-white py-2 px-4">
                    1
                </span>
                <button id="loadMoreButton"
                    class="bg-sky-600 text-white py-2 px-4 rounded-r-lg hover:bg-sky-400 focus:outline-none focus:bg-sky-400">
                    >
                </button>
    </div>

    @guest
    <div class="bg-red-500 text-white px-4 py-2 text-center">
        <p class="text-lg font-bold">Pre väčší prístup do aplikácie sa prihláste / registrujte</p>
      </div>
    @endguest
</x-app-layout>