<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="/">
    <meta charset="utf-8"/>
    <title>
        {{ env('APP_NAME','VTP') }}
    </title>
    <meta content="VTVTRAVEL"
          name="description"/>
    <meta content="VTVTRAVEL"
          name="keywords"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="vn_VN" property="og:locale"/>
    <meta content="article" property="og:type"/>
    <meta content="VTVTRAVEL"
          property="og:title"/>
    <meta content="VTVTRAVEL" property="og:site_name"/>
    <link href="{{asset('vendor/theme/js/plugins/global/plugins.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('vendor/theme/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('css/app.css') }}"/>
    <script defer src="{{ asset('js/app.js') }}"></script>
{{--    <script defer src="vendor/theme/js/scripts.bundle.js"></script>--}}
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid"  id="app">
        <router-view/>
    </div>
    <!--end::Page-->
</div>
<script src="{{asset('vendor/theme/js/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('vendor/theme/js/scripts.bundle.js')}}"></script>
<script src="{{asset('vendor/theme/js/jquery.magnific-popup.min.js')}}"></script>
<style href="{{asset('vendor/theme/css/magnific-popup.css')}}" rel="stylesheet"></style>
<!--end::Root-->
</body>
</html>
