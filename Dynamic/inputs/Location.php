<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Location extends Field
{

    public int $col = 12;
    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     */
    public function __construct(string $name, string $label)
    {
        parent::__construct(FieldType::MAP, $name, $label);
    }

    public function render()
    {

        return view('panel_ui::components.form.locationPicker', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => old($this->name),
            'col' => $this->col,
        ]);
    }
}
