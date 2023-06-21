<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\data;

class dataApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_data()
    {
        $data = data::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/data', $data
        );

        $this->assertApiResponse($data);
    }

    /**
     * @test
     */
    public function test_read_data()
    {
        $data = data::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/data/'.$data->id
        );

        $this->assertApiResponse($data->toArray());
    }

    /**
     * @test
     */
    public function test_update_data()
    {
        $data = data::factory()->create();
        $editeddata = data::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/data/'.$data->id,
            $editeddata
        );

        $this->assertApiResponse($editeddata);
    }

    /**
     * @test
     */
    public function test_delete_data()
    {
        $data = data::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/data/'.$data->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/data/'.$data->id
        );

        $this->response->assertStatus(404);
    }
}
