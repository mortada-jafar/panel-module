<?php

namespace Modules\PanelCore\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\PanelCore\Entities\Lang;
use Modules\PanelCore\Http\Actions\TranslateEditForm;
use Symfony\Component\HttpFoundation\Request;

class TranslateController extends Controller
{

    public function index()
    {
//        dd(base_path() . '/Modules');
        $module_paths = File::directories(base_path() . DIRECTORY_SEPARATOR . 'Modules');
        $lang_path = DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'lang' . DIRECTORY_SEPARATOR;
        $langs = Lang::orderBy('is_master', 'desc')->get();
        $translates = [];
        foreach ($module_paths as $index => $module_path) {
            $module_name = Str::afterLast($module_path, DIRECTORY_SEPARATOR);
//            dd($module_name);
            foreach ($langs as $lang) {
                $lang_code = $lang->code;
                if (!File::exists($module_path . $lang_path . $lang_code)) {
                    continue;
                }
                $files = File::files($module_path . $lang_path . $lang_code);
//                dd($files);
                foreach ($files as $file) {
                    $fileName = preg_split('/\./', $file->getBasename())[0];
                    $translates[$module_name]['file_name'] = $fileName;
                    $translates[$module_name]['translates'][$fileName]['path'] = $file->getRealPath();
                    $translates[$module_name]['translates'][$fileName][$lang_code] = File::getRequire($file->getPathname());
                }
            }

        }
//        dd($translates);

//        $language_data = File::getRequire(base_path() . "/resources/lang/fa/" . $file . ".php");

        $form = new TranslateEditForm($langs, $translates);

        return view('panel_ui::dynamic.edit', compact('form'));
    }

    public function updateTranslates(Request $request)
    {

        foreach ($request->translates as $moduleName => $translate) {

            foreach ($translate as $fileName => $translateFile) {
                foreach ($translateFile as $langName => $trans) {
                    $filePath = base_path() . DIRECTORY_SEPARATOR . "Modules" . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . "Resources" . DIRECTORY_SEPARATOR . "lang" . DIRECTORY_SEPARATOR . $langName . DIRECTORY_SEPARATOR . $fileName . ".php";
                    $temp =  File::makeDirectory(base_path() . DIRECTORY_SEPARATOR . "Modules" . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . "Resources" . DIRECTORY_SEPARATOR . "lang" . DIRECTORY_SEPARATOR . $langName, 0755, false, true);
                    // TODO: cjech func
                    dd(exec("ls -all "), exec("pwd"), exec("php -v"), exec("nginx -v"), $temp, $filePath);
                    $file = fopen($filePath, 'w+');
                    fwrite($file, " <?php \nreturn  " . var_export($trans, true) . ";");
                    fclose($file);
                }
            }
        }
        return Redirect()->back()->with('msg_update', trans('app.update_success_message'));


    }
}
