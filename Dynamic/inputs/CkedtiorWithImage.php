<?php

namespace Modules\PanelCore\Dynamic\inputs;

use Modules\PanelCore\Dynamic\enums\FieldType;

class CkedtiorWithImage extends Field
{
    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     */
    public function __construct(string $name, string $label)
    {
        parent::__construct(FieldType::CkeditorWithImage, $name, $label);
    }
}
