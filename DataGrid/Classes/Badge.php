<?php
namespace Modules\PanelCore\DataGrid\Classes;

class Badge
{
    public string $text;
    public string $bg_color;
    public string $color;

    /**
     * Badge constructor.
     * @param string $text
     * @param string $bg_color
     * @param string $color
     */
    public function __construct(string $text, string $bg_color, string $color)
    {
        $this->text = $text;
        $this->color = $color;
        $this->bg_color = $bg_color;
    }


}
