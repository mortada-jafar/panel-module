<?php

namespace Modules\PanelCore\Dynamic\view;

use Modules\PanelCore\Dynamic\core\Element;

class Avatar extends Element
{
    public $image = null;
    public string $type = 'avatar';
    public ?string $name;
    public ?string $bio;

    public function __construct($image = null, string $name = null, string $bio = null, int $col = 6)
    {
        $this->image = $image;
        $this->name = $name;
        $this->bio = $bio;
        $this->col = $col;
    }

    public function render()
    {
        return view('panel_ui::components.view.avatar', [
            'image' => $this->image,
            'name' => $this->name,
            'bio' => $this->bio,
            'col' => $this->col,
        ]);
    }
}
