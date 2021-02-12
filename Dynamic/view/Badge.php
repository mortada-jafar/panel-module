<?php


namespace Modules\PanelCore\Dynamic\view;


use Modules\PanelCore\Dynamic\core\Element;

class Badge extends Element
{
    public string $text;
    public string $bg_color;
    public string $color;
    public ?string $icon;
    public bool $rounded = true;

    /**
     * Badge constructor.
     * @param string $text
     * @param string $bg_color
     * @param string $color
     * @param string|null $icon
     */
    public function __construct(string $text, string $bg_color, string $color,string $icon=null, int $col= 6)
    {
        $this->text = $text;
        $this->color = $color;
        $this->bg_color = $bg_color;
        $this->icon = $icon;
        $this->col = $col;

    }


    public function render()
    {
        return view('panel_ui::components.view.badge', [
            'text' => $this->text,
            'bg_color' => $this->bg_color,
            'color' => $this->color,
            'icon' => $this->icon,
            'isCopyable' => $this->isCopyable,
            'rounded' => $this->rounded,
        ]);
    }
}
