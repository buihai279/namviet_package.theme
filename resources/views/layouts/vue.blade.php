@extends('layouts::type_layout.basic')
@section('container')
    <div class="card card-custom card-sticky">
        <div class="card-body card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
            <div class="row">
                <router-view/>
            </div>
        </div>
    </div>
@endsection
