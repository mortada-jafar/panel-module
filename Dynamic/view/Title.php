<?php


namespace Modules\PanelCore\Dynamic\view;


use Modules\PanelCore\Dynamic\core\Element;

class Title extends Element
{
    public ?string $title;
    public ?string $link;
    public ?string $linkIcon;
    public ?string $linkText;

    /**
     * Image constructor.
     * @param string $title
     * @param string|null $link
     * @param string|null $linkText
     * @param string|null $linkIcon
     */
    public function __construct(string $title, string $link = null, string $linkText = null, string $linkIcon = null)
    {
        $this->title = $title;
        $this->link = $link;
        $this->linkIcon = $linkIcon;
        $this->linkText = $linkText;

    }


    public function render()
    {
        return view('panel_ui::components.view.title', [
            'title' => $this->title,
            'linkText' => $this->linkText,
            'link' => $this->link,
            'linkIcon' => $this->linkIcon,
        ]);
    }
}
