<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\FieldType;

abstract class NestedList extends Field
{
    public array $list;

    public function __construct()
    {
        parent::__construct(FieldType::SELECT, '$name',' $label');
        $this->prepareData();

    }

    public function render()
    {

        return view('panel_ui::components.form.nested-list.nested-list', [
            'name' => $this->name,
            'label' => $this->label,
            'value' => $this->value??old($this->name),
            'col' => $this->col,
            'list' => $this->list,
        ]);
    }

    abstract function prepareData();
}
