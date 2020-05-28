<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Especialidad;

class EspecialidadApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_especialidad()
    {
        $especialidad = factory(Especialidad::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/especialidads', $especialidad
        );

        $this->assertApiResponse($especialidad);
    }

    /**
     * @test
     */
    public function test_read_especialidad()
    {
        $especialidad = factory(Especialidad::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/especialidads/'.$especialidad->id
        );

        $this->assertApiResponse($especialidad->toArray());
    }

    /**
     * @test
     */
    public function test_update_especialidad()
    {
        $especialidad = factory(Especialidad::class)->create();
        $editedEspecialidad = factory(Especialidad::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/especialidads/'.$especialidad->id,
            $editedEspecialidad
        );

        $this->assertApiResponse($editedEspecialidad);
    }

    /**
     * @test
     */
    public function test_delete_especialidad()
    {
        $especialidad = factory(Especialidad::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/especialidads/'.$especialidad->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/especialidads/'.$especialidad->id
        );

        $this->response->assertStatus(404);
    }
}
