<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatedataRequest;
use App\Http\Requests\UpdatedataRequest;
use App\Repositories\dataRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\data;
use Flash;
use Response;

class dataController extends AppBaseController
{
    /** @var dataRepository $dataRepository*/
    private $dataRepository;

    public function __construct(dataRepository $dataRepo)
    {
        $this->dataRepository = $dataRepo;
    }

    /**
     * Display a listing of the data.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $data = $this->dataRepository->all();

        return view('data.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new data.
     *
     * @return Response
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created data in storage.
     *
     * @param CreatedataRequest $request
     *
     * @return Response
     */
    public function store(CreatedataRequest $request)
    {
        $input = $request->all();

        $data = $this->dataRepository->create($input);

        Flash::success('Data saved successfully.');

        return redirect(route('data.index'));
    }

    /**
     * Display the specified data.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data = $this->dataRepository->find($id);

        if (empty($data)) {
            Flash::error('Data not found');

            return redirect(route('data.index'));
        }

        return view('data.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified data.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data = $this->dataRepository->find($id);

        if (empty($data)) {
            Flash::error('Data not found');

            return redirect(route('data.index'));
        }

        return view('data.edit')->with('data', $data);
    }

    /**
     * Update the specified data in storage.
     *
     * @param int $id
     * @param UpdatedataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedataRequest $request)
    {
        $data = $this->dataRepository->find($id);

        if (empty($data)) {
            Flash::error('Data not found');

            return redirect(route('data.index'));
        }

        $data = $this->dataRepository->update($request->all(), $id);

        Flash::success('Data updated successfully.');

        return redirect(route('data.index'));
    }

    /**
     * Remove the specified data from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $data = $this->dataRepository->find($id);

        if (empty($data)) {
            Flash::error('Data not found');

            return redirect(route('data.index'));
        }

        $this->dataRepository->delete($id);

        Flash::success('Data deleted successfully.');

        return redirect(route('data.index'));
    }

    public function search()
    {
        return view('data.search');
    }

    public function searching(Request $request)
    {

        Flash::success('Data search successfully.');
        $data = data::where('kota_origin','LIKE','%'.$request->kota_origin.'%')
                ->where('kota_destinasi','LIKE','%'.$request->kota_destinasi.'%')
                ->where('kendaraan','LIKE','%'.$request->kendaraan.'%')
                ->get();

        return view('data.index')
            ->with('data', $data);
    }
}
