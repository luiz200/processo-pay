<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Curriculo;

class CurriculoEnviado extends Mailable
{
    use Queueable, SerializesModels;

    public $curriculo;

    public function __construct(Curriculo $curriculo)
    {
        $this->curriculo = $curriculo;
    }

    public function build()
    {
        return $this->view('emails.curriculo-enviado')->with(['curriculo' => $this->curriculo]);
    }

}