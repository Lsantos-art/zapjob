<?php

namespace App\models;

use App\Mail\MasterNotifications as MailMasterNotifications;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class MasterNotifications extends Model
{
    protected $fillable = [
        'qtd', 'message'
    ];

    public function add($notification, $data, $user)
    {
        $new = $notification->qtd + 1;
        $data['qtd'] = $new;
        $data['message'] = 'Você tem '.$new.' solicitações de anúncio!';
        $notification->update($data);
        Mail::send(new MailMasterNotifications($data, $user));
    }

    public function new($notifications, $data, $user)
    {
        $data['qtd'] = 1;
        $data['message'] = 'Você tem uma nova solicitação de anúncio!';
        MasterNotifications::create($data);
        Mail::send(new MailMasterNotifications($data, $user));
    }
}
