<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Illuminate\View\Component;
use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\ContentType;
use Modules\PanelCore\Dynamic\enums\FieldType;


class TextInput extends Field
{
    public $contentType;
    public $checkbox;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param string $contentType
     * @param string|null $value
     * @param int $col
     * @param bool $hidden
     * @param string|null $id
     * @param bool $isMulti
     * @param string|null $familyName
     * @param Component $addons
     */
    public function __construct(string $name, string $label, $contentType = ContentType::TEXT, string $value = null, int $col = 6,bool $hidden=false, string $id = null,bool $isMulti=false,string $familyName=null,$checkbox=null)
    {
        parent::__construct(FieldType::TEXT, $name, $label, $value, $col, $id, $hidden,$isMulti,$familyName);
        $this->contentType = $contentType;
        $this->checkbox = $checkbox;
    }


    public function render()
    {
        return view('panel_ui::components.form.input', [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->contentType,
            'label' => $this->label,
            'value' => $this->value ?? old($this->name),
            'col' => $this->col,
            'is_hidden' => $this->hidden,
            'class' => $this->class,
            'isMulti' => $this->isMulti,
            'familyName' => $this->familyName,
            'checkbox' => $this->checkbox,
        ]);
    }
}
