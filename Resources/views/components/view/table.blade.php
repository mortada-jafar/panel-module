<div class="sm:col-span-{{$col}}   col-span-12">
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
            <tr>
                @foreach($columns as  $column)
                    <th class="{{ $column->float }}  whitespace-no-wrap"
                        data-index="{{ $column->index }}">{{ $column->label }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @forelse($records as $key => $record)
                <tr class="intro-x">
                    @foreach($columns as $column)
                        <td class="w-40">
                            @include('panel_ui::components.table.'.$column->getWrapper(),[
                                'data'=>$record,
                                'column'=>$column,
                            ])
                        </td>
                    @endforeach
                </tr>
            @empty
                <tr class="intro-x">
                        <td class="w-40 text-center" colspan="{{ count($columns) }}">
                            @lang('panel_ui::pagination.sEmptyTable')
                        </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
