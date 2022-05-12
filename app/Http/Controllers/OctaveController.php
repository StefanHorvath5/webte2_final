<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OctaveController extends Controller {
    public function execQuery(Request $request) {
        $query = $request->input("query");
        $resp = [
            "success" => "true",
            "query" => $query
        ];
        return json_encode($resp);
    }
}
