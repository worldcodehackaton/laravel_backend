<?php

namespace App\Http\Controllers;

use App\Export\ExportFactory;
use App\Http\Requests\ExportDownloadRequest;

class StatController extends Controller
{
    public function export(ExportDownloadRequest $request)
    {
        $export = $request->input('export');

        return ExportFactory::handle($export)->download();
    }
}
