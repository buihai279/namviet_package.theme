@extends('layouts::base')
@push('head')
    <!--begin::Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    @stack('style_head')
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('vendor/theme/js/plugins/global/plugins.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('vendor/theme/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('vendor/theme/js/libs/axios.min.js')}}"></script>
    <script src="{{asset('vendor/theme/js/libs/lodash.min.js')}}"></script>
    <script src="{{asset('vendor/theme/js/libs/moment/moment.min.js')}}"></script>
@endpush
@section('body')
    <!--begin::Body-->
    <body id="form-login"
          class="app-vue  header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
          style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    @yield('content')
    {{--    @include('layouts::_scroll_top')--}}
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{mix('js/app.js')}}"></script>
    <script src="{{asset('vendor/theme/js/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('vendor/theme/js/scripts.bundle.js')}}"></script>

    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    @stack('script_bottom')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    </body>
    <!--end::Body-->
@endsection
