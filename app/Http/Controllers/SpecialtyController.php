<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpecialtyRequest;
use App\Http\Requests\UpdateSpecialtyRequest;
use App\Repositories\SpecialtyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SpecialtyController extends AppBaseController
{
    /** @var  SpecialtyRepository */
    private $specialtyRepository;

    public function __construct(SpecialtyRepository $specialtyRepo)
    {
        $this->specialtyRepository = $specialtyRepo;
    }

    /**
     * Display a listing of the Specialty.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $specialties = $this->specialtyRepository->all();

        return view('specialties.index')
            ->with('specialties', $specialties);
    }

    /**
     * Show the form for creating a new Specialty.
     *
     * @return Response
     */
    public function create()
    {
        return view('specialties.create');
    }

    /**
     * Store a newly created Specialty in storage.
     *
     * @param CreateSpecialtyRequest $request
     *
     * @return Response
     */
    public function store(CreateSpecialtyRequest $request)
    {
        $input = $request->all();

        $specialty = $this->specialtyRepository->create($input);

        Flash::success('Specialty saved successfully.');

        return redirect(route('specialties.index'));
    }

    /**
     * Display the specified Specialty.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $specialty = $this->specialtyRepository->find($id);

        if (empty($specialty)) {
            Flash::error('Specialty not found');

            return redirect(route('specialties.index'));
        }

        return view('specialties.show')->with('specialty', $specialty);
    }

    /**
     * Show the form for editing the specified Specialty.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $specialty = $this->specialtyRepository->find($id);

        if (empty($specialty)) {
            Flash::error('Specialty not found');

            return redirect(route('specialties.index'));
        }

        return view('specialties.edit')->with('specialty', $specialty);
    }

    /**
     * Update the specified Specialty in storage.
     *
     * @param int $id
     * @param UpdateSpecialtyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpecialtyRequest $request)
    {
        $specialty = $this->specialtyRepository->find($id);

        if (empty($specialty)) {
            Flash::error('Specialty not found');

            return redirect(route('specialties.index'));
        }

        $specialty = $this->specialtyRepository->update($request->all(), $id);

        Flash::success('Specialty updated successfully.');

        return redirect(route('specialties.index'));
    }

    /**
     * Remove the specified Specialty from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $specialty = $this->specialtyRepository->find($id);

        if (empty($specialty)) {
            Flash::error('Specialty not found');

            return redirect(route('specialties.index'));
        }

        $this->specialtyRepository->delete($id);

        Flash::success('Specialty deleted successfully.');

        return redirect(route('specialties.index'));
    }
}
