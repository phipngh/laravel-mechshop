<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MechShop | @yield('title')</title>


    {{Html::style('admin/assets/vendor/simple-line-icons/css/simple-line-icons.css')}}
    {{Html::style('admin/assets/vendor/font-awesome/css/fontawesome-all.min.css')}}
    {{Html::style('admin/assets/css/styles.css')}}



    {{Html::favicon('favicon_io/apple-touch-icon.png')}}
    {{Html::favicon('favicon_io/favicon-32x32.png')}}
    {{Html::favicon('favicon_io/favicon-16x16.png')}}
    {{Html::favicon('favicon_io/site.webmanifest')}}
</head>
<body class="sidebar-fixed header-fixed">
<div class="page-wrapper">
        @include('include.admin.header')

    <div class="main-container">
        @include('include.admin.slidebar')

        @yield('content')
    </div>
</div>


{{Html::script('admin/assets/vendor/jquery/jquery.min.js')}}
{{Html::script('admin/assets/vendor/popper.js/popper.min.js')}}
{{Html::script('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}
{{Html::script('admin/assets/vendor/chart.js/chart.min.js')}}
{{Html::script('admin/assets/js/carbon.js')}}
{{Html::script('admin/assets/js/demo.js')}}
{{Html::script('admin/assets/js/scripts.js')}}
</body>
</html>

