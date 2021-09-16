@extends('layouts::base')
@section('head')
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/vendor/theme/js/plugins/global/plugins.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/vendor/theme/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('assets/vendor/theme/js/libs/axios.min.js')}}"></script>
    <script src="{{asset('assets/vendor/theme/js/libs/lodash.min.js')}}"></script>
    <script src="{{asset('assets/vendor/theme/js/libs/moment/moment.min.js')}}"></script>
@endsection
@section('body')
    <!--begin::Body-->
    <body id="kt_body"
          class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
          style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
        @include('layouts::aside._base')
        <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
            @include('layouts::header._base')
            <!--end::Header-->
                <!--begin::Content-->
            @yield('content')
            <!--end::Content-->
                <!--begin::Footer-->
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    @include('layouts::_scroll_top')
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{asset('assets/vendor/theme/js/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/vendor/theme/js/scripts.bundle.js')}}"></script>

    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    @yield('script_bottom')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    </body>
    <!--end::Body-->
@endsection
