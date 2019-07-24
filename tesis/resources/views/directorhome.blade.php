
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Tesis</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <div class="flex-center position">
      <div class="top-left links">
            <a href="{{url('/tesis_dir_sol')}}">Solicitudes de tesis</a>
            <a href="{{url('/tesis_dir_ins')}}">Tesis Inscritas</a>
            <a href="{{url('/tesis_empresa')}}">Tesis relacionadas a empresas</a>
            <a href="{{url('/tesis_proyecto')}}">Tesis relacionadas a proyectos</a>
            <a href="{{url('/tesis_fondoconcursable')}}">Tesis relacionadas a fondos concursables</a>
            <a href="{{url('/tesis_comunidad')}}">Tesis relacionadas a la comunidad</a>
            <a href="{{url('/filtro_nota_pendiente_prorroga')}}">Conocer notas pendientes y de prorroga a vencer</a>
            <a href="{{url('/filtro_nota_prorroga')}}">Conocer notas de prorroga a vencer</a>
            <a href="{{url('/filtro_nota_pendiente')}}">Conocer notas de prorroga a vencer</a>
    </div>
        </div>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Sistema de Tesis
                </div>

                <div class="links">
                </div>
        
            </div>
        </div>
    </body>
</html>