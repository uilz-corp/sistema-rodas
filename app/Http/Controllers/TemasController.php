<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TemasCreateRequest;
use App\Http\Requests\TemasUpdateRequest;
use App\Repositories\TemasRepository;
use App\Services\TemaService;

/**
 * Class TemasController.
 *
 * @package namespace App\Http\Controllers;
 */
class TemasController extends Controller
{
    /**
     * @var TemasRepository
     */
    protected $repository;

    /**
     * @var TemasValidator
     */
    protected $service;

    /**
     * TemasController constructor.
     *
     * @param TemasRepository $repository
     * @param TemasValidator $validator
     */
    public function __construct(TemasRepository $repository, TemaService $service)
    {
        $this->repository = $repository;
        $this->service  = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->all();
        $page = [
            'tableTitle' => 'Temas',
            'modalTitle' => 'tema',
            'page' => 'tema',
            'icon' => 'clipboard',
            'route' => 'temas'
        ];

        return view('page.index', ['data' => $data, 'page' => $page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TemasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $request = $this->service->store($request->all());
        $tema = $request['success'] ? $request['data'] : $request['messages'];

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);

       return redirect()->route('temas.index');
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
        $tema = $this->repository->find($id);
        $subtemas = json_encode($tema->subtemas()->get());

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $tema,
                'subtemas' => $subtemas
            ]);
        }

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
        $tema = $this->repository->find($id);

        return view('temas.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TemasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request)
    {
        try {
            // $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $tema = $this->repository->update($request->all(), $request->id);

            $response = [
                'message' => 'Tema atualizado.',
                'data'    => $tema->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            // return redirect()->back()->with('message', $response['message']);
            return redirect()->route('temas.index');
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
                'message' => 'Temas deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Temas deleted.');
    }
}
