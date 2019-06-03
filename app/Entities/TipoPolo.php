<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TipoPolo.
 *
 * @package namespace App\Entities;
 */
class TipoPolo extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','descricao'];

    public function polos()
    {
        return $this->hasMany(Polos::class);
    }
}
