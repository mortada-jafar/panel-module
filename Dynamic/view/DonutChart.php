<?php


namespace Modules\PanelCore\Dynamic\view;

use Modules\PanelCore\Dynamic\core\Element;
use Modules\PanelCore\Dynamic\enums\FieldType;

class DonutChart extends Chart
{
    public string $type = "doughnut";
    public int $cutoutPercentage = 80;


    public function getSpecData()
    {
        return [
            'cutoutPercentage' => $this->cutoutPercentage
        ];
    }
}
