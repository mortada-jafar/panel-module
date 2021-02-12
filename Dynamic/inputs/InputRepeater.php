<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class InputRepeater extends Field
{


    public array $elements;
    public int $count;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param null $value
     * @param int $col
     */
    public function __construct(array $elements,string $name, string $label, $value=null,int $col=12)
    {
        parent::__construct(FieldType::IMAGE, $name, $label,$value,$col);
        $this->elements = $elements;
    }

    public function render()
    {
        return view('panel_ui::components.form.InputRepeater', [
            'label' => $this->label,
            'value' => $this->value ?? old($this->name),
            'name' => $this->name,
            'col' => $this->col,
            'elements' => $this->elements,

        ]);
    }
}
