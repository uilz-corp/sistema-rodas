<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\UserService;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        // $this->validator  = $validator;
        $this->service  = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->all(['id','nome','email','perfil']);
        $polos = \App\Entities\Polos::all();
        $page = [
            'tableTitle' => 'Usuários',
            'modalTitle' => 'usuário',
            'page' => 'user',
            'icon' => 'users',
            'route' => 'users'
        ];
        //return view('user.index', ['usuario' => $users]);
        return view('page.index', ['polos' => $polos,'data' => $data, 'page' => $page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $email = $request->email;
        $request = $this->service->store($request);

        // Nova instância para redefinição da senha por e-mail
        $instancia = new \Illuminate\Http\Request();
        $instancia->replace(['email'=> $email]);
        $this->sendResetLinkEmail($instancia);
        
        if (!$request['success']){
            $request['messages'] = $request['messages']->toArray();
        } 

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);

       return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $user = $this->repository->find($id);

        // $user['data_nasc'] = str_replace("-", "/", $user['data_nasc']);
        // $user['data_nasc'] = date("d/m/Y", strtotime($user['data_nasc']));

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $user,
            ]);
        }

        // return view('users.show', compact('user'));
        return '';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->find($id);
        $page = null;

        return view('users.edit', compact('user'), $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request)
    {
        $request = $this->service->update($request->all());
        $usuario = $request['success'] ? $request['data'] : $request['messages'];

        if (!$request['success']){
            $request['messages'] = $request['messages']->toArray();
        }

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);

       return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $request = $this->service->delete($request->id);

        if (!$request['success']){
            $request['messages'] = $request['messages']->toArray();
        }

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);

       return redirect()->route('users.index');
    }
}
