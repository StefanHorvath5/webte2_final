<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\Notification;
use Illuminate\Http\Request;

class MailController extends Controller {

    public function mailSend() {

        app('App\Http\Controllers\CSVController')->getCSV();

        $path =  public_path("files/download.csv");

        try {
            Mail::to(env('MAIL_TO_ADDRESS'))->send(new Notification($path));
        } catch (\Exception $e) {
            return ['success', $e->getMessage()];
        }

        return "Mail with logs sent to ".env('MAIL_TO_ADDRESS');
    }
}
