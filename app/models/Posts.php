<?php

namespace App\models;


use App\Mail\MailerAdminNotifications;
use App\User;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Posts extends Model
{
    protected $fillable = [
        'categoria',
        'hash',
        'titulo',
        'empresa',
        'tipo',
        'qtd',
        'local',
        'salario',
        'beneficios',
        'requisitos',
        'descricao',
        'contato',
        'whatsapp',
        'email',
        'periodo',
        'role',
        'user_id',
        'category_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function search($data)
    {
        return $this->where(function($query) use($data){
            $titulo = $data['titulo'];
            if (isset($data))
                $query->where('titulo', 'LIKE', "%{$titulo}%");

        })->latest()->paginate(50);
    }


    public function new($authorization, $posts, $notification)
    {

        $masternotification = MasterNotifications::get()->first();
        $master['qtd'] = $masternotification->qtd - 1;
        $master['message'] = 'Você tem '.$master['qtd'].' solicitações de anúncios!';
        $id = $authorization->user_id;
        $notifications = AdminNotifications::where('user_id', $id)->first();
        $user = User::find($id);


        $data['empresa'] = $authorization->empresa;
        $data['hash'] = $authorization->hash;
        $data['titulo'] = $authorization->titulo;
        $data['tipo'] = $authorization->tipo;
        $data['qtd'] = $authorization->qtd;
        $data['local'] = $authorization->local;
        $data['salario'] = $authorization->salario;
        $data['beneficios'] = $authorization->beneficios;
        $data['requisitos'] = $authorization->requisitos;
        $data['periodo'] = $authorization->periodo;
        $data['descricao'] = $authorization->descricao;
        $data['contato'] = $authorization->contato;
        $data['whatsapp'] = $authorization->whatsapp;
        $data['email'] = $authorization->email;
        $data['role'] = 'insert';
        $data['user_id'] = $authorization->user_id;
        $data['category_id'] = $authorization->category_id;


        $editpost = Posts::where('hash', $authorization->hash)->first();

        if ($editpost) {
            $success = $editpost->update($data);
        }else{
            $success = $posts->create($data);
        }


        //Create notifications & delete authorization
        if ($success) {
            if ($notifications == null) {
                $masternotification->update($master);
                $notification->new($notification, $id);
                $authorization->delete();
                Mail::send(new MailerAdminNotifications($data, $user));
            }else{
                $masternotification->update($master);
                $notifications->add($notifications, $id);
                $authorization->delete();
                Mail::send(new MailerAdminNotifications($data, $user));
            }
        }


    }
}
