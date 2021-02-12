<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class TextArea extends Field
{


    public bool $countAble;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param bool $countAble
     */
    public function __construct(string $name, string $label, bool $countAble = false)
    {
        parent::__construct(FieldType::TEXTAREA, $name, $label);
        $this->countAble=$countAble;
    }

    public function render()
    {
        return view('panel_ui::components.form.textArea', [
            'label'=>$this->label,
            'value'=>$this->value ?? old($this->name),
            'name'=>$this->name,
            'countAble'=>$this->countAble,
            'col'=>$this->col,
        ]);
    }
}
