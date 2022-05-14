<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogsController extends Controller
{
    public function getAllLogs() {
        return Log::all();
    }

    public function exportCSV() {
        return "export CSV here";
    }
}
