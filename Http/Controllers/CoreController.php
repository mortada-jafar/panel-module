<?php

namespace Modules\PanelCore\Http\Controllers;

use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\PanelCore\Exports\DataGridExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CoreController extends Controller
{

   protected $CrudClassName;
    /**
     * function for export datagrid
     *
     * @return BinaryFileResponse
     */
    public function indexExport()
    {
        $criteria = request()->all();

        $format = $criteria['format'];


        if (method_exists($this,'exportInstance')) {
            $gridInstance = $this->exportInstance();
        }
        else{
            $gridInstance =new  $this->CrudClassName();
        }

        $records = $gridInstance->export();

        if (!count($records)) {
            session()->flash('warning', trans('admin::app.export.no-records'));
            return redirect()->back();
        }


        $filename = date("y-m-d") . ".$format";

        return Excel::download(new DataGridExport($records), $filename);

        return redirect()->back();
    }


}
