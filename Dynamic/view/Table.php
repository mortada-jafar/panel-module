<?php

namespace Modules\PanelCore\Dynamic\view;

use Modules\PanelCore\Dynamic\core\Element;

class Table extends Element
{
    public array  $columns;
    public $records;
    public int $col=12;

//
    public function __construct(array $columns, $records, int $col= 6)
    {
        $this->columns = $columns;
        $this->records = $records;
        $this->col = $col;
    }

    public function render()
    {
        return view('panel_ui::components.view.table', [
            'columns' => $this->columns,
            'records' => $this->records,
            'col' => $this->col,
        ]);
    }
}
