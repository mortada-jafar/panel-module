<?php


namespace Modules\PanelCore\Dynamic\view;


use Modules\PanelCore\Dynamic\core\Element;

class Text extends Element
{
    public ?string $text;

    /**
     * Badge constructor.
     * @param string|null $text
     */
    public function __construct(string $text=null)
    {
        $this->text = $text;
    }


    public function render()
    {
        return view('panel_ui::components.view.text', [
            'text' => $this->text,
        ]);
    }
}
