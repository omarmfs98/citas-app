<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacienteAPIRequest;
use App\Http\Requests\API\UpdatePacienteAPIRequest;
use App\Models\Paciente;
use App\Repositories\PacienteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PacienteController
 * @package App\Http\Controllers\API
 */

class PacienteAPIController extends AppBaseController
{
    /** @var  PacienteRepository */
    private $pacienteRepository;

    public function __construct(PacienteRepository $pacienteRepo)
    {
        $this->pacienteRepository = $pacienteRepo;
    }

    /**
     * Display a listing of the Paciente.
     * GET|HEAD /pacientes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacienteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pacientes->toArray(), 'Pacientes retrieved successfully');
    }

    /**
     * Store a newly created Paciente in storage.
     * POST /pacientes
     *
     * @param CreatePacienteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePacienteAPIRequest $request)
    {
        $input = $request->all();

        $paciente = $this->pacienteRepository->create($input);

        return $this->sendResponse($paciente->toArray(), 'Paciente saved successfully');
    }

    /**
     * Display the specified Paciente.
     * GET|HEAD /pacientes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Paciente $paciente */
        $paciente = $this->pacienteRepository->find($id);

        if (empty($paciente)) {
            return $this->sendError('Paciente not found');
        }

        return $this->sendResponse($paciente->toArray(), 'Paciente retrieved successfully');
    }

    /**
     * Update the specified Paciente in storage.
     * PUT/PATCH /pacientes/{id}
     *
     * @param int $id
     * @param UpdatePacienteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacienteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Paciente $paciente */
        $paciente = $this->pacienteRepository->find($id);

        if (empty($paciente)) {
            return $this->sendError('Paciente not found');
        }

        $paciente = $this->pacienteRepository->update($input, $id);

        return $this->sendResponse($paciente->toArray(), 'Paciente updated successfully');
    }

    /**
     * Remove the specified Paciente from storage.
     * DELETE /pacientes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Paciente $paciente */
        $paciente = $this->pacienteRepository->find($id);

        if (empty($paciente)) {
            return $this->sendError('Paciente not found');
        }

        $paciente->delete();

        return $this->sendSuccess('Paciente deleted successfully');
    }
}
