<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PlaylistUser;

class PlaylistUserApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_playlist_user()
    {
        $playlistUser = PlaylistUser::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/playlist_users', $playlistUser
        );

        $this->assertApiResponse($playlistUser);
    }

    /**
     * @test
     */
    public function test_read_playlist_user()
    {
        $playlistUser = PlaylistUser::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/playlist_users/'.$playlistUser->id
        );

        $this->assertApiResponse($playlistUser->toArray());
    }

    /**
     * @test
     */
    public function test_update_playlist_user()
    {
        $playlistUser = PlaylistUser::factory()->create();
        $editedPlaylistUser = PlaylistUser::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/playlist_users/'.$playlistUser->id,
            $editedPlaylistUser
        );

        $this->assertApiResponse($editedPlaylistUser);
    }

    /**
     * @test
     */
    public function test_delete_playlist_user()
    {
        $playlistUser = PlaylistUser::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/playlist_users/'.$playlistUser->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/playlist_users/'.$playlistUser->id
        );

        $this->response->assertStatus(404);
    }
}
