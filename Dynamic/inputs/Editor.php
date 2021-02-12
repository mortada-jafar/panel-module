<?php

namespace Modules\PanelCore\Dynamic\inputs;

use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Editor extends Field
{
    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param string|null $value
     * @param int $col
     */

    public function __construct(string $name, string $label, string $value = null, int $col = 12)
    {
        parent::__construct(FieldType::EDITOR, $name, $label, $value, $col);
    }

    public function render()
    {


        return view('panel_ui::components.form.editor', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => old($this->name),
            'col' => $this->col,
        ]);
    }
}
