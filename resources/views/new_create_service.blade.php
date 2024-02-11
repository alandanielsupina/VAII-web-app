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
                <h2 class="text-center mb-4">Vytvorenie novej služby</h2>
                @if ($message = Session::get('success'))
                {{-- <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div> --}}
                @endif
                <div id="messageFromAjax" class="alert alert-success" role="alert" style="display: none;">
                </div>
                {{-- <form method="post" action="{{ route('new_services.store') }}"> --}}
                    <form method="post" action="{{ route('new_services.ajax.store') }}" id="addservice">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Názov:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Vložte názov služby" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="company_name">Názov podniku:</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                placeholder="Vložte názov podniku" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="city_name">Názov mesta:</label>
                            <input type="text" class="form-control" id="city_name" name="city_name"
                                placeholder="Vložte názov mesta" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Potvrdiť</button>
                    </form>
            </div>
        </div>
    </div>

    @include('new_my_partials.new_footer')

    <script type="text/javascript">
        $(document).ready(function() {
                $('#addservice').on('submit',function(event) {
                    event.preventDefault();

                    $.ajax({
                        url:"{{ route('new_services.ajax.store') }}",
                        data:$('#addservice').serialize(),
                        type:'post',

                        success:function(result) {
                            $('#messageFromAjax').css('display','block');
                            $('#messageFromAjax').text(result.message);
                            $('#addservice')[0].reset();
                        }
                    })
                });
        });
    </script>

</body>

</html>