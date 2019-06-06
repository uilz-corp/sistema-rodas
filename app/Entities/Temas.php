<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Temas.
 *
 * @package namespace App\Entities;
 */
class Temas extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'Tema';
    protected $fillable = ['descricao'];

    public function subtemas()
    {
        return $this->hasMany(Subtemas::class, 'id_tema');
    }
}
