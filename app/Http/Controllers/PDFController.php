<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller {
    
    public function downloadPDF() {

        $pdf =  PDF::loadView('instructions', [
            'download' => "true"
        ]);

        
        // return PDF::loadView('instructions')->download('instructions.pdf');
        return $pdf->download('instructions.pdf');
    }

}
