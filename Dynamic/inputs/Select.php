<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Select extends Field
{
    public array $items;
    public bool $isMulti;
    public ?string  $placeholder;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param array $items
     * @param string|null $value
     * @param string|null $placeholder
     * @param bool $isMulti
     */
    public function __construct(string $name, string $label, array $items,string $value=null, string $placeholder = null, bool $isMulti = false)
    {
        parent::__construct(FieldType::SELECT, $name, $label,$value);
        $this->items = $items;
        $this->isMulti = $isMulti;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('panel_ui::components.form.select', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value??old($this->name),
            'col' => $this->col,
            'items' => $this->items,
            'multiple' => $this->isMulti,
            'placeholder' => $this->placeholder
        ]);
    }
}
