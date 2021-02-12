<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class MultiFileInput extends Field
{


    public ?string $extensions;
    public int $count;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param string $extensions
     * @param null $value
     * @param int $count
     * @param int $col
     */
    public function __construct(string $name, string $label, string $extensions = "",$value=null, int $count = 1,int $col=6)
    {
        parent::__construct(FieldType::IMAGE, $name, $label);
        $this->extensions = $extensions;
        $this->count = $count;
        $this->value = $value;
        $this->col = $col;
    }

    public function render()
    {
        return view('panel_ui::components.form.multi_file_input', [
            'label' => $this->label,
            'value' => $this->value ?? old($this->name),
            'name' => $this->name,
            'col' => $this->col,
            'class'=>$this->class,
            'extensions' => $this->extensions,
            'count' => $this->count,
        ]);
    }
}
