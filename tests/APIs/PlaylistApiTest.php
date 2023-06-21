<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Playlist;

class PlaylistApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_playlist()
    {
        $playlist = Playlist::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/playlists', $playlist
        );

        $this->assertApiResponse($playlist);
    }

    /**
     * @test
     */
    public function test_read_playlist()
    {
        $playlist = Playlist::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/playlists/'.$playlist->id
        );

        $this->assertApiResponse($playlist->toArray());
    }

    /**
     * @test
     */
    public function test_update_playlist()
    {
        $playlist = Playlist::factory()->create();
        $editedPlaylist = Playlist::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/playlists/'.$playlist->id,
            $editedPlaylist
        );

        $this->assertApiResponse($editedPlaylist);
    }

    /**
     * @test
     */
    public function test_delete_playlist()
    {
        $playlist = Playlist::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/playlists/'.$playlist->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/playlists/'.$playlist->id
        );

        $this->response->assertStatus(404);
    }
}
