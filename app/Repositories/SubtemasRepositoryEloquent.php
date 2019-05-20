<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\SubtemasRepository;
use App\Entities\Subtemas;
use App\Validators\SubtemasValidator;

/**
 * Class SubtemasRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SubtemasRepositoryEloquent extends BaseRepository implements SubtemasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subtemas::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SubtemasValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
