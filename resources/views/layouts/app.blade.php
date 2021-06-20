<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>File Manager</title>
    <link rel="apple-touch-icon" href="{{asset('theme/images/ico/apple-icon-120.png')}}" />

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('theme/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/vendors/css/extensions/jstree.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    {{--    @toastr_css--}}
    @stack('styles')
    <!-- END: Page CSS-->
    @toastr_css


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
{{-- class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static" --}}

<body
    class="horizontal-layout horizontal-menu navbar-floating footer-static {{auth()->check() ? 'content-left-sidebar' : 'blank-page'}}"
    data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">
    @if (auth()->check())

    @include('layouts.topnav')
    {{-- @include('layouts.mainnav') --}}

    @endif

    @yield('content')

    @if (auth()->check())
    @include('layouts.footer')
    @endif


</body>
<!-- END: Body-->

<!-- BEGIN: Vendor JS-->
<script src="{{asset('theme/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('theme/vendors/js/ui/jquery.sticky.js')}}"></script>
<script src="{{asset('theme/vendors/js/extensions/jstree.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('theme/js/core/app-menu.js')}}"></script>
<script src="{{asset('theme/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
@stack('scripts')
<!-- END: Page JS-->

@jquery
@toastr_js
@toastr_render
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
<script>
    $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
</script>


</html>