<?php


namespace Modules\PanelCore\Dynamic\inputs;

use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\ContentType;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Toggle extends Field
{
    public string $offLabel;
    public string $onLabel;

    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param string $onLabel
     * @param string $offLabel
     * @param string|null $value
     */
    public function __construct(string $name, string $label, string $onLabel, string $offLabel, string $value=null)
    {
        parent::__construct(FieldType::TOGGLE, $name, $label,$value);
        $this->onLabel = $onLabel;
        $this->offLabel = $offLabel;
    }

    public function render()
    {
        return view('panel_ui::components.form.toggle', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value ?? old($this->name),
            'col' => $this->col,
            'onLabel'=>$this->onLabel,
            'offLabel'=>$this->offLabel,
        ]);
    }
}
