<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>


    <link rel='shortcut icon' href="{{asset('images/logos/logos__favicon.png')}}" type='image/png' />
    <link rel='icon' href="{{asset('images/logos/logos__favicon.png')}}" type='image/png' />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">    

    <!-- Styles -->
    <link rel="stylesheet" href=" {{ asset('css/materialize.min.css')}} ">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/empresa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/catalogo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/novedades.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/contacto.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/page/producto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/privada/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/privada/pedido.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page/privada/oferta.css') }}" rel="stylesheet">
   
    <link href="{{ asset('icons/fontawesome/css/all.css') }}" rel="stylesheet">

    <link href="{{ asset('alertify/css/alertify.rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('alertify/css/themes/default.rtl.css') }}" rel="stylesheet">
    
    <script src='https://www.google.com/recaptcha/api.js'></script>


</head>
<body>


</body>