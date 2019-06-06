<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Polos.
 *
 * @package namespace App\Entities;
 */
class Polos extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'Polo';
    
    protected $fillable = ['id','descricao', 'tipo_polo'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_polo');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoPolo::class, 'tipo_polo');
    }
}
