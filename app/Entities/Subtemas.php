<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Subtemas.
 *
 * @package namespace App\Entities;
 */
class Subtemas extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descricao', 'id_tema'];

    public function tema()
    {
        return $this->belongsTo(Temas::class);
    }
}
