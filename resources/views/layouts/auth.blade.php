<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>eCommerce</title>
    <link rel="icon" type="image/png" href="{{ asset('/images/logo.png') }}">
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">-->
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

</head>

<body>


<div id="app">

    @yield('content')

</div><!-- /.container -->

<footer class="footer pt-4 pt-md-5 border-top mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
            </div>
        </div>
    </div>

</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<script src="{{ asset('/js/app.js') }}"></script>
@include('sweetalert::alert')
@yield('script')

</body>
</html>

