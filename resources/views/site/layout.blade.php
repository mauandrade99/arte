<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel='stylesheet' type='text/css' href='/includes/plugins/form-datepicker/css/datepicker.css' /> 
        <link rel='stylesheet' type='text/css' href='/includes/plugins/form-colorpicker/css/bootstrap-colorpicker.css' /> 
        <link rel='stylesheet' type='text/css' href='/includes/plugins/form-select2/select2.css' /> 
        <link rel='stylesheet' type='text/css' href='/includes/css/flickity.css' /> 

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body class="antialiased">


         <!-- Dropdown Structure -->
         <ul id='dropdown1' class='dropdown-content'>
          <li><a href="{{ route('site.index')}}">TODOS</a></li>
          @foreach($usuariosMenu as $usuarioMenu)
            <li><a href="{{ route('site.cpcrUser',$usuarioMenu->id)}}">{{$usuarioMenu->name}}</a></li>
          @endforeach
        </ul>
 

        <nav>
            <div class="nav-wrapper container" > 
              <a href="#" class="brand-logo center">{{$titulo}}</a>
              <ul id="nav-mobile" class="left ">
                <li><a href="">Home</a></li>
                <li><a class='dropdown-trigger' href='#' data-target='dropdown1'>Usuários <i class="material-icons right">expand_more</i></a></li>
                <li><a href="">Login</a></li>
              </ul>
            </div>
        </nav>


       @yield('content')


       

        <script type='text/javascript' src='/includes/js/sys/jquery-1.12.3.min.js'></script> 
        <script type='text/javascript' src='/includes/js/sys/jqueryui-1.10.3.min.js'></script>
        <script type='text/javascript' src='/includes/js/sys/bootstrap.min.js'></script>	
        <script type='text/javascript' src='/includes/js/sys/flickity.pkgd.min.js'></script>
        <script type='text/javascript' src='/includes/js/sys/moment.min.js'></script>
        <script type="text/javascript" src='/includes/js/sys/jquery.inputmask.bundle.min.js'></script>
        <script type="text/javascript" src='/includes/js/sys/inputmask.binding.min.js'></script>
        <script type="text/javascript" src='/includes/js/sys/sorttable.js'></script>
                        

        <script type='text/javascript' src='/includes/plugins/form-select2/select2.js'></script>
        <script type='text/javascript' src='/includes/plugins/form-datepicker/js/bootstrap-datepicker.js'></script>
        <script type='text/javascript' src='/includes/plugins/form-datepicker/js/locales/bootstrap-datepicker.pt-BR.js'></script>
        <script type='text/javascript' src='/includes/plugins/form-colorpicker/js/bootstrap-colorpicker.js'></script>
        <script type="text/javascript" src='/includes/js/mdb/chart.min.js'></script>
        <script type="text/javascript" src='/includes/js/mdb/chartjs-plugin-datalabels.js'></script> 

        <script type='text/javascript' src="/includes/js/app/system.js?8130"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
             $('.dropdown-trigger').dropdown();
        </script>
    </body>
</html>
