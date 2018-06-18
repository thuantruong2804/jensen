<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>
            @section('title')
                {{ Session::get('title') }}
            @show
        </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="dentist, stomatologist, dental clinic, medical, clinic, surgery clinic, plastic surgery">
        <meta name="author" content="jensen.vn">
        <meta name="format-detection" content="telephone=no">

        <!-- Stylesheets -->
        {{ HTML::style('assets/frontend/css/slick.css') }}
        {{ HTML::style('assets/frontend/css/animate.min.css') }}
        {{ HTML::style('assets/frontend/css/icon-style.css') }}
        {{ HTML::style('assets/frontend/css/bootstrap-datetimepicker.css') }}
        {{ HTML::style('assets/frontend/css/style.css') }}
        {{ HTML::style('assets/frontend/css/style-0.css') }}
        {{ HTML::style('assets/frontend/css/color-swatch.css') }}

        <!--Favicon-->
        <link rel="icon" href="{{Asset('assets/frontend/images/favicon.png')}}" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

        <!-- Google map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2ZxmP3HXu8QpczpqmameMvRh0dOskJX0&language=vi"></script>
    </head>
    <body class="">
        @include('elements/app_header')

        <div class="page-content">
            @yield('content')
        </div>

        @include('elements/app_footer')

        <!-- Vendors -->
        {{ HTML::script('assets/frontend/js/libs/jquery-3.2.1.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery-migrate-3.0.1.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery.cookie.js') }}
        {{ HTML::script('assets/frontend/js/libs/moment.js') }}
        {{ HTML::script('assets/frontend/js/libs/bootstrap-datetimepicker.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/popper.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/bootstrap.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery.waypoints.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/sticky.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/imagesloaded.pkgd.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/slick.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery.scroll-with-ease.min.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery.countTo.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery.form.js') }}
        {{ HTML::script('assets/frontend/js/libs/jquery.validate.min.js') }}

        <!-- Custom Scripts -->
        {{ HTML::script('assets/frontend/js/libs/app.js') }}
        {{ HTML::script('assets/frontend/js/libs/forms.js') }}
        {{ HTML::script('assets/frontend/js/libs/color.js') }}

        @section('scripts')
        @show
    </body>
</html>