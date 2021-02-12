<?php


namespace Modules\PanelCore\Dynamic\view;


use Illuminate\View\Component;
use Modules\PanelCore\Dynamic\core\Element;

class ListItem extends Element
{


    public ?Component $start;
    public ?Component $value1;
    public ?Component $value2;
    public ?Component $value3;
    public ?string $image;

    /**
     * ListItem constructor.
     * @param Component|null $start
     * @param Component|null $bottom
     * @param Component|null $end
     * @param Component|null $end2
     * @param int $col
     */
    public function __construct(Component $start = null, Component $bottom = null, Component $end = null, Component $end2 = null, string $image=null, int $col = 12)
    {
        $this->start = $start;
        $this->value1 = $bottom;
        $this->image = $image;
        $this->value2 = $end;
        $this->value3 = $end2;
        $this->col = $col;
    }


    public function render()
    {
        return view('panel_ui::components.view.list-item', [
            'image' => $this->image,
            'start' => $this->start,
            'bottom' => $this->value1,
            'value2' => $this->value2,
            'end2' => $this->value3,
            'col' => $this->col,
        ]);
    }
}
