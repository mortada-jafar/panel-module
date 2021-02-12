<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\ContentType;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Radio extends Field
{
    public array $items;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param array $items
     * @param string|null $value
     */
    public function __construct(string $name, string $label, array $items,string $value=null)
    {
        parent::__construct(FieldType::RADIO, $name, $label,$value);
        $this->items = $items;
    }

    public function render()
    {
        return view('panel_ui::components.form.radio', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value ?? old($this->name),
            'col' => $this->col,
            'items' => $this->items,
        ]);
    }
}
