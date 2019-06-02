<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\UserService;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
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
        $page = [
            'tableTitle' => 'Usuários',
            'modalTitle' => 'usuário',
            'page' => 'user',
            'icon' => 'users',
            'route' => 'users'
        ];
        //return view('user.index', ['usuario' => $users]);
        return view('page.index', ['data' => $data, 'page' => $page]);
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
        $request = $this->service->store($request->all());
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
        // try {

        //     // $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        //     // dd($request->id);

        //     $user = $this->repository->update($request->all(), $request->id);

        //     $response = [
        //         'message' => 'Usuário atualizado.',
        //         'data'    => $user->toArray(),
        //     ];

        //     if ($request->wantsJson()) {

        //         return response()->json($response);
        //     }

        //     // return redirect()->back()->with('message', $response['message']);
        //     return redirect()->route('users.index');
        // } catch (ValidatorException $e) {

        //     if ($request->wantsJson()) {

        //         return response()->json([
        //             'error'   => true,
        //             'message' => $e->getMessageBag()
        //         ]);
        //     }

        //     return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        // }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'User deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'User deleted.');
    }
}
