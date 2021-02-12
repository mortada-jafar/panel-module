<?php

namespace Modules\PanelCore\Dynamic\core;

class Breadcrumb
{
    public string $title;
    public ?string $url;

    /**
     * Breadcrumb constructor.
     * @param string $title
     * @param string|null $url
     */
    public function __construct(string $title, ?string $url = null)
    {
        $this->title = $title;
        $this->url = $url;
    }


}
