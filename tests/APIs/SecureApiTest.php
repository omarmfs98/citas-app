<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Secure;

class SecureApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_secure()
    {
        $secure = factory(Secure::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/secures', $secure
        );

        $this->assertApiResponse($secure);
    }

    /**
     * @test
     */
    public function test_read_secure()
    {
        $secure = factory(Secure::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/secures/'.$secure->id
        );

        $this->assertApiResponse($secure->toArray());
    }

    /**
     * @test
     */
    public function test_update_secure()
    {
        $secure = factory(Secure::class)->create();
        $editedSecure = factory(Secure::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/secures/'.$secure->id,
            $editedSecure
        );

        $this->assertApiResponse($editedSecure);
    }

    /**
     * @test
     */
    public function test_delete_secure()
    {
        $secure = factory(Secure::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/secures/'.$secure->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/secures/'.$secure->id
        );

        $this->response->assertStatus(404);
    }
}
