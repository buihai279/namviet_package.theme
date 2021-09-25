@php
    $errorMsg=[];
    if (!empty(session('error'))){
        $errorMsg[]=session('error');
    }
    if(!empty($errors->all())){
        $errorMsg=array_merge($errorMsg,$errors->all());
    }
@endphp
@if(!empty($errorMsg))
    <!--begin::Alert-->
    <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
        <!--begin::Icon-->
        <span class=" me-4 mb-5 mb-sm-0">
        <i class="la la-comment la-3x"></i>
    </span>
        <!--end::Icon-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="fw-bold">Có lỗi xảy ra</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <span>

            <ul>
                @foreach ($errorMsg as $msg)
                    <li>{{ $msg }}</li>
                @endforeach
            </ul>
            </span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Close-->
        <button type="button"
                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                data-bs-dismiss="alert">
        <span class="svg-icon svg-icon-1 svg-icon-danger">

        <i class="la la-close la-3x"></i>
        </span>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->
@endif
