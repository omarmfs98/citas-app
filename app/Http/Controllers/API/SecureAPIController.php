<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSecureAPIRequest;
use App\Http\Requests\API\UpdateSecureAPIRequest;
use App\Models\Secure;
use App\Repositories\SecureRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SecureController
 * @package App\Http\Controllers\API
 */

class SecureAPIController extends AppBaseController
{
    /** @var  SecureRepository */
    private $secureRepository;

    public function __construct(SecureRepository $secureRepo)
    {
        $this->secureRepository = $secureRepo;
    }

    /**
     * Display a listing of the Secure.
     * GET|HEAD /secures
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $secures = $this->secureRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($secures->toArray(), 'Secures retrieved successfully');
    }

    /**
     * Store a newly created Secure in storage.
     * POST /secures
     *
     * @param CreateSecureAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSecureAPIRequest $request)
    {
        $input = $request->all();

        $secure = $this->secureRepository->create($input);

        return $this->sendResponse($secure->toArray(), 'Secure saved successfully');
    }

    /**
     * Display the specified Secure.
     * GET|HEAD /secures/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Secure $secure */
        $secure = $this->secureRepository->find($id);

        if (empty($secure)) {
            return $this->sendError('Secure not found');
        }

        return $this->sendResponse($secure->toArray(), 'Secure retrieved successfully');
    }

    /**
     * Update the specified Secure in storage.
     * PUT/PATCH /secures/{id}
     *
     * @param int $id
     * @param UpdateSecureAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSecureAPIRequest $request)
    {
        $input = $request->all();

        /** @var Secure $secure */
        $secure = $this->secureRepository->find($id);

        if (empty($secure)) {
            return $this->sendError('Secure not found');
        }

        $secure = $this->secureRepository->update($input, $id);

        return $this->sendResponse($secure->toArray(), 'Secure updated successfully');
    }

    /**
     * Remove the specified Secure from storage.
     * DELETE /secures/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Secure $secure */
        $secure = $this->secureRepository->find($id);

        if (empty($secure)) {
            return $this->sendError('Secure not found');
        }

        $secure->delete();

        return $this->sendSuccess('Secure deleted successfully');
    }
}
