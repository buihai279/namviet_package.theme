@section('script_bottom')
    @parent
    <link href="https://releases.transloadit.com/uppy/v1.22.0/uppy.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://releases.transloadit.com/uppy/v1.18.0/uppy.min.js"></script>
    <script src="https://releases.transloadit.com/uppy/locales/v1.16.9/vi_VN.min.js"></script>
    <script>
        let KTUppy = function () {
            const Dashboard = Uppy.Dashboard;
            const ImageEditor = Uppy.ImageEditor;
            let headers = {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            };
            let initUppy = function (nameInput, fileSize, numberOfFile, type = []) {
                let targetSelector = '#' + nameInput;
                if ( $(targetSelector).length === 0) {// if not exist dom return
                    return;
                }
                let uppyDragVideo = Uppy.Core({
                    autoProceed: false,
                    locale: Uppy.locales.vi_VN,
                    restrictions: {
                        maxFileSize: 1024 * fileSize, // 1kb * fileSize
                        maxNumberOfFiles: numberOfFile,
                        minNumberOfFiles: 1,
                        allowedFileTypes: type
                    },
                    debug: false,
                });

                uppyDragVideo.use(Dashboard, {
                    trigger: targetSelector + ' .UppyModalOpenerBtn',
                    inline: false,
                    target: targetSelector + " .uppy-container",
                    replaceTargetContent: true,
                    showProgressDetails: true,
                    browserBackButtonClose: true,
                    note: `Số file tối đa được tải lên: ${numberOfFile}, dung lượng tối đa mỗi file ${fileSize / 1000} MB`,
                    height: 460,
                    width: 1000,
                    metaFields: [
                        {id: 'name', name: 'Tên tập', placeholder: 'Nhập tên tập tin muốn thay đổi'}
                    ],
                });
                //set File default by callback function addFile()
                if (!_.isEmpty(dataFiles[nameInput])) {
                    _.forEach(JSON.parse(dataFiles[nameInput]), function (fileObj) {
                        fetch(new Request(fileObj.url))
                            .then(response => response.blob())
                            .then(function (myBlob) {
                                let idAdded = uppyDragVideo.addFile({
                                    name: fileObj.name,
                                    type: fileObj.mime,
                                    data: myBlob
                                });
                                $(targetSelector + ' .uppy-thumbnails').append(showThumb(nameInput, idAdded, fileObj, 'init-upload'));
                                initImg();
                            });
                    });
                }
                uppyDragVideo.use(ImageEditor, {target: Dashboard});
                uppyDragVideo.use(Uppy.XHRUpload, {
                    endpoint: '{{route('system.file.apiUpload')}}',
                    withCredentials: true,
                    fieldName: 'file',
                    headers: headers,
                });
                uppyDragVideo.on('complete', function (file) {
                    let imagePreview = "";
                    $(targetSelector + ' .uppy-thumbnails .uppy-thumbnail-container.init-upload').remove();//reset form after up file
                    $.each(file.successful, function (index, value) {
                        uppyDragVideo.setFileMeta( value.id, { name: value.response.body.name })
                        imagePreview = showThumb(nameInput, value.id, value.response.body, 'new-upload')
                        $(targetSelector + ' .uppy-thumbnails').append(imagePreview);
                    });
                    initImg();
                });
                uppyDragVideo.on('file-removed', (file, reason) => {
                    $(targetSelector + ' .uppy-thumbnail-container[data-id="' + file.id + '"').remove();//trigger remove input of file
                });
                $(document).on('click', targetSelector + ' .uppy-thumbnails .uppy-remove-thumbnail', function () {
                    let imageId = $(this).attr('data-id');
                    uppyDragVideo.removeFile(imageId);//trigger remove file in dashboard
                    $(targetSelector + ' .uppy-thumbnail-container[data-id="' + imageId + '"').remove();
                    $('[data-toggle="tooltip"]').tooltip('hide');
                });

                function showThumb(nameInput, id, fileObj, className) {
                    let thumbnail = "";
                    let title = fileObj.name + formatFileSize(fileObj.size)
                    if (/image/.test(fileObj.mime)) {
                        thumbnail = '<div class=" w-100 h-auto uppy-thumbnail"><img class="asset-preview img-thumbnail " title="'+title+'" src="' + fileObj.url + '" href="' + fileObj.url + '"/></div>';
                    }else if (/video/.test(fileObj.mime)) {
                        thumbnail = '<div class=" w-100 h-auto uppy-thumbnail"><video width="800" height="800" controls class="asset-preview img-thumbnail mfp-iframe" title="'+title+'" src="' + fileObj.url + '" href="' + fileObj.url + '"></video></div>';
                    }
                    let input = '<input type="hidden" class="file-hidden " name="files[' + nameInput + '][]" value=\'' + JSON.stringify(fileObj) + ' \'>';
                    let btnDel = '<span data-id="' + id + '" class="bg-warning h-20px line-height-md position-absolute right-0 rounded-circle text-center top-0 uppy-remove-thumbnail w-20px"><i class="flaticon2-cancel-music"></i></span>'
                    return '<div data-action="hover" data-toggle="tooltip" data-original-title="Nhấn vào để xem file" class="uppy-thumbnail-container h-150px w-300px  ' + className + '" data-id="' + id + '" >' + thumbnail + input + btnDel + '</div>';
                }
                //format file size (Ex: 5,4 MB)
                function formatFileSize(size) {
                    let sizeLabel = "bytes";
                    if (size > 1024) {
                        size = size / 1024;
                        sizeLabel = "kb";
                        if (size > 1024) {
                            size = size / 1024;
                            sizeLabel = "MB";
                        }
                    }
                    return ` ( ${Math.round(size, 2)}  ${sizeLabel} )`;
                }
            }
            return {
                init: function () {
                    initUppy('avatar', 20 * 1000, 1, ['image/*']);
                    initUppy('logo', 1000, 1, ['image/*']);
                    initUppy('icon', 20 * 1000, 1, ['image/*']);
                    initUppy('icon_enable', 20 * 1000, 1, ['image/*']);
                    initUppy('logo_disabled', 20 * 1000, 1, ['image/*']);
                    initUppy('thumbnails', 20 * 1000, 20, ['image/*']);
                    initUppy('banner', 20 * 1000, 1, ['image/*']);
                    initUppy('video', 500 * 1000, 20, ['video/*']);
                    initUppy('prompts', 20 * 1000, 50, ['audio/*']);
                    initUppy('code_name', 20 * 1000, 1, ['audio/*']);
                    initUppy('audio', 20 * 1000, 1, ['audio/*']);
                    initUppy('icon_greeting', 20 * 1000, 1, ['image/*']);
                    initUppy('banner_greeting', 20 * 1000, 1, ['image/*']);
                    initUppy('themes', 20 * 1000, 50, ['image/*']);
                    initUppy('background', 20 * 1000, 50, ['image/*']);
                    initImg();
                },
            };
        }();
        KTUppy.init();
    </script>
@endsection
