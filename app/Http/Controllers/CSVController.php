<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class CSVController extends Controller {

    public function getCSV(){

        $logs = Log::get();

        if(count($logs) == 0) {
            return "There are no logs";
        }

        $headers = array(
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Disposition' => 'attachment; filename=download.csv',
            'Expires' => '0',
            'Pragma' => 'public',
        );

        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        $filename =  public_path("files/download.csv");
        $handle = fopen($filename, 'w');

        fputcsv($handle, [
            "query",
            "status",
            "error_description",
            "timestamp"
        ]);

        foreach ($logs as $log) {
            fputcsv($handle, [
                $log->query,
                $log->status,
                $log->error_description,
                $log->created_at
            ]);
        }
        fclose($handle);

        return Response::download($filename, "download.csv", $headers);
    }

}
