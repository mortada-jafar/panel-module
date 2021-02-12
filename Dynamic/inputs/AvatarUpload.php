<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class AvatarUpload extends Field
{
    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param string|null $value
     */
    public function __construct(string $name, string $label,string  $value=null)
    {
        parent::__construct(FieldType::IMAGE, $name, $label,$value);
    }

    public function render()
    {
        return view('panel_ui::components.form.avatar', [
            'label'=>$this->label,
            'value'=>$this->value ??old($this->name),
            'name'=>$this->name,
            'col'=>$this->col,
        ]);
    }
}
