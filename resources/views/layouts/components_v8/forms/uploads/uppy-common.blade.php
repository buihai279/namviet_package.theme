<div class="mb-20">
    <h3 class="font-size-lg text-dark font-weight-bold mb-6">{{__('form.label.'.$fieldName)}}</h3>
    <div id="{{$fieldName}}">
        <div class="uppy-container">
        </div>
        <div class="uppy">
            <div class="btn btn-primary UppyModalOpenerBtn">Tải Ảnh lên</div>
            <div class="uppy-thumbnails justify-content-start">
                @php
                    $dataCustom = [];
                        if(!empty($data))
                        {
                            $dataCustom = is_array($data) ? $data : $data->toArray();
                        }
                @endphp
                @if(!empty($dataCustom['files'][$fieldName]))
                    @php
                        $arrFile = array_map(function ($item){
                            $item['url'] = str_replace('approve','',env('APP_URL').($item['uri']??''));
                            return $item;
                        },$dataCustom['files'][$fieldName]);
                    @endphp
                    <script>
                        _.set(dataFiles, '{{$fieldName}}', '@json($arrFile)')
                    </script>
                @endif
            </div>
            <div class="uppy-inputs"></div>
        </div>
    </div>
</div>
