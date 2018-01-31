<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('bower_components/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    
    <link href="{{ asset('bower_components/components-font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Jquery FileUpload -->
    <link rel="stylesheet" href="/bower_components/blueimp-file-upload/css/jquery.fileupload.css">

    @stack('css') 

</head>
<body>
    <div id="app">
        
        @include('layouts.header')
        
        <section>
            @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;</button>    
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;</button>    
                {{Session::get('errors')}}
            </div><!-- end alert alert-danger -->
            @endif
            @if(Session::has('info'))
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;</button>
                    {{Session::get('info')}}
                </div><!-- end alert alert-info -->
            @endif
            @if(Session::has('warning'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" aria-label="close">&times;</button>
                    {{Session::get('warning')}}
                </div><!-- end alert alert-warning -->
            @endif
            @yield('content')    
        </section>
    
    </div>

    <!-- Scripts -->

    @section('scripts')
    <!-- Scripts -->

    <!-- jQuery v3.2.1 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

    <!-- Tether -->
    <script src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>

    <!-- Bootstrap js -->    
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script src="/bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="/bower_components/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
    <script src="/bower_components/blueimp-file-upload/js/jquery.fileupload.js"></script>
    @show

</body>
</html>



