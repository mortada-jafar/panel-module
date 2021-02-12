<?php


namespace Modules\PanelCore\Dynamic\view;


use Modules\PanelCore\Dynamic\core\Element;

class ImageBox extends Element
{


    public ?string $title;
    public string $src;

    /**
     * Image constructor.
     * @param string $title
     * @param string $src
     */
    public function __construct(string $title, string $src, int $col = 6)
    {
        $this->title = $title;
        $this->src = $src;
        $this->col = $col;
    }


    public function render()
    {
        return view('panel_ui::components.view.imageBox', [
            'title' => $this->title,
            'src' => $this->src,
            'col' => $this->col,
        ]);
    }
}
