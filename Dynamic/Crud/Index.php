<?php

namespace Modules\PanelCore\Dynamic\Crud;

abstract class Index
{

    public string $title;
    public string $createdText;
    public bool $createable = true;
    public bool $exportable = true;

    /**
     * Index constructor.
     * @param string $title
     * @param string|null $createdText
     */
    public function __construct(string $title, string $createdText = null)
    {
        $this->title = $title;
        $this->createdText = $createdText ?? trans('panel_ui::panel.create');
    }

}
