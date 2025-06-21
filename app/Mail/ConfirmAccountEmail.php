<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmAccountEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $url;

    /**
     * Criar uma nova instância do e-mail.
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Criar o e-mail.
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject('Confirmação de Conta - ' . env('APP_NAME'))
                    ->view('emails.confirm-account')
                    ->with([
                        'url' => $this->url,
                    ]);
    }
}

