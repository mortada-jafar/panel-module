<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\ContentType;
use Modules\PanelCore\Dynamic\enums\FieldType;

class CheckBox extends Field
{
    public array $items;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param array $items
     */
    public function __construct(string $name, string $label, array $items)
    {
        parent::__construct(FieldType::CHECK_BOX, $name, $label);
        $this->items = $items;
    }


    public function render()
    {

        return view('panel_ui::components.form.checkbox', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => old($this->name),
            'col' => $this->col,
            'items' => $this->items,
        ]);
    }
}
