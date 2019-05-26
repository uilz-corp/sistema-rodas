<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Notifications\UserResetPasswordNotification;


/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable implements Transformable
{
    use TransformableTrait;
    use Notifiable;
    use SoftDeletes;
   
    protected $table = 'usuarios';

    protected $fillable = [
        'nome','senha','email','email_verified_at','genero','cpf','data_nasc','perfil','permissao'
    ];

    protected $hidden = [
        'senha'
    ];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }
}
