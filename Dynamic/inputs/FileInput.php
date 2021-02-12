<?php


namespace Modules\PanelCore\Dynamic\inputs;


use Modules\PanelCore\Dynamic\core\Field;
use Modules\PanelCore\Dynamic\enums\ContentType;
use Modules\PanelCore\Dynamic\enums\FieldType;

class FileInput extends Field
{
    /**
     * Field constructor.
     * @param string $name
     * @param string $label
     * @param bool $countAble
     */
    public function __construct(string $name, string $label)
    {
        parent::__construct(FieldType::FILE, $name, $label);
    }

    public function render()
    {
        // TODO: Implement render() method.
    }
}
