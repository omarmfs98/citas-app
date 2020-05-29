<?php namespace Tests\Repositories;

use App\Models\Cita;
use App\Repositories\CitaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CitaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CitaRepository
     */
    protected $citaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->citaRepo = \App::make(CitaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_cita()
    {
        $cita = factory(Cita::class)->make()->toArray();

        $createdCita = $this->citaRepo->create($cita);

        $createdCita = $createdCita->toArray();
        $this->assertArrayHasKey('id', $createdCita);
        $this->assertNotNull($createdCita['id'], 'Created Cita must have id specified');
        $this->assertNotNull(Cita::find($createdCita['id']), 'Cita with given id must be in DB');
        $this->assertModelData($cita, $createdCita);
    }

    /**
     * @test read
     */
    public function test_read_cita()
    {
        $cita = factory(Cita::class)->create();

        $dbCita = $this->citaRepo->find($cita->id);

        $dbCita = $dbCita->toArray();
        $this->assertModelData($cita->toArray(), $dbCita);
    }

    /**
     * @test update
     */
    public function test_update_cita()
    {
        $cita = factory(Cita::class)->create();
        $fakeCita = factory(Cita::class)->make()->toArray();

        $updatedCita = $this->citaRepo->update($fakeCita, $cita->id);

        $this->assertModelData($fakeCita, $updatedCita->toArray());
        $dbCita = $this->citaRepo->find($cita->id);
        $this->assertModelData($fakeCita, $dbCita->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_cita()
    {
        $cita = factory(Cita::class)->create();

        $resp = $this->citaRepo->delete($cita->id);

        $this->assertTrue($resp);
        $this->assertNull(Cita::find($cita->id), 'Cita should not exist in DB');
    }
}
