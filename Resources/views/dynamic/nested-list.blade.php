@extends('panel_ui::layout.' . $layout)
@section('title', $meta->title)

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">{{$meta->title}}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            @if($meta->createable)
                <a href="{{$meta->getCreateAction()}}"
                   class="button text-white bg-theme-primary shadow-md">{{ $meta->createdText }}</a>
            @endif
            @if($meta->exportable)
                <div class="dropdown relative mx-2">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="sliders"></i>
                    </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 z-20">
                        <form
                            action="{{ route(\Illuminate\Support\Facades\Route::currentRouteName().'_export',\Illuminate\Support\Facades\Route::current()->parameters) }}"
                            id="export-form"
                            method="post">
                            @csrf
                            <input type="hidden" start="pdf" name="format">
                            <input type="hidden" start="OrderDataGrid" name="gridName">
                            <input type="hidden" name="filter[]" start="" id="filter_export">
                            <input type="hidden" name="search" id="search_export">
                        </form>
                        <div class="dropdown-box__content box p-2">
                            <button
                                data-format="xls"
                                class="flex w-full items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md export">
                                <i data-feather="file-text"
                                   class="w-4 h-4 me-2"></i> @lang('panel_ui::panel.export_xls')
                            </button>
                            <button
                                data-format="csv"
                                class="flex w-full items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md export">
                                <i data-feather="clipboard"
                                   class="w-4 h-4 me-2"></i> @lang('panel_ui::panel.export_csv')
                            </button>
                            <button
                                data-format="pdf"
                                class="flex w-full items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md export">
                                <i data-feather="book" class="w-4 h-4 me-2"></i> @lang('panel_ui::panel.export_pdf')
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="hidden md:block mx-auto "></div>
            <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                <i class="w-4 h-4 absolute my-auto inset-y-0 ml-3 left-0 z-10 text-gray-700" data-feather="search"></i>
                <input type="text" class="input w-full sm:w-64 box px-10 text-gray-700 placeholder border-theme-primary"
                       name="search"
                       placeholder="@lang('panel_ui::panel.search')">
                <div class="inbox-filter dropdown absolute inset-y-0 mr-3 right-0 flex items-center">
                    <i class="dropdown-toggle w-4 h-4 cursor-pointer text-gray-700" data-feather="chevron-down"></i>
                    <div class="inbox-filter__dropdown-box dropdown-box mt-10 absolute top-0 left-0 z-20">
                        <div class="dropdown-box__content box p-5">
                            <div class="grid grid-cols-12 gap-4 row-gap-3">

                                <div class="col-span-12">
                                    <div class="label-field select-field">
                                        <label for="filterColumn">@lang('panel_ui::panel.add_filter')</label>
                                        <select class="input w-full border mt-2 flex-1 filter-column-select"
                                                id="filterColumn">
                                            <option selected disabled>{{ __('panel_ui::panel.column_name') }}</option>

                                            @foreach($data->columns as $column)
                                                @if($column->isFilterable())
                                                    <option start="{{ $column->unique }}">
                                                        {{ $column->label }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-12" data-type="string">
                                    <div class="label-field select-field">
                                        <label for="numberCondition">@lang('panel_ui::panel.condition_opt')</label>
                                        <select id="numberCondition"
                                                class="input w-full border mt-2 flex-1 filter-column-select numberCondition">
                                            <option selected disabled>{{ __('panel_ui::panel.condition') }}</option>
                                            <option start="like">{{ __('panel_ui::panel.contains') }}</option>
                                            <option start="nlike">{{ __('panel_ui::panel.ncontains') }}</option>
                                            <option start="eq">{{ __('panel_ui::panel.equals') }}</option>
                                            <option start="neqs">{{ __('panel_ui::panel.nequals') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-12" data-type="options">
                                    <div class="label-field select-field">
                                        <label for="options">@lang('panel_ui::panel.condition_opt')</label>
                                        <select id="options"
                                                class="input w-full border mt-2 flex-1 filter-column-select">
                                            {{--                                            <option selected disabled>{{ __('panel_ui::panel.condition') }}</option>--}}

                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-12" data-start="string">
                                    @component('panel_ui::components.form.input',[
                                       'name'=>"searchString",
                                       'col'=>"12",
                                       'label'=>__('panel_ui::panel.start'),
                                       'type'=>"text"])
                                    @endcomponent
                                </div>


                                <div class="col-span-12" data-type="number">
                                    <div class="label-field select-field">
                                        <label for="numberConditionOpt">@lang('panel_ui::panel.condition_opt')</label>
                                           <select name="numberConditionOpt"
                                                class="input w-full border mt-2 flex-1 filter-column-select numberCondition">
                                            <option selected disabled>{{ __('panel_ui::panel.condition') }}</option>
                                            <option start="eq">{{ __('panel_ui::panel.equals') }}</option>
                                            <option start="neqs">{{ __('panel_ui::panel.nequals') }}</option>
                                            <option start="gt">{{ __('panel_ui::panel.greater') }}</option>
                                            <option start="lt">{{ __('panel_ui::panel.less') }}</option>
                                            <option start="gte">{{ __('panel_ui::panel.greatere') }}</option>
                                            <option start="lte">{{ __('panel_ui::panel.lesse') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-12" data-start="number">
                                    @component('panel_ui::components.form.input',[
                                        'name'=>"searchNumber",
                                        'col'=>"12",
                                        'label'=>__('panel_ui::panel.start'),
                                        'type'=>"number"])
                                    @endcomponent
                                </div>
                                <div class="col-span-12" data-type="datetime">
                                    <div class="label-field select-field">
                                        <label for="dateConditionOpt">@lang('panel_ui::panel.condition_opt')</label>
                                        <select id="dateConditionOpt"
                                                class="input w-full border mt-2 flex-1 filter-column-select ">
                                            <option selected disabled>{{ __('panel_ui::panel.condition') }}</option>
                                            <option start="eq">{{ __('panel_ui::panel.equals') }}</option>
                                            <option start="neqs">{{ __('panel_ui::panel.nequals') }}</option>
                                            <option start="gt">{{ __('panel_ui::panel.greater') }}</option>
                                            <option start="lt">{{ __('panel_ui::panel.less') }}</option>
                                            <option start="gte">{{ __('panel_ui::panel.greatere') }}</option>
                                            <option start="lte">{{ __('panel_ui::panel.lesse') }}</option>
                                            {{-- <option start="btw">{{ __('panel_ui::app.datagrid.between') }}</option> --}}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-12" data-start="datetime">
                                    <div class="text-xs">@lang('panel_ui::panel.filter_value')</div>
                                    <input class="input w-full border mt-2 flex-1 datepicker">
                                </div>


                                <div class="col-span-12" data-type="boolean">
                                    <div class="label-field select-field">
                                        <label for="booleanConditionOpt">@lang('panel_ui::panel.condition_opt')</label>
                                        <select id="booleanConditionOpt"
                                                class="input w-full border mt-2 flex-1 filter-column-select">
                                            <option selected disabled>{{ __('panel_ui::panel.condition') }}</option>
                                            <option start="eq">{{ __('panel_ui::panel.equals') }}</option>
                                            <option start="neqs">{{ __('panel_ui::panel.nequals') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-span-12" data-start="boolean">
                                    <div class="label-field select-field">
                                        <label for="booleanCondition">@lang('panel_ui::panel.condition_opt')</label>
                                        <select id="booleanCondition"
                                                class="input w-full border mt-2 flex-1 filter-column-select">
                                            <option selected disabled>{{ __('panel_ui::panel.start') }}</option>
                                            <option start="1">{{ __('panel_ui::panel.true') }}</option>
                                            <option start="0">{{ __('panel_ui::panel.false') }}</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-span-12 flex items-center mt-3">
                                    <button class="button w-32 justify-center block bg-gray-200 text-gray-600 ml-auto"
                                            id="add-filter">
                                        @lang('panel_ui::panel.create_filter')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-span-12 flex flex-wrap items-center" id="filter-box">


        </div>

        <!-- BEGIN: Data List -->
        <div class="col-span-12 flex flex-col  items-center" id="loading" style="display: none">
            <i data-loading-icon="puff" class="w-10 h-10"></i>
            <div class="text-center text-xs mt-2">@lang('panel_ui::panel.loading')</div>
        </div>
        <div class="col-span-12" id="table_data">
            @include('panel_ui::dynamic.pagination_data',['init'=>true])
        </div>
    </div>
    {{--    todo make many modal for all created action --}}
    <div class="modal" id="confirmation-ajax-modal">
        <div class="modal__content">
            <div class="modal-init">
                <div class="p-5 text-center ">
                    <i data-feather="info" class="w-16 h-16 text-theme-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5 title"></div>
                    <div class="text-gray-600 mt-2 desc">
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal"
                            class="button w-24 border text-gray-700 mr-1">@lang('panel_ui::panel.cancel')</button>
                    <button data-url="" type="button"
                            class="ajax-button button w-24 bg-theme-danger text-white">@lang('panel_ui::panel.delete')</button>
                </div>
            </div>
            <div class="modal-loading" style="display: none">
                <div class="col-span-12 p-5 flex flex-col  items-center">
                    <i data-loading-icon="puff" class="w-10 h-10"></i>
                    <div class="text-center text-xs mt-2">@lang('panel_ui::panel.loading')</div>
                </div>
            </div>
            <div class="modal-done" style="display: none">
                <div class="p-5 text-center done-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-check-circle w-16 h-16 text-theme-info mx-auto mt-3">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <div class="text-3xl mt-5">@lang('panel_ui::panel.success_ajax_title')</div>
                    <div class="text-gray-600 mt-2">@lang('panel_ui::panel.success_ajax_desc')</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal"
                            class="button w-24 bg-theme-primary text-white">@lang('panel_ui::panel.confirm')</button>
                </div>
            </div>
            <div class="modal-fail" style="display: none">
                <div class="p-5 text-center"><i data-feather="x-circle"
                                                class="w-16 h-16 text-theme-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">@lang('panel_ui::panel.error_ajax_title')</div>
                    <div class="text-gray-600 mt-2">@lang('panel_ui::panel.error_ajax_desc')</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal"
                            class="button w-24 bg-theme-primary text-white">@lang('panel_ui::panel.confirm')</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>

            {{--        todo translate--}}
            const optTranslate = {
                "fa": {
                    like: "يحتوي",
                    in: "مساوی",
                    nlike: "لا يحتوي",
                    eq: "مساوي",
                    neqs: "لا يساوي",
                    gt: "اكبر",
                    lt: "اصغر",
                    gte: "اكبر ومساوي",
                    lte: "اصغر ومساوي",
                },
                "en": {
                    like: "like",
                    nlike: "not like",
                    in: "مساوی",
                    eq: "equal",
                    neqs: "not equal",
                    gt: "greater then",
                    lt: "less then",
                    gte: "greater or equal then",
                    lte: "less or equal then",
                }
            }


            /*
            * generate uuid
            */
            function uuidv4() {
                return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
                    (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
                );
            }

            function getFilterTag($filter) {
                return `<div data-id="${$filter.id}" data-filter-start="${$filter.val}" class="bg-theme-white  rounded mt-1 me-2  overflow-hidden shadow">
                                <span class="text-white bg-theme-primary py-2 px-2 float-bottom">${$filter.label} ${optTranslate['fa'][$filter.cond]} :</span><span
                                    class="text-theme-primary py-2 px-2 float-bottom">${$filter.option === "option" ? $filter.textVal : $filter.val}</span>
                                <span class="bg-theme-primary text-theme-white  py-2 px-2 remove cursor-pointer float-bottom">x</span>
                            </div>`
            }

            $('div[data-type]').hide();
            $('div[data-start]').hide();

            $(document).ready(function () {
                $('tr').removeClass('intro-x');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                let filters = []
                let filter = {
                    id: "",
                    label: "",
                    column: "",
                    cond: "",
                    val: ""
                };
                let columns =@json($data->columns);


                function resetFilterForm() {
                    filter = {};

                    $('#filterColumn').prop('selectedIndex', 0);

                    $('div[data-type]').hide()
                    $('div[data-type] .input').prop('selectedIndex', 0);

                    $('div[data-start]').hide()
                    $('div[data-start] .input').val("");
                }


                let filterType;
                $('#filterColumn').on('change', function (el) {
                    const selectedIndex = $('#filterColumn :selected').val()
                    const selected = columns.find(col => col.unique === selectedIndex);

                    filterType = selected.type;
                    filter.label = selected.label;
                    filter.column = selected.unique;
                    filter.option = "normal";


                    if (selected.filterList.length > 0) {
                        filterType = "options";
                        filter.option = "option";
                        filter.cond = "in";
                        $('#options').empty();
                        $.each(selected.filterList, function (index, item) {
                            $('#options').append(new Option(item.label, item.start));
                        });
                    }

                    $('div[data-type]').hide();
                    $('div[data-start]').hide()
                    console.log(filterType)
                    $('div[data-type=' + filterType + ']').show();
                });

                $('div[data-type]').on('change', function (el) {
                    if (!filter.cond) {
                        filter.cond = $('div[data-type=' + filterType + '] :selected').val();
                        $('div[data-start]').hide();
                        $('div[data-start=' + filterType + ']').show();
                    }
                });


                $('#add-filter').click(function () {


                    filter.id = uuidv4();
                    if (!filter.column || filter.column == "") {
                        resetFilterForm();
                        $.toast("@lang('panel_ui::panel.choose_column_validate')")
                        return;
                    }
                    // Todo another component date...
                    if (filterType === "options") {
                        filter.val = $('#options :selected').val();
                        filter.textVal = $('#options :selected').text();
                        const foundIndex = filters.findIndex(x => x.column === filter.column);

                        if (foundIndex !== -1) {
                            filters[foundIndex].val.push(filter.val);
                        } else {
                            filter.val = [filter.val];
                            filters.push(filter);
                        }
                    } else {
                        filter.val = $('div[data-start=' + filterType + '] .input').val();
                        if (!filter.val) {
                            $.toast("@lang('panel_ui::panel.choose_column_validate_opt')")
                            return;
                        }
                        filters.push(filter);
                    }

                    // Todo change to another class name

                    $(this).closest('.dropdown-box').removeClass('show')
                    $('#filter-box').append(getFilterTag(filter))
                    resetFilterForm();

                    data.filter = filters;
                    fetch_data();
                });

                $('#filter-box').on('click', '.remove', function () {
                    const parent = $(this).closest('div');
                    filter_id = parent.data('id')
                    filter_value = parent.data('filter-start')
                    parent.remove();
                    const foundIndex = filters.findIndex(f => f.id !== filter_id);
                    if (filters[foundIndex] && Array.isArray(filters[foundIndex].val)) {
                        filters[foundIndex].val = filters[foundIndex].val.filter(start => parseInt(start) != filter_value);
                    } else {
                        filters = filters.filter(f => f.id !== filter_id);
                    }
                    data.filter = filters;
                    fetch_data();
                });

                let data = {
                    search: undefined,
                    page: 1,
                    filter: [],
                @if(isset($forced_data))
                @foreach($forced_data as $key => $start)
                {{$key}}:
                '{{$start}}',
                @endforeach
                @endif
            }

                /*
                * search field
                * */
                $('input[name="search"]').keyup(delayTyping(function (e) {
                    data.search = this.start;
                    $('#search_export').val(this.start)
                    fetch_data();
                }, 500));

                function delayTyping(callback, ms) {
                    var timer = 0;
                    return function () {
                        var context = this, args = arguments;
                        clearTimeout(timer);
                        timer = setTimeout(function () {
                            callback.apply(context, args);
                        }, ms || 0);
                    };
                }


                /*
                * sort
                * */


                $('#table_data').on('click', '.sortable', function () {
                    var $this = $(this);

                    var asc = $this.hasClass('asc');
                    var desc = $this.hasClass('desc');
                    $('#table_data .sortable').removeClass('asc').removeClass('desc');
                    var dir;
                    if (desc || (!asc && !desc)) {
                        $this.addClass('asc');
                        dir = 'asc';
                    } else {
                        $this.addClass('desc');
                        dir = 'desc';
                    }
                    data.sort = {};
                    data.sort['column'] = $this.data('index');
                    data.sort['dir'] = dir;
                    fetch_data();
                });


                /*
                * pagination Ajax
                * */
                $(document).on('click', '.pagination a', function (event) {
                    event.preventDefault();
                    data.page = $(this).attr('href').split('page=')[1];
                    fetch_data(false);
                });

                function fetch_data(reset = true) {
                    if (reset) {
                        data.page = 1;
                    }
                    $('#table_data').html("");
                    $('#loading').show()
                    $.ajax({
                        url: "{{ route(\Illuminate\Support\Facades\Route::currentRouteName().'_data',\Illuminate\Support\Facades\Route::current()->parameters) }}",
                        data: clean(data),
                        method: 'post',
                        success: function (data) {
                            $('#loading').hide();
                            $('#table_data').html(data);
                            feather.replace()
                        }
                    });
                }

                $('.export').click(function () {
                    $('#export-form input[name="format"]').val($(this).data('format'));
                    $('#export-form').submit();
                });


                function clean(obj) {
                    var propNames = Object.getOwnPropertyNames(obj);
                    for (var i = 0; i < propNames.length; i++) {
                        var propName = propNames[i];
                        if (obj[propName] === null || obj[propName] === undefined || obj[propName] === "") {
                            delete obj[propName];
                        }
                    }
                    return obj;
                }


                // var container = document.getElementById('sortable');
//                 Sortable.create(container)


                // var sortableTable = dragula([container], {
                //     direction: 'vertical'
                // });
                //
                //
                // sortableTable.on('drag', function (el) {
                //     $(el).removeClass('intro-x')
                // });
                // sortableTable.on('dragend', function () {
                //
                // });
            });


            // .on('drag', function (el) {
            //     el.className = el.className.replace('ex-moved', '');
            // }).on('drop', function (el) {
            // el.className += ' ex-moved';
            // }).on('over', function (el, container) {
            //     container.className += ' ex-over';
            // }).on('out', function (el, container) {
            //     container.className = container.className.replace('ex-over', '');
            // });


            /*
            *  modal ajax sent funcations
            * */


            $('body').on('click', 'a[data-toggle="modal-confirm"]', function () {
                changeConfirmModal('init');
                const target_modal = $('#confirmation-ajax-modal');
                const url = $(this).data('url');
                const id = $(this).data('id');
                const method = $(this).data('method');
                const title = $(this).data('title');
                const desc = $(this).data('desc');
                const confirm_btn = $(this).data('confirm');
                target_modal.find('.title').text(title)
                target_modal.find('.desc').text(desc)
                target_modal.find('.ajax-button').text(confirm_btn)
                target_modal.find('.ajax-button').data('url', url);
                target_modal.find('.ajax-button').data('method', method);
                target_modal.find('.ajax-button').data('id', id);
                target_modal.modal('show')
            });

            $('body').on('click', '.ajax-button', function () {
                const url = $(this).data('url');
                const id = $(this).data('id');
                const method = $(this).data('method');
                changeConfirmModal('loading')
                $.ajax({
                    url: url,
                    // data: ,
                    method: method,
                    success: function (data) {
                        if (data === 'ok') {
                            changeConfirmModal('done');
                            $('tr[data-id="' + id + '"]').remove();
                            $('tr').removeClass('intro-x')
                        }else {
                            changeConfirmModal('fail');
                        }
                    },
                    error: function () {
                        changeConfirmModal('fail')
                    },
                });

            });

            const modal_status = ['init', 'loading', 'done', 'fail']

            function changeConfirmModal(targetStatus) {
                modal_status.forEach(function (status) {
                    $(`.modal-${status}`).hide()
                });
                $(`.modal-${targetStatus}`).show()
            }

        </script>
    @endpush
@endsection
