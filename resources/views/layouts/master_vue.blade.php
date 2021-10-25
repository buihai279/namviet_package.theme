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
    {{--    <link href="{{asset('vendor/theme/js/plugins/global/plugins.bundle.css')}}" rel="stylesheet"--}}
    {{--          type="text/css"/>--}}
    <link href="{{asset('vendor/theme/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    {{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    {{--    <script src="{{asset('vendor/theme/js/libs/axios.min.js')}}"></script>--}}
    {{--    <script src="{{asset('vendor/theme/js/libs/lodash.min.js')}}"></script>--}}
    {{--    <script src="{{asset('vendor/theme/js/libs/moment/moment.min.js')}}"></script>--}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <script defer src="{{ mix('js/app.js',) }}"></script>
@endpush
@section('body')
    <!--begin::Body-->
    <body id="kt_body"
          class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
          style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <!--begin::Main-->
    <!--begin::Root-->
    <div id="app" class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
        {{--        @include('layouts::aside._base')--}}
        <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                {{--            @include('layouts::header._base')--}}

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
    {{--    @include('layouts::_scroll_top')--}}
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    {{--    <script src="{{asset('vendor/theme/js/plugins/global/plugins.bundle.js')}}"></script>--}}
    {{--    <script src="{{asset('vendor/theme/js/scripts.bundle.js')}}"></script>--}}
    {{--    <script src="{{asset('vendor/theme/js/jquery.magnific-popup.min.js')}}"></script>--}}
    {{--    <style href="{{asset('vendor/theme/css/magnific-popup.css')}}" rel="stylesheet"></style>--}}

    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    {{--    @stack('script_bottom')--}}
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    </body>
    <!--end::Body-->
@endsection
