<div class="overflow-auto">
    <table class="table table-report -mt-2">
        <thead>
        <tr>
            @if($data->enableAutoIncrement)
            <th class="text-center whitespace-no-wrap">@lang('panel_ui::panel.number')</th>
            @endif
            @foreach($data->columns as  $column)
                <th
                    class="
                    @if($data->sortColumnOrder &&  $data->sortColumnIndex==$column->index)
                    {{$data->sortColumnOrder}}
                    @endif
                    {{ $column->float }} @if($column->isSortable()) sortable @endif whitespace-no-wrap"
                    data-index="{{ $column->index }}">{{ $column->label }}</th>
            @endforeach
            @if($data->enableActions)
                <th class="text-center whitespace-no-wrap">@lang('panel_ui::panel.action')</th>
{{--                <th class="text-center whitespace-no-wrap">@lang('panel_ui::panel.action')</th>--}}
            @endif

        </tr>
        </thead>
        <tbody id="sortable">
        @foreach($data->records as $key => $record)
            <tr  data-id="{{$record->{$data->index} }}">
                @if($data->enableAutoIncrement)
                <td class="w-40">
                    {{(($data->records->currentPage()-1)*$data->records->perPage())+$loop->index+1}}
                </td>
                @endif
                @foreach($data->columns as $column)
                    <td class="w-40">
                        @include('panel_ui::components.table.'.$column->getWrapper(),[
                            'data'=>$record,
                            'column'=>$column,
                        ])
                    </td>
                @endforeach
                @if ($data->enableActions)

                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            @foreach ($data->actions as  $action)
                                @if(($action->visible)($record))
                                    @if($action->methodType==\Modules\PanelCore\DataGrid\Types\MethodType::JAVASCRIPT)
                                        <div class="dropdown relative">
                                            <a class="dropdown-toggle flex items-center mr-3" href="javascript:;">
                                                <i data-feather="{{ $action->icon }}"
                                                   class="w-4 h-4 mx-1"></i> {{ $action->label }} </a>
                                            <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20 shadow z-40">
                                                <div class="dropdown-box__content box p-2">
                                                    @foreach ($action->childrenAction as  $action)
                                                        <a
                                                            style="color:{{$action->color}}"
                                                            @if(is_string($action->route))
                                                            href="{{ route($action->route, $record->{$data->index} ) }}"
                                                            @else
                                                            href="{{ ($action->route)($record) }}"
                                                            @endif
                                                            class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                                            <i data-feather="{{ $action->icon }}"
                                                               class="w-4 h-4 mx-1"></i> {{ $action->label }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($action->methodType==\Modules\PanelCore\DataGrid\Types\MethodType::GET)
                                        <a class="flex items-center mr-3"
                                           style="color:{{$action->color}}"
                                           @if(is_string($action->route))
                                           href="{{ route($action->route, $record->{$data->index} ) }}"
                                           @else
                                           href="{{ ($action->route)($record) }}"
                                            @endif
                                        >
                                            <i data-feather="{{ $action->icon }}"
                                               class="w-4 h-4 mx-1"></i> {{ $action->label }}
                                        </a>
                                    @else
                                        <a class="flex items-center"
                                           style="color:{{$action->color}}"
                                           href="javascript:;"
                                           data-toggle="modal-confirm"

                                           @if(is_string($action->route))
                                           data-url="{{ route($action->route, $record->{$data->index} ) }}"
                                           @else
                                           data-url="{{ ($action->route)($record) }}"
                                           @endif
                                           data-title="@lang('panel_ui::panel.delete_modal_title')"
                                           data-method="{{ $action->methodType }}"
                                           data-id="{{ $record->{$data->index} }}"
                                           data-desc="@lang('panel_ui::panel.delete_modal_desc')"
                                           data-confirm="@lang('panel_ui::panel.delete')"
                                           data-target="#confirmation-ajax-modal">
                                            <i data-feather="{{ $action->icon }}"
                                               class="w-4 h-4 mx-1"></i> {{ $action->label }}
                                        </a>
                                    @endif
                                @endif
                            @endforeach

                        </div>
                    </td>

                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(count($data->records)==0)
        <p class="text-center text-muted">
            @if(isset($init)&& $init)
                @lang('panel_ui::panel.empty_table')
            @else
                @lang('panel_ui::panel.search_empty_table')
            @endif
        </p>
    @endif
</div>
<!-- END: Data List -->
<!-- BEGIN: Pagination -->
<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
    <ul class="pagination">
        {!! $data->records->links('panel_ui::common.tailwind')  !!}
    </ul>
</div>



