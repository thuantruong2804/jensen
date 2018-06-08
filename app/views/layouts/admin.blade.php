<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title> 
            @section('title')
            @show 
        </title>
        <meta charset="utf-8">
        <meta name="description" content="Quản trị game GTA">
        <meta name="author" content="VNPT EPAY">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Basic Styles -->
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/font-awesome.min.css') }}
        {{ HTML::style('assets/css/smartadmin-production.min.css') }}
        {{ HTML::style('assets/css/smartadmin-skins.min.css') }}
        {{ HTML::style('assets/css/data_table.css') }}
        {{ HTML::style('assets/css/bootstrap-datetimepicker.css') }}
        {{ HTML::style('assets/css/datepicker.css') }}
        {{ HTML::style('assets/css/jquery.tagsinput.css') }}
        {{ HTML::style('assets/css/style.css') }}
        
        <!-- FAVICONS -->
        <link rel="shortcut icon" href="{{Asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">
        <link rel="icon" href="{{Asset('assets/img/favicon/favicon.png')}}" type="image/x-icon">

        <script type="text/javascript"> 
            timeOutNumber = 4000; //in ms
            thousandsSep = ',';
        </script>
    </head>
    <body class="smart-style-1">
        @include('elements/admin_header')  
        
        @include('elements/admin_sidebar')  

        <!-- MAIN PANEL -->
        <div id="main" role="main">
            <div id="content">
                <section id="widget-grid" class="">
                    <div class="contain-flash">
                        <div class="flash">
                            @include('elements/flash')  
                        </div>
                    </div>
                    @yield('content')
                </section>
            </div>

        </div>
        <!-- END MAIN PANEL -->

        <div id="shortcut">
            <ul>
                <li>
                    <a href="{{ URL::to('/admin/user/profile') }}" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>Tài khoản </span> </span> </a>
                </li>
                <li>
                    <a href="{{ URL::to('/admin/user/password') }}" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-lock fa-4x"></i> <span>Mật khẩu </span> </span> </a>
                </li>
                <li>
                    <a href="{{ URL::to('/admin/logout') }}" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-sign-out fa-4x"></i> <span>Đăng xuất </span> </span> </a>
                </li>
            </ul>
        </div>
        <!-- END SHORTCUT AREA -->

        <!--================================================== -->
        {{ HTML::script('assets/js/plugin/pace/pace.min.js') }}
        {{ HTML::script('assets/js/libs/jquery-2.0.2.min.js') }}
        {{ HTML::script('assets/js/libs/jquery-ui-1.10.3.min.js') }}
        {{ HTML::script('assets/js/app.config.js') }}
        {{ HTML::script('assets/js/bootstrap/bootstrap.min.js') }}
        {{ HTML::script('assets/js/smartwidgets/jarvis.widget.min.js') }}
        {{ HTML::script('assets/js/plugin/sparkline/jquery.sparkline.min.js') }}
        {{ HTML::script('assets/js/plugin/jquery-validate/jquery.validate.min.js') }}
        {{ HTML::script('assets/js/plugin/masked-input/jquery.maskedinput.min.js') }}
        {{ HTML::script('assets/js/plugin/select2/select2.min.js') }}
        {{ HTML::script('assets/js/bootbox.min.js') }}
        {{ HTML::script('assets/js/moment.js') }}
        {{ HTML::script('assets/js/bootstrap-datetimepicker.js') }}
        {{ HTML::script('assets/js/accounting.min.js') }}
        {{-- HTML::script('assets/js/jquery.tagsinput.js') --}}
        {{ HTML::script('assets/js/app.min.js') }}
        {{ HTML::script('assets/js/common.js') }}
        {{ HTML::script('assets/js/script.js') }}
        
        {{ HTML::script('assets/ckeditor/ckeditor.js') }}
        {{ HTML::script('assets/js/fileUpload/jquery.knob.js') }}
        {{ HTML::script('assets/js/fileUpload/jquery.ui.widget.js') }}
        {{ HTML::script('assets/js/fileUpload/jquery.iframe-transport.js') }}
        {{ HTML::script('assets/js/fileUpload/jquery.fileupload.js') }}
        {{ HTML::script('assets/js/fileUpload/script.js') }}
        <script>
        </script>
        @section('scripts')
        @show
        
        <div class="ajax-loading">
            <img src="{{Asset('assets/img/ajax-loader.gif')}}">
        </div>
    </body>
</html>