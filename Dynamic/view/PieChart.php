<?php


namespace Modules\PanelCore\Dynamic\view;

use Modules\PanelCore\Dynamic\core\Element;
use Modules\PanelCore\Dynamic\enums\FieldType;

class PieChart extends Chart
{
    public string $type = "pie";




    public function render()
    {
        return view('panel_ui::components.view.chart.pie', [
            $this->getSpecData(),
            'type' => $this->type,
            'colors' => $this->colors,
            'title' => $this->title,
            'data' => $this->data,
            'col' => $this->col,
            'legend' => $this->legend,
        ]);
    }

}
