<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePlaylistAPIRequest;
use App\Http\Requests\API\UpdatePlaylistAPIRequest;
use App\Models\Playlist;
use App\Repositories\PlaylistRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PlaylistController
 * @package App\Http\Controllers\API
 */

class PlaylistAPIController extends AppBaseController
{
    /** @var  PlaylistRepository */
    private $playlistRepository;

    public function __construct(PlaylistRepository $playlistRepo)
    {
        $this->playlistRepository = $playlistRepo;
    }

    /**
     * Display a listing of the Playlist.
     * GET|HEAD /playlists
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $playlists = $this->playlistRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($playlists->toArray(), 'Playlists retrieved successfully');
    }

    /**
     * Store a newly created Playlist in storage.
     * POST /playlists
     *
     * @param CreatePlaylistAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePlaylistAPIRequest $request)
    {
        $input = $request->all();

        $playlist = $this->playlistRepository->create($input);

        return $this->sendResponse($playlist->toArray(), 'Playlist saved successfully');
    }

    /**
     * Display the specified Playlist.
     * GET|HEAD /playlists/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Playlist $playlist */
        $playlist = $this->playlistRepository->find($id);

        if (empty($playlist)) {
            return $this->sendError('Playlist not found');
        }

        return $this->sendResponse($playlist->toArray(), 'Playlist retrieved successfully');
    }

    /**
     * Update the specified Playlist in storage.
     * PUT/PATCH /playlists/{id}
     *
     * @param int $id
     * @param UpdatePlaylistAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlaylistAPIRequest $request)
    {
        $input = $request->all();

        /** @var Playlist $playlist */
        $playlist = $this->playlistRepository->find($id);

        if (empty($playlist)) {
            return $this->sendError('Playlist not found');
        }

        $playlist = $this->playlistRepository->update($input, $id);

        return $this->sendResponse($playlist->toArray(), 'Playlist updated successfully');
    }

    /**
     * Remove the specified Playlist from storage.
     * DELETE /playlists/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Playlist $playlist */
        $playlist = $this->playlistRepository->find($id);

        if (empty($playlist)) {
            return $this->sendError('Playlist not found');
        }

        $playlist->delete();

        return $this->sendSuccess('Playlist deleted successfully');
    }
}
