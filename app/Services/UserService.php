<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class UserService{

    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($request){
        try {
            $data = $request->all();
            $this->validator->with($data)->passesOrFail(UserValidator::RULE_CREATE);
            // $data['data_nasc'] = str_replace("/", "-", $data['data_nasc']);
            // $data['data_nasc'] = date("Y-m-d", strtotime($data['data_nasc']));

            $senha = Str::random(10);
            $data['senha'] = bcrypt($senha);
            $usuario = $this->repository->create($data);

            // Mail::to($usuario->email)->send(new EnviarSenhaEmail($senha));
            
            return[
                'success' => true,
                'messages' => "Usuário $usuario->nome cadastrado.",
                'data' => $usuario
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


    public function update($data){
        try {
            $user = $this->repository->update($data, $data['id']);
            
            return[
                'success' => true,
                'messages' => "Usuário $user->nome atualizado.",
                'data' => $user
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

    public function delete($id){
        try {
            $user = $this->repository->find($id);
            $this->repository->delete($id);

            return[
                'success' => true,
                'messages' => "Usuário $user->nome desativado.",
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