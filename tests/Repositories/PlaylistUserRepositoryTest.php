<?php namespace Tests\Repositories;

use App\Models\PlaylistUser;
use App\Repositories\PlaylistUserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PlaylistUserRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PlaylistUserRepository
     */
    protected $playlistUserRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->playlistUserRepo = \App::make(PlaylistUserRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_playlist_user()
    {
        $playlistUser = PlaylistUser::factory()->make()->toArray();

        $createdPlaylistUser = $this->playlistUserRepo->create($playlistUser);

        $createdPlaylistUser = $createdPlaylistUser->toArray();
        $this->assertArrayHasKey('id', $createdPlaylistUser);
        $this->assertNotNull($createdPlaylistUser['id'], 'Created PlaylistUser must have id specified');
        $this->assertNotNull(PlaylistUser::find($createdPlaylistUser['id']), 'PlaylistUser with given id must be in DB');
        $this->assertModelData($playlistUser, $createdPlaylistUser);
    }

    /**
     * @test read
     */
    public function test_read_playlist_user()
    {
        $playlistUser = PlaylistUser::factory()->create();

        $dbPlaylistUser = $this->playlistUserRepo->find($playlistUser->id);

        $dbPlaylistUser = $dbPlaylistUser->toArray();
        $this->assertModelData($playlistUser->toArray(), $dbPlaylistUser);
    }

    /**
     * @test update
     */
    public function test_update_playlist_user()
    {
        $playlistUser = PlaylistUser::factory()->create();
        $fakePlaylistUser = PlaylistUser::factory()->make()->toArray();

        $updatedPlaylistUser = $this->playlistUserRepo->update($fakePlaylistUser, $playlistUser->id);

        $this->assertModelData($fakePlaylistUser, $updatedPlaylistUser->toArray());
        $dbPlaylistUser = $this->playlistUserRepo->find($playlistUser->id);
        $this->assertModelData($fakePlaylistUser, $dbPlaylistUser->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_playlist_user()
    {
        $playlistUser = PlaylistUser::factory()->create();

        $resp = $this->playlistUserRepo->delete($playlistUser->id);

        $this->assertTrue($resp);
        $this->assertNull(PlaylistUser::find($playlistUser->id), 'PlaylistUser should not exist in DB');
    }
}
