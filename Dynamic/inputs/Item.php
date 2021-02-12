<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;

class Item
{
    public string $value;
    public string $label;
    public ?string $image;
    public bool $checked;

    /**
     * RadioItem constructor.
     * @param string $value
     * @param string $label
     * @param bool $checked
     * @param string|null $image
     */
    public function __construct(string $value, string $label, bool $checked=false,string $image=null)
    {
        $this->value = $value;
        $this->label = $label;
        $this->checked = $checked;
        $this->image = $image;
    }
}
