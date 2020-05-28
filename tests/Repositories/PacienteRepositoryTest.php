<?php namespace Tests\Repositories;

use App\Models\Paciente;
use App\Repositories\PacienteRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PacienteRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PacienteRepository
     */
    protected $pacienteRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pacienteRepo = \App::make(PacienteRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_paciente()
    {
        $paciente = factory(Paciente::class)->make()->toArray();

        $createdPaciente = $this->pacienteRepo->create($paciente);

        $createdPaciente = $createdPaciente->toArray();
        $this->assertArrayHasKey('id', $createdPaciente);
        $this->assertNotNull($createdPaciente['id'], 'Created Paciente must have id specified');
        $this->assertNotNull(Paciente::find($createdPaciente['id']), 'Paciente with given id must be in DB');
        $this->assertModelData($paciente, $createdPaciente);
    }

    /**
     * @test read
     */
    public function test_read_paciente()
    {
        $paciente = factory(Paciente::class)->create();

        $dbPaciente = $this->pacienteRepo->find($paciente->id);

        $dbPaciente = $dbPaciente->toArray();
        $this->assertModelData($paciente->toArray(), $dbPaciente);
    }

    /**
     * @test update
     */
    public function test_update_paciente()
    {
        $paciente = factory(Paciente::class)->create();
        $fakePaciente = factory(Paciente::class)->make()->toArray();

        $updatedPaciente = $this->pacienteRepo->update($fakePaciente, $paciente->id);

        $this->assertModelData($fakePaciente, $updatedPaciente->toArray());
        $dbPaciente = $this->pacienteRepo->find($paciente->id);
        $this->assertModelData($fakePaciente, $dbPaciente->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_paciente()
    {
        $paciente = factory(Paciente::class)->create();

        $resp = $this->pacienteRepo->delete($paciente->id);

        $this->assertTrue($resp);
        $this->assertNull(Paciente::find($paciente->id), 'Paciente should not exist in DB');
    }
}
