<?php


namespace Modules\PanelCore\Dynamic\view;


use Modules\PanelCore\DataGrid\Types\MethodType;
use Modules\PanelCore\Dynamic\core\Element;

class TabCol extends Element
{


    public array $tabs;
    public int $gap = 3;

    public function __construct(array $tabs, int $col = 12, string $title = null)
    {
        $tabs[0]->isActive = true;
        $this->tabs = $tabs;
        $this->col = $col;
        $this->title = $title;
    }


    /**
     * @param int $gap
     */
    public function setGap(int $gap): void
    {
        $this->gap = $gap;
    }

    public function render()
    {
        return view('panel_ui::components.view.tab_col', [
            'title' => $this->title,
            'tabs' => $this->tabs,
            'col' => $this->col,
        ]);
    }
}
