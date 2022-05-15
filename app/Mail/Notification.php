<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable {
    use Queueable, SerializesModels;

    public $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function build() {
        return $this->view('notification')->subject('Logs')->attach($this->filename);
    }
}
