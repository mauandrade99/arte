<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <link rel='stylesheet' type='text/css' href='/includes/plugins/form-datepicker/css/datepicker.css' /> 
        <link rel='stylesheet' type='text/css' href='/includes/plugins/form-colorpicker/css/bootstrap-colorpicker.css' /> 
        <link rel='stylesheet' type='text/css' href='/includes/plugins/form-select2/select2.css' /> 
        <link rel='stylesheet' type='text/css' href='/includes/css/flickity.css' /> 

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        <div id="mymodal" class="modal" >
            <div class="modal-content">
              <p class="message"></p>
            </div>
            <div class="modal-footer">
              <span class="yes btn btn-primary">Sim</span>
			        <span class="no btn btn-primary">Não</span>
            </div>
          </div>

        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
        

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
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <script type='text/javascript' src="/includes/js/app/system.js?8130"></script>

          @yield('javascript')

        
    </body>
</html>
