@extends('panel_ui::layout.' . $layout)
@section('title', $data->title())

@section('subcontent')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium me-auto">
            {{ $data->title() }}
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

        </div>
    </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            @foreach($data->columns() as $column)
                {{ $column->render() }}
            @endforeach
        </div>

    @push('scripts')
        <script>
            @if ( method_exists($data, 'scripts') )
                {!! $data->scripts() !!}
            @endif

            function popup(item, isByActions) {
                if (f.locked || !n.thumbnails.popup || !n.thumbnails._selectors.popup)
                    return;

                var container = $(n.thumbnails.popup.container),
                    box = container.find('.fileuploader-popup'),
                    hasArrowsClass = 'fileuploader-popup-has-arrows',
                    renderPopup = function() {
                        var template = item.popup.html || $(f._assets.textParse(n.thumbnails.popup.template, item)),
                            popupIsNew = item.popup.html !== template,
                            windowKeyEvent = function(e) {
                                var key = e.which || e.keyCode;

                                if (key == 27 && item.popup && item.popup.close)
                                    item.popup.close();

                                if ((key == 37 || key == 39) && n.thumbnails.popup.arrows)
                                    item.popup.move(key == 37 ? 'prev' : 'next');
                            };

                        box.removeClass('loading');

                        // remove all created popups
                        if (box.children(n.thumbnails._selectors.popup).length) {
                            $.each(f._itFl, function(i, a) {
                                if (a != item && a.popup && a.popup.close) {
                                    a.popup.close(isByActions);
                                }
                            });
                            box.find(n.thumbnails._selectors.popup).remove();
                        }

                        template.show().appendTo(box);
                        item.popup.html = template;
                        item.popup.isOpened = true;
                        item.popup.move = function(to) {
                            var itemIndex = f._itFl.indexOf(item),
                                nextItem = null,
                                itL = false;

                            to = n.thumbnails.itemPrepend ? to == 'prev' ? 'next' : 'prev' : to;

                            if (to == 'prev') {
                                for (var i = itemIndex; i>=0; i--) {
                                    var a = f._itFl[i];

                                    if (a != item && a.popup && a.html.hasClass('file-has-popup')) {
                                        nextItem = a;
                                        break;
                                    }

                                    if (i == 0 && !nextItem && !itL && n.thumbnails.popup.loop) {
                                        i = f._itFl.length;
                                        itL = true;
                                    }
                                }
                            } else {
                                for (var i = itemIndex; i<f._itFl.length; i++) {
                                    var a = f._itFl[i];

                                    if (a != item && a.popup && a.html.hasClass('file-has-popup')) {
                                        nextItem = a;
                                        break;
                                    }

                                    if (i+1 == f._itFl.length && !nextItem && !itL && n.thumbnails.popup.loop) {
                                        i = -1;
                                        itL = true;
                                    }
                                }
                            }

                            if (nextItem)
                                f.thumbnails.popup(nextItem, true);
                        };
                        item.popup.close = function(isByActions) {
                            if (item.popup.node) {
                                item.popup.node.pause ? item.popup.node.pause() : null;
                            }

                            $(window).off('keyup', windowKeyEvent);
                            container.css({
                                overflow: '',
                                width: ''
                            });

                            // hide the cropper
                            if (item.popup.editor && item.popup.editor.cropper)
                                item.popup.editor.cropper.hide();

                            // hide the zoomer
                            if (item.popup.zoomer)
                                item.popup.zoomer.hide();

                            // isOpened
                            item.popup.isOpened = false;

                            // thumbnails.popup.onHide callback
                            item.popup.html && n.thumbnails.popup.onHide && $.isFunction(n.thumbnails.popup.onHide) ? n.thumbnails.popup.onHide(item, l, p, o, s) : (item.popup.html ? item.popup.html.remove() : null);

                            if (!isByActions)
                                box.fadeOut(400, function() {
                                    box.remove();
                                });

                            delete item.popup.close;
                        };

                        // append item.reader.node to popup
                        // play video/audio
                        if (item.popup.node) {
                            if (popupIsNew)
                                template.html(template.html().replace(/\$\{reader\.node\}/, '<div class="reader-node"></div>')).find('.reader-node').html(item.popup.node);
                            item.popup.node.controls = true;
                            item.popup.node.currentTime = 0;
                            item.popup.node.play ? item.popup.node.play() : null;
                        } else {
                            if (popupIsNew)
                                template.find('.fileuploader-popup-node').html('<div class="reader-node"><div class="fileuploader-popup-file-icon file-type-'+ item.format +' file-ext-'+ item.extension +'">' + item.icon + '</div></div>');
                        }

                        // bind Window functions
                        $(window).on('keyup', windowKeyEvent);

                        // freeze the container
                        container.css({
                            overflow: 'hidden',
                            width: container.innerWidth()
                        });

                        // popup arrows
                        item.popup.html.find('[data-action="prev"], [data-action="next"]').removeAttr('style');
                        item.popup.html[f._itFl.length == 1 || !n.thumbnails.popup.arrows ? 'removeClass' : 'addClass'](hasArrowsClass);

                        if (!n.thumbnails.popup.loop) {
                            if (f._itFl.indexOf(item) == 0)
                                item.popup.html.find('[data-action="prev"]').hide();
                            if (f._itFl.indexOf(item) == f._itFl.length-1)
                                item.popup.html.find('[data-action="next"]').hide();
                        }

                        // popup zoomer
                        if (popupIsNew && item.popup.zoomer)
                            item.popup.zoomer = null;
                        f.editor.zoomer(item);

                        // popup editor
                        if (item.editor) {
                            if (!item.popup.editor)
                                item.popup.editor = {};

                            // set saved rotation
                            f.editor.rotate(item, item.editor.rotation || 0, true);

                            // set saved crop
                            if (item.popup.editor && item.popup.editor.cropper) {
                                item.popup.editor.cropper.hide(true);
                                setTimeout(function() {
                                    f.editor.crop(item, item.editor.crop ? $.extend({}, item.editor.crop) : item.popup.editor.cropper.setDefaultData());
                                }, 100);
                            }
                        }

                        // bind actions
                        item.popup.html.on('click', '[data-action="prev"]', function(e) {
                            item.popup.move('prev');
                        }).on('click', '[data-action="next"]', function(e) {
                            item.popup.move('next');
                        }).on('click', '[data-action="crop"]', function(e) {
                            if (item.editor)
                                item.editor.cropper();
                        }).on('click', '[data-action="rotate-cw"]', function(e) {
                            if (item.editor)
                                item.editor.rotate();
                        }).on('click', '[data-action="zoom-in"]', function(e) {
                            if (item.popup.zoomer)
                                item.popup.zoomer.zoomIn();
                        }).on('click', '[data-action="zoom-out"]', function(e) {
                            if (item.popup.zoomer)
                                item.popup.zoomer.zoomOut();
                        });

                        // thumbnails.popup.onShow callback
                        n.thumbnails.popup.onShow && $.isFunction(n.thumbnails.popup.onShow) ? n.thumbnails.popup.onShow(item, l, p, o, s) : null;
                    };

                if (box.length == 0)
                    box = $('<div class="fileuploader-popup"></div>').appendTo(container);

                box.fadeIn(400).addClass('loading').find(n.thumbnails._selectors.popup).fadeOut(150);

                if ((['image', 'video', 'audio', 'astext'].indexOf(item.format) > -1 || ['application/pdf'].indexOf(item.type) > -1) && !item.popup.html) {
                    f.files.read(item, function() {
                        if (item.reader.node)
                            item.popup.node = item.reader.node;

                        if (item.format == 'image' && item.reader.node) {
                            item.popup.node = item.reader.node.cloneNode();

                            if (item.popup.node.complete) {
                                renderPopup();
                            } else {
                                item.popup.node.src = '';
                                item.popup.node.onload = item.popup.node.onerror = renderPopup;
                                item.popup.node.src = item.reader.node.src;
                            }
                        } else {
                            renderPopup();
                        }
                    });
                } else {
                    renderPopup();
                }
            }
        </script>
    @endpush

@endsection
