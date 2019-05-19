<?php

namespace App\Services;

use App\Repositories\PolosRepository;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;
use Illuminate\Database\QueryException;

class PoloService{

    private $repository;
    // private $validator;

    public function __construct(PolosRepository $repository)
    {
        $this->repository = $repository;
        // $this->validator = $validator;
    }

    public function store($data){
        try {
            //$this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $polo = $this->repository->create($data);
            
            return[
                'success' => true,
                'messages' => 'Polo cadastrado',
                'data' => $polo
            ];
        } catch (Exception $th) {
            switch (get_class($th)) {
                case QueryException::class:
                return ['success' => false, 'messages' =>  $th->getMessage()];
                    break;
                
                case ValidatorException::class:
                return ['success' => false, 'messages' =>  $th->getMessageBag()];
                break;
                
                case Exception::class:
                return ['success' => false, 'messages' =>  $th->getMessage()];
                break;

                default:
                return ['success' => false, 'messages' =>  $th->getMessage()];
                    break;
            }
        }
    }
}