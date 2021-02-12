<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Select2 extends Field
{
    public array $items;
    public ?string $onChange;
    public bool $isMulti;
    public ?string $placeholder;
    public bool $imageable;
    public bool $init = true;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param array $items
     * @param mixed|null $value
     * @param string|null $placeholder
     * @param null $onChange
     * @param bool $isMulti
     * @param bool $imageable
     * @param bool $init
     */
    public function __construct(string $name, string $label, array $items, string|array $value = null, string $placeholder = null, $onChange = null, bool $isMulti = false, bool $imageable = false, bool $init = true)
    {
        parent::__construct(FieldType::SELECT2, $name, $label,$value);
        $this->items = $items;
        $this->isMulti = $isMulti;
        $this->placeholder = $placeholder;
        $this->onChange = $onChange;
        $this->imageable = $imageable;
        $this->init = $init;
    }


    public function render()
    {
        return view('panel_ui::components.form.select2', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value ?? old($this->name),
            'col' => $this->col,
            'items' => $this->items,
            'init' => $this->init,
            'multiple' => $this->isMulti,
            'onChange' => $this->onChange,
            'placeholder' => $this->placeholder,
            'imageable' => $this->imageable
        ]);
    }
}
