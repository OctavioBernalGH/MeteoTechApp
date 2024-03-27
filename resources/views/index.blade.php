<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<style>

    .jconfirm-title-c {
        text-align: center;
        font-size: x-large;
        font-weight: 600;
        text-transform: uppercase;
    }

    .jconfirm .jconfirm-box {
        width: 80vh;
    }

    .jconfirm.jconfirm-light .jconfirm-box .jconfirm-buttons {
        text-align: center;
        float: none;
    }

    .dataContainer {
        text-transform: capitalize;
        font-weight: 700;
        text-decoration: underline;
        text-underline-offset: 7px;
    }

    .minTmp {
        color: blue;
    }

    .maxTmp {
        color: red;
    }

    tr,
    td {
        text-align: center;
        height: 2.4rem;
    }

    .divImgContainer {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
</style>

<body id="app" class="bg-gradient-to-r from-slate-300 to-slate-500">
    <div
        style="height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column; row-gap: 2rem;">
        <application-title class="animate__animated animate__fadeIn"></application-title>
        <h2 style="font-family: 'Urbanist'; font-weight: 600;" class="animate__animated animate__fadeIn">Seleccione
            municipio</h2>
        <div class="animate__animated animate__fadeIn">
            <select id="select2" name="state">
                @foreach ($municipalities as $current)
                    <option value="{{ $current['municipality_code'] }}">{{ $current['municipality_name'] }}</option>
                @endforeach
            </select>
        </div>
    </div>
</body>

<footer>

</footer>

</html>

@vite('resources/js/app.js')

<script>
    $(document).ready(function() {
        $('#select2').select2();

        $('#select2').on('change', function(e) {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var optionSelected = $(this).val();

            $.post("{{ route('Meteo.municipalityWeather') }}", {
                    _token: csrfToken,
                    municipality: optionSelected
                },
                function(data, status) {

                    console.log(data);

                    let contenido = `
                        <div>
                            <table style="width: 100%; margin: 50px 0;">
                                <tr>
                                    <td class="dataContainer">${formatDate(data.municipality[0].prediccion.dia[0].fecha)}</td>
                                    <td class="dataContainer">${formatDate(data.municipality[0].prediccion.dia[1].fecha)}</td>
                                    <td class="dataContainer">${formatDate(data.municipality[0].prediccion.dia[2].fecha)}</td>
                                    <td class="dataContainer">${formatDate(data.municipality[0].prediccion.dia[3].fecha)}</td>
                                    <td class="dataContainer">${formatDate(data.municipality[0].prediccion.dia[4].fecha)}</td>
                                    <td class="dataContainer">${formatDate(data.municipality[0].prediccion.dia[5].fecha)}</td>
                                    <td class="dataContainer">${formatDate(data.municipality[0].prediccion.dia[6].fecha)}</td>
                                </tr>
                                <tr>
                                    <td><span class="minTmp">${data.municipality[0].prediccion.dia[0].temperatura.minima}</span>/<span class="maxTmp">${data.municipality[0].prediccion.dia[0].temperatura.maxima}</span></td>
                                    <td><span class="minTmp">${data.municipality[0].prediccion.dia[1].temperatura.minima}</span>/<span class="maxTmp">${data.municipality[0].prediccion.dia[1].temperatura.maxima}</span></td>
                                    <td><span class="minTmp">${data.municipality[0].prediccion.dia[2].temperatura.minima}</span>/<span class="maxTmp">${data.municipality[0].prediccion.dia[2].temperatura.maxima}</span></td>
                                    <td><span class="minTmp">${data.municipality[0].prediccion.dia[3].temperatura.minima}</span>/<span class="maxTmp">${data.municipality[0].prediccion.dia[3].temperatura.maxima}</span></td>
                                    <td><span class="minTmp">${data.municipality[0].prediccion.dia[4].temperatura.minima}</span>/<span class="maxTmp">${data.municipality[0].prediccion.dia[4].temperatura.maxima}</span></td>
                                    <td><span class="minTmp">${data.municipality[0].prediccion.dia[5].temperatura.minima}</span>/<span class="maxTmp">${data.municipality[0].prediccion.dia[5].temperatura.maxima}</span></td>
                                    <td><span class="minTmp">${data.municipality[0].prediccion.dia[6].temperatura.minima}</span>/<span class="maxTmp">${data.municipality[0].prediccion.dia[6].temperatura.maxima}</span></td>
                                </tr> 
                                <tr>
                                    <td>${data.municipality[0].prediccion.dia[0].estadoCielo[0].value ? `<div class="divImgContainer"><img src='https://www.aemet.es/imagenes_gcd/_iconos_municipios/${data.municipality[0].prediccion.dia[0].estadoCielo[0].value}.png' alt="img no disponible"/></div>` : ''}</td>
                                    <td>${data.municipality[0].prediccion.dia[1].estadoCielo[0].value ? `<div class="divImgContainer"><img src='https://www.aemet.es/imagenes_gcd/_iconos_municipios/${data.municipality[0].prediccion.dia[1].estadoCielo[0].value}.png' alt="img no disponible"/></div>` : ''}</td>
                                    <td>${data.municipality[0].prediccion.dia[2].estadoCielo[0].value ? `<div class="divImgContainer"><img src='https://www.aemet.es/imagenes_gcd/_iconos_municipios/${data.municipality[0].prediccion.dia[2].estadoCielo[0].value}.png' alt="img no disponible"/></div>` : ''}</td>
                                    <td>${data.municipality[0].prediccion.dia[3].estadoCielo[0].value ? `<div class="divImgContainer"><img src='https://www.aemet.es/imagenes_gcd/_iconos_municipios/${data.municipality[0].prediccion.dia[3].estadoCielo[0].value}.png' alt="img no disponible"/></div>` : ''}</td>
                                    <td>${data.municipality[0].prediccion.dia[4].estadoCielo[0].value ? `<div class="divImgContainer"><img src='https://www.aemet.es/imagenes_gcd/_iconos_municipios/${data.municipality[0].prediccion.dia[4].estadoCielo[0].value}.png' alt="img no disponible"/></div>` : ''}</td>
                                    <td>${data.municipality[0].prediccion.dia[5].estadoCielo[0].value ? `<div class="divImgContainer"><img src='https://www.aemet.es/imagenes_gcd/_iconos_municipios/${data.municipality[0].prediccion.dia[5].estadoCielo[0].value}.png' alt="img no disponible"/></div>` : ''}</td>
                                    <td>${data.municipality[0].prediccion.dia[6].estadoCielo[0].value ? `<div class="divImgContainer"><img src='https://www.aemet.es/imagenes_gcd/_iconos_municipios/${data.municipality[0].prediccion.dia[6].estadoCielo[0].value}.png' alt="img no disponible"/></div>` : ''}</td>
                                </tr>      
                            </table>
                        </div>
                    `;

                    let jqueryModal = $.confirm({
                        title: `${data.municipality[0].nombre}`,
                        content: contenido,
                        type: 'dark',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text: 'Aceptar',
                                btnClass: 'btn-dark',
                                action: function() {
                                    jqueryModal.close();
                                }
                            },
                        }
                    });
                });

        });
    });

    function formatDate(dateString) {
        const daysOfWeek = ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'];
        const date = new Date(dateString);
        const dayOfWeek = daysOfWeek[date.getDay()];
        const dayOfMonth = date.getDate();

        return `${dayOfWeek} ${dayOfMonth}`;
    }
</script>
