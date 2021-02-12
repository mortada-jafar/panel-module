<?php


namespace Modules\PanelCore\Dynamic\view;


use Modules\PanelCore\DataGrid\Types\MethodType;
use Modules\PanelCore\Dynamic\core\Element;

class Button extends Element
{


    public ?string $title;
    public ?string $link;
    public string $method;
    public string $target;
    public int $col=3;
//    public string $src;

    /**
     * Button constructor.
     * @param string $title
     * @param string|null $link
     * @param string $method
     * @param string $target
     */
    public function __construct(string $title, string $link=null,string $method=MethodType::GET, $target = '_self', int $col= 6)
    {
        $this->title = $title;
        $this->link = $link;
        $this->method = $method;
        $this->target = $target;
        $this->col = $col;
    }


    public function render()
    {
        return view('panel_ui::components.view.button', [
            'title' => $this->title,
            'link' => $this->link,
            'method' => $this->method,
            'col' => $this->col,
            'target' => $this->target,
        ]);
    }
}
