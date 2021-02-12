<?php


namespace Modules\PanelCore\Dynamic\view;

use Modules\PanelCore\Dynamic\core\Element;
use Modules\PanelCore\Dynamic\enums\FieldType;

class BarChart extends Chart
{
    public string $type = "bar";
    public bool $legend = false;
//    public array x


    public function getSpecData()
    {
        return [

        ];
    }
}
