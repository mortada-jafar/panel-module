<?php

namespace Modules\PanelCore\DataGrid\Columns\Core;

use Modules\PanelCore\DataGrid\Types\ColumnType;

class Action
{

    public string $label;
    public string $icon;
    public string $methodType;
    public $route;
    public string $color;
    public $visible;
    public array  $childrenAction;

    /**
     * Action constructor.
     * @param string $label
     * @param string $icon
     * @param string $methodType
     * @param $route
     * @param string $color
     * @param null $visible
     */
    public function __construct(string $label, string $icon, string $methodType, $route, string $color = '#000', $visible = null)
    {
        $this->label = $label;
        $this->icon = $icon;
        $this->methodType = $methodType;
        $this->route = $route;
        $this->color = $color;
        if ($visible) {
            $this->visible = $visible;
        } else {
            $this->visible = function () {
                return true;
            };
        }

    }

    /**
     * @param mixed ...$actions
     * @return Action
     */
    public function withChildren(...$actions)
    {
        $this->childrenAction = $actions[0];
        return $this;
    }

}
