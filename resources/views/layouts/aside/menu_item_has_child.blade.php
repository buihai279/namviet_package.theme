<div data-kt-menu-trigger="click"
     class="menu-item   menu-accordion {{$item['class']??''}} {{Helper::urlToRoute($item['url'])===request()->route()->getName()?'show here':''}}">
    <span class="menu-link">
        <span class="menu-icon">
            {!! $item['icon_html']??'' !!}
        </span>
        <span class="menu-title">{{$item['label']??''}}</span>
            <i class="menu-arrow"></i>
    </span>
    <div class="menu-sub menu-sub-accordion">
        @if(Helper::isShowItemMenu($item)===true)
            @foreach($item['child'] as $itemChild)
                @if(Helper::isShowItemMenu($itemChild)===false) @continue @endif
                @if(empty($itemChild['child']) )
                    @include('layouts.v8.aside.menu_item',['item'=>$itemChild])
                @else
                    @include('layouts.v8.aside.menu_item_has_child',['item'=>$itemChild])
                @endif
            @endforeach
        @endif
    </div>
</div>
