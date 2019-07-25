<!DOCTYPE html>
<html class="no-js h-100" lang="en">

  <head>

      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>A+S - @yield('title')</title> 
      <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('styles/shards-dashboards.1.1.0.min.css') }}">
      <link rel="stylesheet" href="{{ asset('styles/extras.1.1.0.min.css') }}">
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script src="{{ asset('js/appGrupal.js') }}" defer></script>
      <script src="{{ asset('js/appIndividual.js') }}" defer></script>

  </head>


  <body class="h-100">   <!-- Usar todo el ancho de la pantalla -->
    <div class="container-fluid"> <!-- Usar todo el body -->
      <div class="row ">           <!-- Generar columnas, sistema de rejillas -->
        <!-- Main Sidebar -->
        <aside class="container-fluid main-sidebar col-12 col-md-3 col-lg-2 px-0"> <!-- col-12 col-md-3 col-lg-2 Esto permite que sea responsive -->
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0"> <!-- align-items-stretch esto es para usar todo el alto -->
              <a class="navbar-brand w-100 mr-3" href="{{ url('/home') }}" style="line-height: 30px;">  
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 30px;" src="{{ asset('images/shards-dashboards-logo.svg') }}">
                  <span class="d-none d-md-inline ml-1">A+S</span>
                </div>
              </a>
            </nav>
          </div>
          @guest
          @else
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('Universidad') }}"><i class="fas fa-university"></i>
                        Universidades
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="{{ url('Facultades') }}"><i class="fas fa-building"></i>
                        Facultades
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('Carreras') }}"><i class="fas fa-user-graduate"></i>
                        Carreras
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('Curso') }}"><i class="fas fa-book"></i>
                        Cursos
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('Archivo') }}"><i class="far fa-file-pdf"></i>
                        Archivos
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ url('Socio') }}"><i class="far fa-handshake"></i>
                        Socios
                </a>
              </li>

               <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-left" href="{{ url('admin') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-align-justify"></i>
                  Proyectos<i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item nav-link" href="{{ route('proyecto.create') }}"><i class="far fa-plus-square"></i> Generar Nuevo Proyecto</a>
                  <a class="dropdown-item nav-link" href="{{ url('proyecto') }}"><i class="fas fa-eye"></i> Lista de Proyectos</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('Informes') }}"><i class="fas fa-chart-bar"></i>
                        Informes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('Chat') }}"><i class="fas fa-comments"></i>
                        Chat
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-left" href="{{ url('admin') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i>
                  Administrador<i class="fas fa-caret-down"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item nav-link" href="{{ url('admin/users') }}"><i class="far fa-user"></i>    Usuarios</a>
                  <a class="dropdown-item nav-link" href="{{ url('/Excel_Import/excel_importar') }}"><i class="far fa-file-excel"></i>    Importar Usuarios</a>
                  <a class="dropdown-item nav-link" href="{{ url('admin/roles') }}"><i class="fas fa-users"></i> Roles</a>
                  <a class="dropdown-item nav-link" href="{{ url('admin/permissions') }}"><i class="fas fa-key"></i> Permisos</a>
                  <a class="dropdown-item nav-link" href="{{ url('admin/activitylogs') }}"><i class="far fa-clipboard"></i> Historial de Actividad</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{ url('/admin/users/' . Auth::user()->id. '/edituser') }}">
                  <i class="material-icons">person</i>
                  <span>Perfil de Usuario</span>
                </a>
              </li>
            </ul>
          </div>
          @endguest
        </aside>
        <!-- End Main Sidebar -->

        <!-- <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3"> -->
          <div class="main-navbar sticky-top bg-white col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <h6 class="page-title">@yield('titulo')</h6>
                    </div>
                  </div>
                  <input class="form-control" aria-label="Search"> </div>
              </form>
                @guest
                <li class="nav-item">
                  <a class="nav-link text-nowrap px-5" href="{{ route('login') }}" role="button"><i class="far fa-user"></i> {{ __('Ingresar') }}</a>
                </li>
                @else
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="{{ asset('images/avatars/2.jpg') }}" alt="User Avatar">
                    <span class="d-none d-md-inline-block">{{Auth::user()->nombre}}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="{{ url('/admin/users/' . Auth::user()->id) }}">
                      <i class="material-icons">&#xE7FD;</i> Perfíl</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Cerrar Sesión') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> 
                  </div>
                </li>
                @endguest
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>

          <!-- / .main-navbar -->
          <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-content-container container-fluid px-4 " style="background-image: url('{{ asset('images/fondo2.png') }}'); height: 100vh; background-size: cover; background-position: center;}" >

                    @yield('content')
                  
              </div>
          </div>
          </main>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>-->
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="{{ asset('scripts/extras.1.1.0.min.js') }}"></script>
    <script src="{{ asset('scripts/shards-dashboards.1.1.0.min.js') }}"></script>
    <script src="{{ asset('scripts/app/app-blog-overview.1.1.0.js') }}"></script>

    
    @yield('scripts')
  </body>
</html>