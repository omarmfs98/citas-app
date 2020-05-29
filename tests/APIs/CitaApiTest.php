<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cita;

class CitaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cita()
    {
        $cita = factory(Cita::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/citas', $cita
        );

        $this->assertApiResponse($cita);
    }

    /**
     * @test
     */
    public function test_read_cita()
    {
        $cita = factory(Cita::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/citas/'.$cita->id
        );

        $this->assertApiResponse($cita->toArray());
    }

    /**
     * @test
     */
    public function test_update_cita()
    {
        $cita = factory(Cita::class)->create();
        $editedCita = factory(Cita::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/citas/'.$cita->id,
            $editedCita
        );

        $this->assertApiResponse($editedCita);
    }

    /**
     * @test
     */
    public function test_delete_cita()
    {
        $cita = factory(Cita::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/citas/'.$cita->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/citas/'.$cita->id
        );

        $this->response->assertStatus(404);
    }
}
