<?php
namespace Modules\PanelCore\DataGrid\Classes;

class Icon
{
    public string $name;
    public string $color;
    public ?string $text;

    /**
     * Icon constructor.
     * @param $name
     * @param $color
     * @param $text
     */
    public function __construct($name, $color, $text = null)
    {
        $this->name = $name;
        $this->color = $color;
        $this->text = $text;
    }

}
