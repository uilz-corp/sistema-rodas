<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TipoPoloRepository;
use App\Entities\TipoPolo;
use App\Validators\TipoPoloValidator;

/**
 * Class TipoPoloRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TipoPoloRepositoryEloquent extends BaseRepository implements TipoPoloRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoPolo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
