<?php namespace Tests\Repositories;

use App\Models\Playlist;
use App\Repositories\PlaylistRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PlaylistRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PlaylistRepository
     */
    protected $playlistRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->playlistRepo = \App::make(PlaylistRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_playlist()
    {
        $playlist = Playlist::factory()->make()->toArray();

        $createdPlaylist = $this->playlistRepo->create($playlist);

        $createdPlaylist = $createdPlaylist->toArray();
        $this->assertArrayHasKey('id', $createdPlaylist);
        $this->assertNotNull($createdPlaylist['id'], 'Created Playlist must have id specified');
        $this->assertNotNull(Playlist::find($createdPlaylist['id']), 'Playlist with given id must be in DB');
        $this->assertModelData($playlist, $createdPlaylist);
    }

    /**
     * @test read
     */
    public function test_read_playlist()
    {
        $playlist = Playlist::factory()->create();

        $dbPlaylist = $this->playlistRepo->find($playlist->id);

        $dbPlaylist = $dbPlaylist->toArray();
        $this->assertModelData($playlist->toArray(), $dbPlaylist);
    }

    /**
     * @test update
     */
    public function test_update_playlist()
    {
        $playlist = Playlist::factory()->create();
        $fakePlaylist = Playlist::factory()->make()->toArray();

        $updatedPlaylist = $this->playlistRepo->update($fakePlaylist, $playlist->id);

        $this->assertModelData($fakePlaylist, $updatedPlaylist->toArray());
        $dbPlaylist = $this->playlistRepo->find($playlist->id);
        $this->assertModelData($fakePlaylist, $dbPlaylist->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_playlist()
    {
        $playlist = Playlist::factory()->create();

        $resp = $this->playlistRepo->delete($playlist->id);

        $this->assertTrue($resp);
        $this->assertNull(Playlist::find($playlist->id), 'Playlist should not exist in DB');
    }
}
