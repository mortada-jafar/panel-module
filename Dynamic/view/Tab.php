<?php

namespace Modules\PanelCore\Dynamic\view;

use Modules\PanelCore\Dynamic\core\Element;

class Tab extends Element
{
    public string $id;
    public bool  $isActive=false;
    public array $elements;

    public function __construct(string $title, array $elements, int $col= 6)
    {
        $this->elements = $elements;
        $this->title = $title;
        $this->id = $title.random_int(10000,90000);
        $this->col = $col;
    }



    public function render()
    {
        return view('panel_ui::components.view.tab', [
            'id' => $this->id,
            'title' => $this->title,
            'isActive' => $this->isActive,
            'elements' => $this->elements,
        ]);
    }
}
