<?php


namespace Modules\PanelCore\Http\Actions;


use Illuminate\Support\Arr;
use Modules\PanelCore\Dynamic\core\Breadcrumb;
use Modules\PanelCore\Dynamic\core\DynamicForm;
use Modules\PanelCore\Dynamic\enums\ContentType;
use Modules\PanelCore\Entities\Lang;
use function Matrix\trace;

class TranslateEditForm extends DynamicForm
{

    private $langs;
    private array $translates;

    /**
     * TranslateEditForm constructor.
     * @param $langs
     * @param array $translates
     */
    public function __construct($langs, array $translates)
    {
        $this->langs = $langs;
        $this->translates = $translates;
    }


    public function title()
    {
        return trans('panel_ui::panel.languages');
    }

    public function getRules()
    {
        return [
//            'name' => 'required|max:255',
        ];
    }


    public function columns()
    {
//        dd($this);
        $tabs = [];
        $langs = Lang::orderBy('is_master', 'desc')->get();

        foreach ($this->translates as $module_name => $translate) {
            $translateFileTabs = [];
            foreach ($translate['translates'] as $translateFileName => $translateFile) {
                if (!isset($translateFile['fa'])) {
                    continue;
                }
                $inputs = [];

                foreach ($translateFile['fa'] as $key => $value) {
                    if (is_array($value)) {

                        foreach ($value as $keyy => $value) {
                            foreach ($langs as $index => $lang) {
                                $inputs[] = textInput("translates[$module_name][$translateFileName][$lang->code][$key][$keyy]",
                                    "$keyy - $lang->name")
                                    ->withValue(isset($translateFile[$lang->code], $translateFile[$lang->code][$key][$keyy], $translateFile[$lang->code][$key][$keyy]) ? $translateFile[$lang->code][$key][$keyy] : "")
                                    ->withCol(4);
                            }

                        }
                        continue;
                    }

                    foreach ($langs as $index => $lang) {
                        $inputs[] = textInput("translates[$module_name][$translateFileName][$lang->code][$key]",
                            "$key - $lang->name")
                            ->withValue(isset($translateFile[$lang->code], $translateFile[$lang->code][$key], $translateFile[$lang->code][$key]) ? $translateFile[$lang->code][$key] : "")
                            ->withCol(4);
                    }

                }
                $translateFileTabs[] = tab($translateFileName, $inputs);
            }
            if (count($translateFileTabs) > 0) {
                $tabs[] = tab($module_name, [tabCol($translateFileTabs)]);
            }

        }
//        dd($tabs);
        return [
            tabCol(
                $tabs
            ),
        ];
    }

    public function action()
    {
        return route('system.translates.update');
    }

    public function getBreadcrumbs()
    {
        return [
            new Breadcrumb(trans('panel_ui::panel.languages'))
        ];
    }


}
