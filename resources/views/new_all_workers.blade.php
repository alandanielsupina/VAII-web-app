<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Companies') }} --}}
            Pracovníci
        </h2>
    </x-slot>

    <div class="text-center">
        <div class="row justify-content-center mt-2 g-5">
            <div class="">
                <h5 class="mb-5">Naši zamestnanci</h5>

                <div id="zamestnanci">
                    @if(isset($workers))
                    @foreach( $workers as $worker )
                    <div class="jeden-zamestnanec">
                        <div class="udaje-zamestnanca">
                            <h4>{{ $worker->name }}</h4>
                            <p>{{ $worker->profession }}</p>
                            <button class="btn-instagram">{{ $worker->instagram }}</button>
                            <br>
                            <br>
                            <a href="{{ route('new_workers.edit', $worker->id) }}" style="color: white;">Upraviť zamestnanca</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
    </div>

    <script>
                const instagramButtons = document.querySelectorAll(".btn-instagram");
        
        instagramButtons.forEach(button => {
            button.addEventListener("click", function() {
                const instagramUsername = this.textContent;
                const instagramUrl = "https://www.instagram.com/" + instagramUsername + "/";
                window.location.href = instagramUrl;
            });
        });
    </script>
</x-app-layout>