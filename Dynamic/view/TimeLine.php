<?php


namespace Modules\PanelCore\Dynamic\view;


use Illuminate\View\Component;
use Modules\PanelCore\Dynamic\core\Element;

class TimeLine extends Element
{

    private array $elements;

    /**
     * ListItem constructor.
     * @param string $title
     * @param array $elements
     * @param int $col
     */
    public function __construct(string $title, array $elements, int $col = 12)
    {
        $this->elements = $elements;
        $this->title = $title;
        $this->col = $col;
    }


    public function render()
    {
        return view('panel_ui::components.view.timeline', [
            'elements' => $this->elements,
            'title' => $this->title,
            'col' => $this->col,
        ]);
    }
}
