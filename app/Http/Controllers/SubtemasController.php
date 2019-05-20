<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SubtemasCreateRequest;
use App\Http\Requests\SubtemasUpdateRequest;
use App\Repositories\SubtemasRepository;
use App\Validators\SubtemasValidator;

/**
 * Class SubtemasController.
 *
 * @package namespace App\Http\Controllers;
 */
class SubtemasController extends Controller
{
    /**
     * @var SubtemasRepository
     */
    protected $repository;

    /**
     * @var SubtemasValidator
     */
    protected $validator;

    /**
     * SubtemasController constructor.
     *
     * @param SubtemasRepository $repository
     * @param SubtemasValidator $validator
     */
    public function __construct(SubtemasRepository $repository, SubtemasValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $subtemas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $subtemas,
            ]);
        }

        return view('subtemas.index', compact('subtemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubtemasCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(SubtemasCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $subtema = $this->repository->create($request->all());

            $response = [
                'message' => 'Subtemas created.',
                'data'    => $subtema->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subtema = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $subtema,
            ]);
        }

        return view('subtemas.show', compact('subtema'));
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
        $subtema = $this->repository->find($id);

        return view('subtemas.edit', compact('subtema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubtemasUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(SubtemasUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $subtema = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Subtemas updated.',
                'data'    => $subtema->toArray(),
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
                'message' => 'Subtemas deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Subtemas deleted.');
    }
}
