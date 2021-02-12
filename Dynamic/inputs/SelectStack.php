<?php


namespace Modules\PanelCore\Dynamic\inputs;

use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class SelectStack extends Field
{
    public array $list;
    public bool $isMulti;
    public ?string  $placeholder;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param array $list
     * @param string|null $placeholder
     * @param bool $isMulti
     */
    public function __construct(string $name, string $label, array $list, string $placeholder = null, bool $isMulti = false)
    {
        parent::__construct(FieldType::SELECT, $name, $label);
        $this->list = $list;
        $this->isMulti = $isMulti;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('panel_ui::components.form.select-stack.select-stack', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value??old($this->name),
            'col' => $this->col,
            'list' => $this->list,
            'multiple' => $this->isMulti,
            'placeholder' => $this->placeholder
        ]);
    }
}
