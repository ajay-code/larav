<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}}</title>
    <link rel="shortcut icon" href="{{url('/favicon.ico')}}">
    <link href="{{assetUrl('css/app.css')}}" rel="stylesheet">
    {{-- <link href="{{assetUrl('css/prettyPhoto.css')}}" rel="stylesheet"> --}}
    <link href="{{assetUrl('css/style.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="{{assetUrl('js/html5shiv.js')}}"></script>
    <script src="{{ assetUrl('js/respond.min.js') }}"></script>
    <![endif]-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{getStorageUrl('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{getStorageUrl('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{getStorageUrl('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{getStorageUrl('images/ico/apple-touch-icon-57-precomposed.png')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@include('layouts.partial.header')
<div id="app">
    @yield('content')
</div>
@include('layouts.partial.footer')
<script src="{{assetUrl('js/app.js')}}"></script>
@yield('scripts')
@include('sweet::alert')

</body>
</html>
