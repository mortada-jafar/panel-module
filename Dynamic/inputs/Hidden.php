<?php

namespace Modules\PanelCore\Dynamic\inputs;

use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Hidden extends Field
{
    /**
     * Field constructor.
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        parent::__construct(FieldType::HIDDEN, $name, '');
        $this->value = $value;
    }

    public function render()
    {

        return view('panel_ui::components.form.hiddenInput', [
            'name' => $this->name,
            'value' => $this->value,
        ]);
    }
}
