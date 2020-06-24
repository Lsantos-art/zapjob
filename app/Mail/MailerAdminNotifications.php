<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailerAdminNotifications extends Mailable
{
    use Queueable, SerializesModels;
    private $data;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $user)
    {
        $this->user = $user;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Seu anúncio foi aprovado!');
        $this->to($this->user->email, $this->user->name);
        return $this->markdown('mail.MailerAdminNotifications', [
            'user' => $this->user,
            'post' => $this->data
        ]);
    }
}
