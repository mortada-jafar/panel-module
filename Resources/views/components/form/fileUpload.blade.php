<div class="sm:col-span-{{$col}}   col-span-12  @if(isset($required)) required @endif">
<input type="file" name="files"

              data-fileuploader-limit="2"
       {{--       data-fileuploader-maxSize="3"--}}
       {{--       data-fileuploader-fileMaxSize="1"--}}
       data-fileuploader-addMore="true"
{{--       data-fileuploader-files='{"name":"filename1.txt","size":1024,"type":"text/plain","file":"uploads/filename1.txt"}'--}}
/>
</div>

@push('styles')
    <style>
        /* input & items size */
        .fileuploader-theme-thumbnails .fileuploader-thumbnails-input,
        .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
            position: relative;
            display: inline-block;
            margin: 16px 0 0 16px;
            padding: 0;
            vertical-align: top;

            width: 25%;
            width: calc(25% - 16px);
            padding-top: 20%;
        }

        .fileuploader-theme-thumbnails .fileuploader-thumbnails-input-inner,
        .fileuploader-theme-thumbnails .fileuploader-item-inner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 6px;
        }

        /* input */
        .fileuploader-theme-thumbnails .fileuploader-thumbnails-input-inner {
            background: #e6ebf4;
            border: 2px dashed #92a7bf;
            text-align: center;
            font-size: 30px;
            color: #90a0bc;
            cursor: pointer;
            opacity: 0.5;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }
        .fileuploader-theme-thumbnails .fileuploader-thumbnails-input-inner:hover {
            opacity: 1;
        }
        .fileuploader-theme-thumbnails .fileuploader-thumbnails-input-inner:active,
        .fileuploader-theme-thumbnails .fileuploader-dragging .fileuploader-thumbnails-input-inner {
            background: #f6f6fb;
        }
        .fileuploader-theme-thumbnails .fileuploader-thumbnails-input-inner i {
            position: absolute;
            font-style: normal;
            left: 0;
            top: 0;
            top: 50%;
            left: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }

        /* items */
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-items-list {
            margin: -16px 0 0 -16px;
        }
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item {
            border-end2: 0;
        }
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item:last-child {
            margin-end2: 0;
        }
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item-inner {
            background: rgba(0, 0, 0, 0.02);
            overflow: hidden;
            z-index: 1;
        }
        .fileuploader-theme-thumbnails .fileuploader-item-inner .thumbnail-holder,
        .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item-image {
            width: 100%;
            height: 100%;
        }
        .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item-image {
            position: relative;
            text-align: center;
            overflow: hidden;
        }
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item .fileuploader-item-icon i {
            display: none;
        }
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item .fileuploader-action-popup {
            border-radius: 6px;
            z-index: 1;
        }
        .fileuploader-theme-thumbnails .fileuploader-item .type-holder {
            position: absolute;
            top: 6px;
            left: 6px;
            padding: 4px 6px;
            background: rgba(0, 0, 0, 0.4);
            text-transform: uppercase;
            color: #fff;
            font-size: 12px;
            border-radius: 4px;
            z-index: 2;
        }
        .fileuploader-theme-thumbnails .fileuploader-item .actions-holder {
            position: absolute;
            top: 6px;
            right: 6px;
            z-index: 2;
            height: 20px;
        }
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item .fileuploader-action {
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item .fileuploader-action + .fileuploader-action {
            margin-left: 8px;
        }
        .fileuploader-theme-thumbnails .fileuploader-item .content-holder {
            position: absolute;
            end2: 0;
            left: 0;
            width: 100%;
            padding: 6px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
            background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%);
            background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%);
            background: linear-gradient(to end2, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%);
            z-index: 2;
        }
        .fileuploader-theme-thumbnails .fileuploader-item .content-holder h5 {
            display: block;
            margin: 0;
            padding: 0;
            font-size: 14px;
            font-weight: normal;
            color: #fff;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .fileuploader-theme-thumbnails .fileuploader-item .content-holder span {
            display: block;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.8);
        }

        /* uploading */
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item.upload-failed .fileuploader-item-inner {
            background: #db6868;
        }
        .fileuploader-theme-thumbnails .fileuploader-item .progress-holder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            display: none;
            z-index: 1;
        }
        .fileuploader-theme-thumbnails .fileuploader-item .progress-holder .fileuploader-progressbar {
            position: relative;
            top: 50%;
            width: 80%;
            height: 6px;
            margin: 0 auto;
            margin-top: -6px;
            background: #dde4f6;
        }

        /* sorter */
        .fileuploader-theme-thumbnails .fileuploader-items .fileuploader-item.sorting {
            padding-top: 0;
            margin: 0;
        }
        .fileuploader-theme-thumbnails .fileuploader-sorter-placeholder {
            background: #f0f3f9;
            border-radius: 6px;
        }

        /* responsive */
        @media all and (max-width: 768px) {
            .fileuploader-theme-thumbnails .fileuploader-thumbnails-input,
            .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
                width: 33.33333333%;
                width: calc(33.33333333% - 16px);
                padding-top: 30%;
            }
        }
        @media all and (max-width: 480px) {
            .fileuploader-theme-thumbnails .fileuploader-thumbnails-input,
            .fileuploader-theme-thumbnails .fileuploader-items-list .fileuploader-item {
                width: 50%;
                width: calc(50% - 16px);
                padding-top: 40%;
            }
        }



        /* input */
        .fileuploader-theme-dropin .fileuploader-input {
            margin: -16px;
            padding: 16px;
            border: 0;
        }
        .fileuploader-theme-dropin .fileuploader-input.fileuploader-dragging {
            background: #f3f5fa;
            border-radius: 6px;
        }
        .fileuploader-theme-dropin .fileuploader-input-inner {
            width: 100%;
            text-align: center;
            padding: 16px;
            color: #5b5b7b;
        }
        .fileuploader-theme-dropin .fileuploader-input-inner span {
            display: inline-block;
            text-decoration: underline;
        }
        .fileuploader-theme-dropin .fileuploader-input-inner span:hover {
            color: #4a4a64;
        }

    </style>
@endpush

@push('scripts')

    <script>
        $(document).ready(function () {

            $('input[name="files"]').fileuploader({
                {{--addMore: true,--}}
                {{--changeInput: '<div class="fileuploader-input">' +--}}
                {{--    '<div class="fileuploader-input-inner">' +--}}
                {{--    '<div>${captions.feedback} ${captions.or} <span>${captions.button}</span></div>' +--}}
                {{--    '</div>' +--}}
                {{--    '</div>',--}}
                {{--theme: 'dropin',--}}
                {{--captions: '{{app()->getLocale() }}'--}}

                extensions: null,
                changeInput: ' ',
                theme: 'thumbnails',
                enableApi: true,
                addMore: false,
                limit: 1,
                thumbnails: {
                    box: '<div class="fileuploader-items">' +
                        '<ul class="fileuploader-items-list">' +
                        '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                        '</ul>' +
                        '</div>',
                    item: '<li class="fileuploader-item">' +
                        '<div class="fileuploader-item-inner">' +
                        '<div class="type-holder">${extension}</div>' +
                        '<div class="actions-holder">' +
                        '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                        '</div>' +
                        '<div class="thumbnail-holder">' +
                        '${image}' +
                        '<span class="fileuploader-action-popup"></span>' +
                        '</div>' +
                        '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                        '<div class="progress-holder">${progressBar}</div>' +
                        '</div>' +
                        '</li>',
                    item2: '<li class="fileuploader-item">' +
                        '<div class="fileuploader-item-inner">' +
                        '<div class="type-holder">${extension}</div>' +
                        '<div class="actions-holder">' +
                        '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                        '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                        '</div>' +
                        '<div class="thumbnail-holder">' +
                        '${image}' +
                        '<span class="fileuploader-action-popup"></span>' +
                        '</div>' +
                        '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                        '<div class="progress-holder">${progressBar}</div>' +
                        '</div>' +
                        '</li>',
                    startImageRenderer: true,
                    canvasImage: false,
                    _selectors: {
                        list: '.fileuploader-items-list',
                        item: '.fileuploader-item',
                        bottom: '.fileuploader-action-bottom',
                        retry: '.fileuploader-action-retry',
                        remove: '.fileuploader-action-remove'
                    },
                    onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                            api = $.fileuploader.getInstance(inputEl.get(0));

                        plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();

                        if(item.format == 'image') {
                            item.html.find('.fileuploader-item-icon').hide();
                        }
                    },
                    onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
                        var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                            api = $.fileuploader.getInstance(inputEl.get(0));

                        html.children().animate({'opacity': 0}, 200, function() {
                            html.remove();

                            if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
                                plusInput.show();
                        });
                    }
                },
                dragDrop: {
                    container: '.fileuploader-thumbnails-input'
                },
                afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                        api = $.fileuploader.getInstance(inputEl.get(0));

                    plusInput.on('click', function() {
                        api.open();
                    });

                    api.getOptions().dragDrop.container = plusInput;
                },

                /*
                // while using upload option, please set
                // startImageRenderer: false
                // for a better effect
                upload: {
                    url: './php/upload_file.php',
                    data: null,
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    bottom: true,
                    synchron: true,
                    beforeSend: null,
                    onSuccess: function(result, item) {
                        var data = {};

                        if (result && result.files)
                            data = result;
                        else
                            data.hasWarnings = true;

                        // if success
                        if (data.isSuccess && data.files.length) {
                            item.name = data.files[0].name;
                            item.html.find('.content-holder > h5').text(item.name).attr('title', item.name);
                        }

                        // if warnings
                        if (data.hasWarnings) {
                            for (var warning in data.warnings) {
                                alert(data.warnings[warning]);
                            }

                            item.html.removeClass('upload-successful').addClass('upload-failed');
                            return this.onError ? this.onError(item) : null;
                        }

                        item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');

                        setTimeout(function() {
                            item.html.find('.progress-holder').hide();
                            item.renderThumbnail();

                            item.html.find('.fileuploader-action-popup, .fileuploader-item-image').show();
                        }, 400);
                    },
                    onError: function(item) {
                        item.html.find('.progress-holder, .fileuploader-action-popup, .fileuploader-item-image').hide();
                    },
                    onProgress: function(data, item) {
                        var progressBar = item.html.find('.progress-holder');

                        if(progressBar.length > 0) {
                            progressBar.show();
                            progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                        }

                        item.html.find('.fileuploader-action-popup, .fileuploader-item-image').hide();
                    }
                },
                onRemove: function(item) {
                    $.post('php/upload_remove.php', {
                        file: item.name
                    });
                }
                */
            });
        });

            // enable fileuploader plugin

        // });
    </script>
@endpush
