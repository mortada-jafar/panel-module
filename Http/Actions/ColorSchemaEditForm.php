<?php


namespace Modules\PanelCore\Http\Actions;


use Modules\PanelCore\Dynamic\core\Breadcrumb;
use Modules\PanelCore\Dynamic\core\DynamicForm;
use Modules\PanelCore\Dynamic\enums\ContentType;
use function Matrix\trace;

class ColorSchemaEditForm extends DynamicForm
{


    private $colorLabels = [
        "primary",
        "secondary",
        "tertiaryColor",
        "secondaryDark",
        "secondaryLight",
        "white",
        "grey",
        "whitesmoke",
        "lightblue",
        "purple",
        "info",
        "danger",
    ];


    private $colors;

    /**
     * ColorSchemaEditForm constructor.
     * @param $colors
     */
    public function __construct($colors)
    {
        $this->colors = $colors;
    }


    public function title()
    {
        return trans('panel_ui::panel.theme_colors');
    }

    public function getRules()
    {
        return [
//            'name' => 'required|max:255',
        ];
    }


    public function columns()
    {
        $inputs = [];

        foreach ($this->colorLabels as $index=>$label) {
            $inputs[] = textInput("colors[]", trans("panel_ui::panel.$label"),ContentType::COLOR)->withValue($this->colors[$index])->withCol(3);
        }
        return [
            col(
                $inputs, trans('safe::account.account_details')
            )
        ];
    }

    public function action()
    {
        return route('system.save.colors');
    }

    public function getBreadcrumbs()
    {
        return [
            new Breadcrumb(trans('panel_ui::panel.theme_colors'))
        ];
    }


}
