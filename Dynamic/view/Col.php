<?php


namespace Modules\PanelCore\Dynamic\view;


use Modules\PanelCore\DataGrid\Types\MethodType;
use Modules\PanelCore\Dynamic\core\Element;

class Col extends Element
{


    public bool $transparent = false;
    public bool $isFlex = false;
    public int $gap = 3;
    public array $elements;

    public function __construct(array $elements, string $title = null, int $col = 12,bool $transparent=false)
    {
        $this->elements = $elements;
        $this->col = $col;
        $this->transparent = $transparent;
        $this->title = $title;
    }

    /**
     * @return Col
     */
    public function setTransparent(): Col
    {
        $this->transparent = true;
        return $this;
    }

    /**
     * @return Col
     */
    public function setIsFlex(): Col
    {
        $this->isFlex = true;
        return $this;
    }

    /**
     * @return Col
     */
    public function makeNormal(): Col
    {
        $this->isFlex = true;
        $this->transparent = true;
        return $this;
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
        return view('panel_ui::components.view.column', [
            'title' => $this->title,
            'elements' => $this->elements,
            'col' => $this->col,
            'gap' => $this->gap,
            'transparent' => $this->transparent,
            'isFlex' => $this->isFlex,
        ]);
    }
}
