<?php namespace Tests\Repositories;

use App\Models\data;
use App\Repositories\dataRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class dataRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var dataRepository
     */
    protected $dataRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dataRepo = \App::make(dataRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_data()
    {
        $data = data::factory()->make()->toArray();

        $createddata = $this->dataRepo->create($data);

        $createddata = $createddata->toArray();
        $this->assertArrayHasKey('id', $createddata);
        $this->assertNotNull($createddata['id'], 'Created data must have id specified');
        $this->assertNotNull(data::find($createddata['id']), 'data with given id must be in DB');
        $this->assertModelData($data, $createddata);
    }

    /**
     * @test read
     */
    public function test_read_data()
    {
        $data = data::factory()->create();

        $dbdata = $this->dataRepo->find($data->id);

        $dbdata = $dbdata->toArray();
        $this->assertModelData($data->toArray(), $dbdata);
    }

    /**
     * @test update
     */
    public function test_update_data()
    {
        $data = data::factory()->create();
        $fakedata = data::factory()->make()->toArray();

        $updateddata = $this->dataRepo->update($fakedata, $data->id);

        $this->assertModelData($fakedata, $updateddata->toArray());
        $dbdata = $this->dataRepo->find($data->id);
        $this->assertModelData($fakedata, $dbdata->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_data()
    {
        $data = data::factory()->create();

        $resp = $this->dataRepo->delete($data->id);

        $this->assertTrue($resp);
        $this->assertNull(data::find($data->id), 'data should not exist in DB');
    }
}
