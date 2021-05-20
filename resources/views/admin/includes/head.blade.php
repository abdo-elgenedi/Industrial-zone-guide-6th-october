<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin - @yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('assets/admin/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/admin/images/ico/favicon.ico')}}">
    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
            rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/plugins/animate/animate.css')}}">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/pages/chat-application.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/app.c')}}ss">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/custom-rtl.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/pickers/miniColors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/pickers/spectrum/spectrum.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css-rtl/plugins/pickers/colorpicker/colorpicker.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/pages/timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/extensions/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/extensions/timedropper.min.css')}}">

    <link rel="stylesheet" href="{{asset("assets/admin/vendors/css/editors/summernote.css")}}">

    <link rel="stylesheet" href="{{asset("assets/plugins/file-uploaders/dropzone.css")}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/style-rtl.css')}}">
    <!-- END Custom CSS-->

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body class="vertical-layout vertical-menu 2-columns  @if(Request::is('admin/users/tickets/reply*')) chat-application @endif menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">