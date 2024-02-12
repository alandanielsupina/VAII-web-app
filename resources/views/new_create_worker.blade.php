<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Welcome page') }} --}}
            Vytvorenie pracovníka
        </h2>
    </x-slot>

    {{-- <div id="messageFromAjaxWorker" class="alert alert-success text-center" role="alert" style="display: none;">
    </div> --}}

    <div id="messageFromAjaxWorker" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 " style="display: none;" role="alert">
        {{-- <p class="font-bold">{{ session('success') }}</p> --}}
    </div>
    <div class="mt-10 mx-auto max-w-md">
        {{-- @if ($message = Session::get('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 " role="alert">
            <p class="font-bold">{{ session('success') }}</p>
        </div>
        @endif --}}

        <form id="addworker" method="post" action="{{ route('new_workers.ajax.store') }}">
            @csrf
            <label>Meno</label>
            </br>
            <input type="text" name="name" id="name" class="ownInputs" required>
            </br>
            </br>
            <label>Profesia</label>
            </br>
            <input type="text" name="profession" id="profession" class="ownInputs" required>
            </br>
            </br>
            <label>Instagram</label>
            </br>
            <input type="text" name="instagram" id="instagram" class="ownInputs" required>
            </br>
            </br>
            <input type="submit" value="Odoslať" class="ownSubmits" style="background: rgb(62, 62, 237); color: white;"
                required>
        </form>
    </div>

    <div id="bannerWorker" class="banner">
        <div class="banner-content">
          <h2>Chcete sa pripojiť k tímu?</h2>
          <p>Ak máte záujem pridať sa k nášmu tímu, kontaktujte nás na adrese: alan.supina@gmail.com</p>
          <p>Pre vstup do tímu musíte byť starší ako 18 rokov, mať čistý trestný register.</p>
        </div>
        <img src="https://blog-cdn.everhour.com/blog/wp-content/uploads/2021/01/team-dynamics.jpg">
    </div>

<script type="text/javascript">
        //ajax volanie
$('#addworker').on('submit',function(event) {
    event.preventDefault();

    $.ajax({
        url:"{{ route('new_workers.ajax.store') }}",
        data:$('#addworker').serialize(),
        type:'post',

        success:function(result) {
            $('#messageFromAjaxWorker').css('display','block');
            $('#messageFromAjaxWorker').text(result.message);
            $('#addworker')[0].reset();
        }
    })
});

</script>
</x-app-layout>