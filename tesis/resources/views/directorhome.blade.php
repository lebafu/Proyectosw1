<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
  <a href="#home">Home</a>
  <div class="dropdown">
    <button class="dropbtn">Tesis
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="{{url('/tesis_dir_sol')}}">Solicitudes</a>
      <a href="{{url('/tesis_dir_ins')}}">Tesis Inscritas</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Filtrar tesis por tipo de vinculacion
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
     <a href="{{url('/tesis_empresa')}}">Tesis relacionadas a empresas</a>
     <a href="{{url('/tesis_proyecto')}}">Tesis relacionadas a proyectos</a>
     <a href="{{url('/tesis_fondoconcursable')}}">Tesis relacionadas a fondos concursables</a>
     <a href="{{url('/tesis_comunidad')}}">Tesis relacionadas a la comunidad</a>
    </div>
  </div>
   <div class="dropdown">
    <button class="dropbtn">Filtrar tesis por fechas
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="{{url('/filtro_nota_pendiente_prorroga')}}">Conocer notas pendientes y de prorroga a vencer</a>
      <a href="{{url('/filtro_nota_pendiente')}}">Conocer notas de pendiente a vencer</a>
      <a href="{{url('/filtro_nota_prorroga')}}">Conocer notas de prorroga a vencer</a>
    </div>
  </div>
</div>



</body>
</html>


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

 

<!--<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Sistema de Tesis</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ url('/home') }}">Home</a></li>
      <li><a href="{{url('/tesis_dir_sol')}}">Solicitudes de tesis</a></li>
      <li><a href="{{url('/tesis_dir_ins')}}">Tesis Inscritas</a></li>

      <li><a href="{{url('/tesis_empresa')}}">Tesis relacionadas a empresas</a></li>
      <li><a href="{{url('/tesis_proyecto')}}">Tesis relacionadas a proyectos</a></li>
      <li><a href="{{url('/tesis_fondoconcursable')}}">Tesis relacionadas a fondos concursables</a></li>
      <li> <a href="{{url('/tesis_comunidad')}}">Tesis relacionadas a la comunidad</a></li>
      <li> <a href="{{url('/filtro_nota_pendiente_prorroga')}}">Conocer notas pendientes y de prorroga a vencer</a></li>
      <li><a href="{{url('/filtro_nota_prorroga')}}">Conocer notas de prorroga a vencer</a></li>
      <li><a href="{{url('/filtro_nota_pendiente')}}">Conocer notas de pendiente a vencer</a></li>
    </ul>
  </div>
</nav>-->
    
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        
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