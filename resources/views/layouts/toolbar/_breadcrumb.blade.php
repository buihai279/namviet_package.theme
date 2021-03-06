<!--begin::Breadcrumb-->
@unless ($breadcrumbs->isEmpty())
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item text-muted">
                    <a href="{{ $breadcrumb->url }}" class="text-muted text-hover-primary">{{ $breadcrumb->title }}</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
            @else
                <li class="breadcrumb-item text-dark">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ul>
@endunless
