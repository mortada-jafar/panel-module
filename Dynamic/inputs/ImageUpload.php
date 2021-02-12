<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class ImageUpload extends Field
{
    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     */
    public function __construct(string $name, string $label,int $col=12)
    {
        parent::__construct(FieldType::IMAGE, $name, $label);
        $this->col = $col;
    }

    public function render()
    {
        return view('panel_ui::components.form.fileUpload', [
            'label'=>$this->label,
            'value'=>old($this->name),
            'name'=>$this->name,
            'col'=>$this->col,
        ]);
    }
}
