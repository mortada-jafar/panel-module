<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

class Clear extends Field
{
    /**
     * Field constructor.
     */
    public function __construct()
    {
        parent::__construct(FieldType::CLEAR, "clear", "clear");
    }

    public function render()
    {

        return view('panel_ui::components.form.clear');
    }
}
