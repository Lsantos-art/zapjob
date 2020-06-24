<?php

namespace App\Mail;

use App\models\MasterNotifications as ModelsMasterNotifications;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MasterNotifications extends Mailable
{
    use Queueable, SerializesModels;

    private $message;
    private $user;
    private $data;
    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $user)
    {
        $notification = ModelsMasterNotifications::get()->first();
        $this->message = $notification->message;
        $this->data = $data;
        $this->user = $user;
        $this->email = User::where('master' ,'yes')->first()->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->message);
        $this->to($this->email, 'Administrador');
        return $this->markdown('mail.MasterNotifications', [
            'user' => $this->user,
            'post' => $this->data
        ]);
    }
}
