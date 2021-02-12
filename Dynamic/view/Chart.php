<?php


namespace Modules\PanelCore\Dynamic\view;

use Modules\PanelCore\Dynamic\core\Element;
use Modules\PanelCore\Dynamic\enums\Color;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Chart extends Element
{


    public int $col = 3;
    public array $values;
    public array $data;
    public array $colors;
    public string $type;
    public bool $legend = true;
    private array $labels;

    /**
     * Chart constructor.
     * @param array $data
     * @param string|null $title
     * @param array $colors
     */
    public function __construct(array $data, array $labels, string $title = null, int $col= 6)
    {
        $this->title = $title;
        $this->data = $data;
//        $this->values = $values;
        $this->labels = $labels;
        $this->colors = Color::chart_colors;
        $this->col = $col;
    }


    public function render()
    {
        return view('panel_ui::components.view.chart', [
            $this->getSpecData(),
            'type' => $this->type,
            'colors' => $this->colors,
            'labels' => $this->labels,
            'title' => $this->title,
            'data' => $this->data,
            'col' => $this->col,
            'legend' => $this->legend,
        ]);
    }

    public function getSpecData()
    {
        return [];
    }


}
