<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePlaylistUserAPIRequest;
use App\Http\Requests\API\UpdatePlaylistUserAPIRequest;
use App\Models\PlaylistUser;
use App\Repositories\PlaylistUserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PlaylistUserController
 * @package App\Http\Controllers\API
 */

class PlaylistUserAPIController extends AppBaseController
{
    /** @var  PlaylistUserRepository */
    private $playlistUserRepository;

    public function __construct(PlaylistUserRepository $playlistUserRepo)
    {
        $this->playlistUserRepository = $playlistUserRepo;
    }

    /**
     * Display a listing of the PlaylistUser.
     * GET|HEAD /playlistUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $playlistUsers = $this->playlistUserRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($playlistUsers->toArray(), 'Playlist Users retrieved successfully');
    }

    /**
     * Store a newly created PlaylistUser in storage.
     * POST /playlistUsers
     *
     * @param CreatePlaylistUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePlaylistUserAPIRequest $request)
    {
        $input = $request->all();

        $playlistUser = $this->playlistUserRepository->create($input);

        return $this->sendResponse($playlistUser->toArray(), 'Playlist User saved successfully');
    }

    /**
     * Display the specified PlaylistUser.
     * GET|HEAD /playlistUsers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PlaylistUser $playlistUser */
        $playlistUser = $this->playlistUserRepository->find($id);

        if (empty($playlistUser)) {
            return $this->sendError('Playlist User not found');
        }

        return $this->sendResponse($playlistUser->toArray(), 'Playlist User retrieved successfully');
    }

    /**
     * Update the specified PlaylistUser in storage.
     * PUT/PATCH /playlistUsers/{id}
     *
     * @param int $id
     * @param UpdatePlaylistUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlaylistUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var PlaylistUser $playlistUser */
        $playlistUser = $this->playlistUserRepository->find($id);

        if (empty($playlistUser)) {
            return $this->sendError('Playlist User not found');
        }

        $playlistUser = $this->playlistUserRepository->update($input, $id);

        return $this->sendResponse($playlistUser->toArray(), 'PlaylistUser updated successfully');
    }

    /**
     * Remove the specified PlaylistUser from storage.
     * DELETE /playlistUsers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PlaylistUser $playlistUser */
        $playlistUser = $this->playlistUserRepository->find($id);

        if (empty($playlistUser)) {
            return $this->sendError('Playlist User not found');
        }

        $playlistUser->delete();

        return $this->sendSuccess('Playlist User deleted successfully');
    }
}
