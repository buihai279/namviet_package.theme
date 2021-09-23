@extends('layouts::master')
@push('head')
    <script src="{{asset('assets/custom/i18n.js')}}"></script>
    <script>
        let dataFiles = {};//set global
    </script>
    <style>
        .table.table-head-custom thead tr, .table.table-head-custom thead th {
            font-weight: 600;
            color: #0077b5 !important;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
        }
    </style>
    {{--<link rel="stylesheet" href="{{ mix('css/app.css') }}"/>--}}
@endpush

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
    @include('layouts::toolbar._base')
    <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                @include('layouts::components_v8.alerts')
                @yield('container')
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
