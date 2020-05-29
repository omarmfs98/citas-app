<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCitaAPIRequest;
use App\Http\Requests\API\UpdateCitaAPIRequest;
use App\Models\Cita;
use App\Repositories\CitaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CitaController
 * @package App\Http\Controllers\API
 */

class CitaAPIController extends AppBaseController
{
    /** @var  CitaRepository */
    private $citaRepository;

    public function __construct(CitaRepository $citaRepo)
    {
        $this->citaRepository = $citaRepo;
    }

    /**
     * Display a listing of the Cita.
     * GET|HEAD /citas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $citas = $this->citaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($citas->toArray(), 'Citas retrieved successfully');
    }

    /**
     * Store a newly created Cita in storage.
     * POST /citas
     *
     * @param CreateCitaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCitaAPIRequest $request)
    {
        $input = $request->all();

        $cita = $this->citaRepository->create($input);

        return $this->sendResponse($cita->toArray(), 'Cita saved successfully');
    }

    /**
     * Display the specified Cita.
     * GET|HEAD /citas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cita $cita */
        $cita = $this->citaRepository->find($id);

        if (empty($cita)) {
            return $this->sendError('Cita not found');
        }

        return $this->sendResponse($cita->toArray(), 'Cita retrieved successfully');
    }

    /**
     * Update the specified Cita in storage.
     * PUT/PATCH /citas/{id}
     *
     * @param int $id
     * @param UpdateCitaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCitaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cita $cita */
        $cita = $this->citaRepository->find($id);

        if (empty($cita)) {
            return $this->sendError('Cita not found');
        }

        $cita = $this->citaRepository->update($input, $id);

        return $this->sendResponse($cita->toArray(), 'Cita updated successfully');
    }

    /**
     * Remove the specified Cita from storage.
     * DELETE /citas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cita $cita */
        $cita = $this->citaRepository->find($id);

        if (empty($cita)) {
            return $this->sendError('Cita not found');
        }

        $cita->delete();

        return $this->sendSuccess('Cita deleted successfully');
    }
}
