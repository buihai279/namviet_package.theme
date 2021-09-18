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
