<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\SolutionCreateRequest;
use App\Http\Requests\SolutionUpdateRequest;
use App\Repositories\Contracts\SolutionRepository;
use App\Validators\SolutionValidator;


class SolutionsController extends Controller
{

    /**
     * @var SolutionRepository
     */
    protected $repository;

    /**
     * @var SolutionValidator
     */
    protected $validator;

    public function __construct(SolutionRepository $repository, SolutionValidator $validator)
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
        $solutions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $solutions,
            ]);
        }

        return view('solutions.index', compact('solutions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SolutionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SolutionCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $solution = $this->repository->create($request->all());

            $response = [
                'message' => 'Solution created.',
                'data'    => $solution->toArray(),
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
        $solution = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $solution,
            ]);
        }

        return view('solutions.show', compact('solution'));
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

        $solution = $this->repository->find($id);

        return view('solutions.edit', compact('solution'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  SolutionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(SolutionUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $solution = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Solution updated.',
                'data'    => $solution->toArray(),
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
                'message' => 'Solution deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Solution deleted.');
    }
}
