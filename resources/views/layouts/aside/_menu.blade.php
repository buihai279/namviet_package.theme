<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
         data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div
            class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true">
            @if(!empty(session()->get('userGroup')['permissions']) && !empty(config('menu')['left']))
                @foreach(config('menu')['left'] as $key => $menuBlock)
                    @if(Helper::isShowBlock($menuBlock)===false) @continue @endif
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span
                                class="text-uppercase fs-8 ls-1 text-white">{{$menuBlock['label']}}</span>
                        </div>
                    </div>
                    @foreach($menuBlock['items'] as $item)
                        @if(Helper::isShowItemMenu($item)===false) @continue @endif
                        @if(empty($item['child']) )
                            @include('layouts::aside.menu_item',['item'=>$item])
                        @else
                            @include('layouts::aside.menu_item_has_child',['item'=>$item])
                        @endif
                    @endforeach
                @endforeach
            @endif
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>
