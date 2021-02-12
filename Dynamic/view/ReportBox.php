<?php


namespace Modules\PanelCore\Dynamic\view;


use Illuminate\View\Component;
use Modules\PanelCore\Dynamic\core\Element;
use Modules\PanelCore\Dynamic\enums\ContentType;
use Modules\PanelCore\Dynamic\enums\FieldType;

class ReportBox extends Element
{


    public ?string $title;
    public ?string $value;
    public ?string $value2;
    public ?Component $value3;
    public ?string $icon;

    public int $col = 3;

    /**
     * ReportBox constructor.
     * @param string $title
     * @param string|null $value
     * @param string|null $end
     * @param Component|null $end2
     * @param string|null $icon
     */
    public function __construct(string $title, ?string $value, ?string $end, ?Component $end2, ?string  $icon, int $col= 6)
    {
        $this->title = $title;
        $this->value = $value;
        $this->value2 = $end;
        $this->value3 = $end2;
        $this->icon = $icon;
        $this->col = $col;
    }


    public function render()
    {
        return view('panel_ui::components.view.report-box', [
            'title' => $this->title,
            'value' => $this->value,
            'value2' => $this->value2,
            'end2' => $this->value3,
            'icon' => $this->icon,
            'col' => $this->col,
        ]);
    }
}
