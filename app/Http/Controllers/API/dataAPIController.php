<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatedataAPIRequest;
use App\Http\Requests\API\UpdatedataAPIRequest;
use App\Models\data;
use App\Repositories\dataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class dataController
 * @package App\Http\Controllers\API
 */

class dataAPIController extends AppBaseController
{
    /** @var  dataRepository */
    private $dataRepository;

    public function __construct(dataRepository $dataRepo)
    {
        $this->dataRepository = $dataRepo;
    }

    /**
     * Display a listing of the data.
     * GET|HEAD /data
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $data = $this->dataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($data->toArray(), 'Data retrieved successfully');
    }

    /**
     * Store a newly created data in storage.
     * POST /data
     *
     * @param CreatedataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatedataAPIRequest $request)
    {
        $input = $request->all();

        $data = $this->dataRepository->create($input);

        return $this->sendResponse($data->toArray(), 'Data saved successfully');
    }

    /**
     * Display the specified data.
     * GET|HEAD /data/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var data $data */
        $data = $this->dataRepository->find($id);

        if (empty($data)) {
            return $this->sendError('Data not found');
        }

        return $this->sendResponse($data->toArray(), 'Data retrieved successfully');
    }

    /**
     * Update the specified data in storage.
     * PUT/PATCH /data/{id}
     *
     * @param int $id
     * @param UpdatedataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedataAPIRequest $request)
    {
        $input = $request->all();

        /** @var data $data */
        $data = $this->dataRepository->find($id);

        if (empty($data)) {
            return $this->sendError('Data not found');
        }

        $data = $this->dataRepository->update($input, $id);

        return $this->sendResponse($data->toArray(), 'data updated successfully');
    }

    /**
     * Remove the specified data from storage.
     * DELETE /data/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var data $data */
        $data = $this->dataRepository->find($id);

        if (empty($data)) {
            return $this->sendError('Data not found');
        }

        $data->delete();

        return $this->sendSuccess('Data deleted successfully');
    }
}
