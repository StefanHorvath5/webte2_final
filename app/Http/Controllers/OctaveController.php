<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class OctaveController extends Controller {
    public function execQuery(Request $request) {
        $preparedQuery = $request->input("query");
        $query = $preparedQuery;
        $query = 'octave-cli --eval "' . $query . '"';
        $output = "";
        exec($query, $output);
        $resp = [
            "success" => "true",
            "data" => $output
        ];
        return json_encode($resp);
    }
}
