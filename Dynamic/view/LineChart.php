<?php


namespace Modules\PanelCore\Dynamic\view;

class LineChart extends Chart
{

    public int $col = 6;
    public string $type = "line";
    public bool $legend = false;
//    public array x


    public function getSpecData()
    {
        return [

        ];
    }
}
