<div class="  sm:col-span-12   col-span-12">
    <ul class="sTree2 listsClass" id="sTree2">
        @include('panel_ui::components.form.nested-list.components.item-loop',['list'=>$list])
    </ul>

</div>



@push('styles')
    <style>
        #sTree2 ul, #sTree2 li, #s-l-base li, #sTree2 ul {
            list-style-type: none;
            color: #000;
        }

        #sTree2 li, #s-l-base li {
            padding-inline-bottom: 50px;
            margin: 5px;
            border: 1px solid #3f3f3f;
            background-color: #f1f1f1;
        }

        #s-l-base li > div:not(.have-child):before, #sTree2 li > div:not(.have-child):before {
            display: block;
            content: ' ';
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg>');;
            background-size: 28px 28px;
            height: 19px;
            width: 19px;
            position: absolute;
            right: -35px;
        }

        #sTree2 li > div, #s-l-base li > div {
            position: relative;
            padding: 7px;
            background-color: #fff;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function clean(obj) {
                for (var i = 0; i < obj.length; i++) {
                    // var propName = propNames[i];
                    if (obj[i]["parentId"] === undefined ) {
                        obj[i]["parentId"]=0
                    }
                }
                return obj;
            }


            function updateData(data) {
                // $('#loading').show()
                console.log(clean(data))
                $.ajax({
                    url: "{{ route('cat.update') }}",
                    data: {"data":clean(data)},
                    dataType : 'json',
                    method: 'put',
                    success: function (res) {
                        // $('#loading').hide();
                        // $('#table_data').html(data);
                        // feather.replace()
                        // console.log(res)
                    }
                });
            }

            var options = {
                placeholderCss: {'background-color': '#ff8'},
                hintCss: {'background-color': '#bbf'},
                onChange: function (cEl) {
                    // console.log('onChange');
                },
                complete: function (cEl) {
                    const data=$('#sTree2').sortableListsToArray();
                    // console.log(data)
                    updateData(data)
                    // cat.update
                },
                isAllowed: function (cEl, hint, target) {

                    if (target.data('module') === 'c') {
                        hint.css('background-color', '#ff9999');
                        return false;
                    } else {
                        hint.css('background-color', '#99ff99');
                        return true;
                    }
                },
                opener: {
                    active: true,
                    as: 'html',  // if as is not set plugin uses background image
                    close: '-',  // or 'fa-minus c3'
                    open: '+',  // or 'fa-plus'
                    openerCss: {
                        'position': 'absolute',
                        'right': '-50px',
                        'display': 'inline-block',
                        'padding': '2px 18px',
                        'color': '#000',
                        'font-size': '1.5em',
                        'cursor': 'pointer',
                    }
                },
                ignoreClass: 'clickable',
                rtl: true,

            };
            $('.listsClass').sortableLists(options);
        });

        $('#ttt').on('click', function () {

        });
    </script>

@endpush
