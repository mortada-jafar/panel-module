<?php


namespace Modules\PanelCore\Dynamic\view;


use Modules\PanelCore\Dynamic\core\Element;

class Progress extends Element
{
    public float $progress;

    /**
     * Badge constructor.
     * @param float $progress
     */
    public function __construct(float $progress, int $col= 6)
    {
        $this->progress= $progress;
        $this->col = $col;
    }


    public function render()
    {
        return view('panel_ui::components.view.progress', [
            'progress' => $this->progress,
        ]);
    }
}
