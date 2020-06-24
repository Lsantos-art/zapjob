<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostDenied extends Mailable
{
    use Queueable, SerializesModels;

    private $message;
    private $name;
    private $email;
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $data)
    {
        $this->message = 'Seu anúncio foi removido por não cumprir com o regulamento da plataforma!';
        $this->name = $user->name;
        $this->email = $user->email;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->message);
        $this->to($this->email, $this->name);
        return $this->markdown('mail.PostDenied', [
            'user' => $this->name,
            'post' => $this->data
        ]);
    }
}
