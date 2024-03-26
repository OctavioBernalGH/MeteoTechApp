<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME')}}</title>
    <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body id="app" class="bg-gradient-to-r from-slate-300 to-slate-500">
    <div style="height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column; row-gap: 2rem;">
        <application-title></application-title>
        <h2 style="font-weight: 600;">Seleccione municipio</h2>
        <select class="js-example-basic-single" id="select2" name="state">
            @foreach ($municipalities as $current)
                <option value="{{$current['municipality_code']}}">{{$current['municipality_name']}}</option>
            @endforeach
          </select>
    </div>
</body>

<footer>

</footer>

</html>

@vite('resources/js/app.js')

<script>

    $(document).ready(function() {
        $('.js-example-basic-single').select2();

        $('.js-example-basic-single').on('change', function(e) {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var optionSelected = $(this).val();

            $.post("{{route('Meteo.municipalityWeather')}}",
                {
                    _token: csrfToken,
                    municipality: optionSelected
                },
                function(data,status){
                    alert("Data: " + data + "\nStatus: " + status);
                    console.log(data);
                });
            
        });
    });

</script>
