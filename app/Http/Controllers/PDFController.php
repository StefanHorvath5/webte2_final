<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller {
    
    public function downloadPDF() {

        $pdf =  PDF::loadView('instructions', [
            'download' => "true"
        ]);

        return $pdf->download('instructions.pdf');
    }

}
