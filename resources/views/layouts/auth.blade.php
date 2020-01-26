<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Electro - Site de vente de d'appareils electroniques et accessories</title>
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">-->
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>

<body>


<div id="app">

    @yield('content')

</div><!-- /.container -->




<!-- Bootstrap core JavaScript
================================================== -->
<script src="{{ asset('/js/app.js') }}"></script>
@yield('script')

</body>
</html>

