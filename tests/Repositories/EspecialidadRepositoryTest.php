<?php namespace Tests\Repositories;

use App\Models\Especialidad;
use App\Repositories\EspecialidadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EspecialidadRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EspecialidadRepository
     */
    protected $especialidadRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->especialidadRepo = \App::make(EspecialidadRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_especialidad()
    {
        $especialidad = factory(Especialidad::class)->make()->toArray();

        $createdEspecialidad = $this->especialidadRepo->create($especialidad);

        $createdEspecialidad = $createdEspecialidad->toArray();
        $this->assertArrayHasKey('id', $createdEspecialidad);
        $this->assertNotNull($createdEspecialidad['id'], 'Created Especialidad must have id specified');
        $this->assertNotNull(Especialidad::find($createdEspecialidad['id']), 'Especialidad with given id must be in DB');
        $this->assertModelData($especialidad, $createdEspecialidad);
    }

    /**
     * @test read
     */
    public function test_read_especialidad()
    {
        $especialidad = factory(Especialidad::class)->create();

        $dbEspecialidad = $this->especialidadRepo->find($especialidad->id);

        $dbEspecialidad = $dbEspecialidad->toArray();
        $this->assertModelData($especialidad->toArray(), $dbEspecialidad);
    }

    /**
     * @test update
     */
    public function test_update_especialidad()
    {
        $especialidad = factory(Especialidad::class)->create();
        $fakeEspecialidad = factory(Especialidad::class)->make()->toArray();

        $updatedEspecialidad = $this->especialidadRepo->update($fakeEspecialidad, $especialidad->id);

        $this->assertModelData($fakeEspecialidad, $updatedEspecialidad->toArray());
        $dbEspecialidad = $this->especialidadRepo->find($especialidad->id);
        $this->assertModelData($fakeEspecialidad, $dbEspecialidad->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_especialidad()
    {
        $especialidad = factory(Especialidad::class)->create();

        $resp = $this->especialidadRepo->delete($especialidad->id);

        $this->assertTrue($resp);
        $this->assertNull(Especialidad::find($especialidad->id), 'Especialidad should not exist in DB');
    }
}
