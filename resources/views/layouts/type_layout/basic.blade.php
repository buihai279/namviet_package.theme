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

@prepend('script_bottom')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fmTimeDt() {
            $('td.fm-time').each(function () {
                let str = $(this).text();
                if (!_.isEmpty(str)) {
                    $(this).text(moment(str.toString()).format("DD-MM-YYYY hh:mm:ss"));
                }
            });
            $('.msToDt').each(function () {
                let str = $(this).text();
                if (!_.isEmpty(str)) {
                    $(this).text(moment(str.toString(), "x").format("DD-MM-YYYY hh:mm:ss"));
                    $(this).removeClass("msToDt").addClass("time-rendered");
                }
            });
        }

        // Tính năng img error Bị conflict với metronic 8, chưa tìm ra nguyên nhân
        // function loadImg() {
        //     $('td.load-img').each(function () {
        //         $(this).html('<img src="' + $(this).text() + '" href="' + $(this).text() + '" title="' + $(this).text() + '" class="w-150px asset-preview">');
        //     });
        // }
        //
        // function initImg() {
        //     $('img').on("error", function () {
        //         $(this).attr('title', $(this).attr('src'));
        //         $(this).attr('src', 'https://placehold.co/300x300.png?text=không tìm thấy ảnh');
        //         $(this).attr('href', 'https://placehold.co/500x500.png?text=không tìm thấy ảnh');
        //     });
        //     $('img.asset-preview').magnificPopup({type: 'image'});
        //     $('video.asset-preview').magnificPopup({type: 'video'});
        // }

        function refreshInit() {
            $('.selectpicker').selectpicker();
            fmTimeDt();
        }
    </script>
@endprepend
