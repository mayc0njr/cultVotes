<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CultVotes') }}</title>

    <!-- Styles -->
    <link href="{{ asset('bower_components/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('bower_components/components-font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Jquery FileUpload -->
    <link rel="stylesheet" href="/bower_components/blueimp-file-upload/css/jquery.fileupload.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="/bower_components/toastr/toastr.css">

    @stack('css') 

</head>
<body>
        
    @include('layouts.header')
    
    @yield('content')    
    
    @include('layouts.footer')
    
    
    <!-- Scripts -->

    @section('scripts')
    
    <!-- jQuery v3.2.1 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    
    <!-- Tether -->
    <script src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>

    <!-- Bootstrap js -->    
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Fileupload js -->    
    <script src="/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="/bower_components/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="/bower_components/blueimp-file-upload/js/jquery.fileupload.js"></script>

    <!-- Toastr js -->    
    <script src="/bower_components/toastr/toastr.js"></script>
    
    <script>

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "4000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @if(Session::has('sucess'))
            toastr.sucess("{{Session::get('sucess')}}");
        @endif
        @if(Session::has('error'))
            toastr.error("{{Session::get('error')}}");
        @endif
        @if(Session::has('info'))
            toastr.info("{{Session::get('info')}}");
        @endif
        @if(Session::has('warning'))
            toastr.warning("{{Session::get('warning')}}");
        @endif
    </script>

    @show

</body>
</html>



