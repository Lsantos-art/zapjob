<?php

namespace App;

use App\models\AdminNotifications;
use App\models\MasterNotifications;
use App\models\Posts;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'level', 'avatar', 'password', 'master', 'admin', 'whatsapp', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Posts::class, 'user_id');
    }

    public function search(Array $data, $totalPage)
    {
        return $this->where(function($query) use($data){

            $search = $data['search'];
            $query->where('email', 'LIKE', "%{$search}%")->orWhere('name', 'LIKE', "%{$search}%");

        })->latest()->paginate($totalPage);
    }

    public function notifications()
    {
        return $this->hasOne(AdminNotifications::class, 'user_id');
    }
}
