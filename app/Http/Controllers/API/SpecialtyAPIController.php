<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSpecialtyAPIRequest;
use App\Http\Requests\API\UpdateSpecialtyAPIRequest;
use App\Models\Specialty;
use App\Repositories\SpecialtyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SpecialtyController
 * @package App\Http\Controllers\API
 */

class SpecialtyAPIController extends AppBaseController
{
    /** @var  SpecialtyRepository */
    private $specialtyRepository;

    public function __construct(SpecialtyRepository $specialtyRepo)
    {
        $this->specialtyRepository = $specialtyRepo;
    }

    /**
     * Display a listing of the Specialty.
     * GET|HEAD /specialties
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $specialties = $this->specialtyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($specialties->toArray(), 'Specialties retrieved successfully');
    }

    /**
     * Store a newly created Specialty in storage.
     * POST /specialties
     *
     * @param CreateSpecialtyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSpecialtyAPIRequest $request)
    {
        $input = $request->all();

        $specialty = $this->specialtyRepository->create($input);

        return $this->sendResponse($specialty->toArray(), 'Specialty saved successfully');
    }

    /**
     * Display the specified Specialty.
     * GET|HEAD /specialties/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Specialty $specialty */
        $specialty = $this->specialtyRepository->find($id);

        if (empty($specialty)) {
            return $this->sendError('Specialty not found');
        }

        return $this->sendResponse($specialty->toArray(), 'Specialty retrieved successfully');
    }

    /**
     * Update the specified Specialty in storage.
     * PUT/PATCH /specialties/{id}
     *
     * @param int $id
     * @param UpdateSpecialtyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpecialtyAPIRequest $request)
    {
        $input = $request->all();

        /** @var Specialty $specialty */
        $specialty = $this->specialtyRepository->find($id);

        if (empty($specialty)) {
            return $this->sendError('Specialty not found');
        }

        $specialty = $this->specialtyRepository->update($input, $id);

        return $this->sendResponse($specialty->toArray(), 'Specialty updated successfully');
    }

    /**
     * Remove the specified Specialty from storage.
     * DELETE /specialties/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Specialty $specialty */
        $specialty = $this->specialtyRepository->find($id);

        if (empty($specialty)) {
            return $this->sendError('Specialty not found');
        }

        $specialty->delete();

        return $this->sendSuccess('Specialty deleted successfully');
    }
}
