<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PolosCreateRequest;
use App\Http\Requests\PolosUpdateRequest;
use App\Repositories\PolosRepository;
use App\Services\PoloService;

/**
 * Class PolosController.
 *
 * @package namespace App\Http\Controllers;
 */
class PolosController extends Controller
{
    /**
     * @var PolosRepository
     */
    protected $repository;

    /**
     * @var PoloService
     */
    protected $service;

    /**
     * PolosController constructor.
     *
     * @param PolosRepository $repository
     * @param PoloService $service
     */
    public function __construct(PolosRepository $repository, PoloService $service)
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
            'tableTitle' => 'Polos',
            'modalTitle' => 'polo',
            'page' => 'polo',
            'icon' => 'home',
            'route' => 'polos'
        ];
        return view('page.index', ['data' => $data, 'page' => $page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PolosCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PolosCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $polo = $request['success'] ? $request['data'] : $request['messages'];

        session()->flash('success', [
            'success' => $request['success'],
            'messages' => $request['messages']
        ]);

       return redirect()->route('polos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $polo = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $polo,
            ]);
        }

        return view('polos.show', compact('polo'));
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
        $polo = $this->repository->find($id);

        return view('polos.edit', compact('polo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PolosUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PolosUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $polo = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Polos updated.',
                'data'    => $polo->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
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
                'message' => 'Polos deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Polos deleted.');
    }
}
