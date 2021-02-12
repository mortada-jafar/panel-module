@if($column->type==\Modules\PanelCore\DataGrid\Types\ColumnType::DATE)
    {{ getLocalDate($data->{$column->index}) }}
@elseif($column->type==\Modules\PanelCore\DataGrid\Types\ColumnType::CURRENCY)
    <span class="currency">
    {{ $data->{$column->index} }}
    </span>
@else
    {{ $data->{$column->index} }}
@endif

