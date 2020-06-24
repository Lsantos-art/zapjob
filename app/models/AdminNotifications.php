<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class AdminNotifications extends Model
{
    protected $fillable = [
        'qtd', 'message', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function add($notifications, $id)
    {
        $new = $notifications->qtd + 1;
        $data['qtd'] = $new;
        $data['message'] = 'Você tem '.$new.' anúncios aprovados!';
        $data['user_id'] = $id;
        $notifications->update($data);
    }

    public function new($notification, $id)
    {
        $data['qtd'] = 1;
        $data['message'] = 'Seu anúncio foi aprovado!';
        $data['user_id'] = $id;
        $notification->create($data);
    }
}
