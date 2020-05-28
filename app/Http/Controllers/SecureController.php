<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSecureRequest;
use App\Http\Requests\UpdateSecureRequest;
use App\Repositories\SecureRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SecureController extends AppBaseController
{
    /** @var  SecureRepository */
    private $secureRepository;

    public function __construct(SecureRepository $secureRepo)
    {
        $this->secureRepository = $secureRepo;
    }

    /**
     * Display a listing of the Secure.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $secures = $this->secureRepository->all();

        return view('secures.index')
            ->with('secures', $secures);
    }

    /**
     * Show the form for creating a new Secure.
     *
     * @return Response
     */
    public function create()
    {
        return view('secures.create');
    }

    /**
     * Store a newly created Secure in storage.
     *
     * @param CreateSecureRequest $request
     *
     * @return Response
     */
    public function store(CreateSecureRequest $request)
    {
        $input = $request->all();

        $secure = $this->secureRepository->create($input);

        Flash::success('Secure saved successfully.');

        return redirect(route('secures.index'));
    }

    /**
     * Display the specified Secure.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $secure = $this->secureRepository->find($id);

        if (empty($secure)) {
            Flash::error('Secure not found');

            return redirect(route('secures.index'));
        }

        return view('secures.show')->with('secure', $secure);
    }

    /**
     * Show the form for editing the specified Secure.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $secure = $this->secureRepository->find($id);

        if (empty($secure)) {
            Flash::error('Secure not found');

            return redirect(route('secures.index'));
        }

        return view('secures.edit')->with('secure', $secure);
    }

    /**
     * Update the specified Secure in storage.
     *
     * @param int $id
     * @param UpdateSecureRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSecureRequest $request)
    {
        $secure = $this->secureRepository->find($id);

        if (empty($secure)) {
            Flash::error('Secure not found');

            return redirect(route('secures.index'));
        }

        $secure = $this->secureRepository->update($request->all(), $id);

        Flash::success('Secure updated successfully.');

        return redirect(route('secures.index'));
    }

    /**
     * Remove the specified Secure from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $secure = $this->secureRepository->find($id);

        if (empty($secure)) {
            Flash::error('Secure not found');

            return redirect(route('secures.index'));
        }

        $this->secureRepository->delete($id);

        Flash::success('Secure deleted successfully.');

        return redirect(route('secures.index'));
    }
}
