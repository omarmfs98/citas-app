<?php namespace Tests\Repositories;

use App\Models\Doctor;
use App\Repositories\DoctorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DoctorRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DoctorRepository
     */
    protected $doctorRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->doctorRepo = \App::make(DoctorRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_doctor()
    {
        $doctor = factory(Doctor::class)->make()->toArray();

        $createdDoctor = $this->doctorRepo->create($doctor);

        $createdDoctor = $createdDoctor->toArray();
        $this->assertArrayHasKey('id', $createdDoctor);
        $this->assertNotNull($createdDoctor['id'], 'Created Doctor must have id specified');
        $this->assertNotNull(Doctor::find($createdDoctor['id']), 'Doctor with given id must be in DB');
        $this->assertModelData($doctor, $createdDoctor);
    }

    /**
     * @test read
     */
    public function test_read_doctor()
    {
        $doctor = factory(Doctor::class)->create();

        $dbDoctor = $this->doctorRepo->find($doctor->id);

        $dbDoctor = $dbDoctor->toArray();
        $this->assertModelData($doctor->toArray(), $dbDoctor);
    }

    /**
     * @test update
     */
    public function test_update_doctor()
    {
        $doctor = factory(Doctor::class)->create();
        $fakeDoctor = factory(Doctor::class)->make()->toArray();

        $updatedDoctor = $this->doctorRepo->update($fakeDoctor, $doctor->id);

        $this->assertModelData($fakeDoctor, $updatedDoctor->toArray());
        $dbDoctor = $this->doctorRepo->find($doctor->id);
        $this->assertModelData($fakeDoctor, $dbDoctor->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_doctor()
    {
        $doctor = factory(Doctor::class)->create();

        $resp = $this->doctorRepo->delete($doctor->id);

        $this->assertTrue($resp);
        $this->assertNull(Doctor::find($doctor->id), 'Doctor should not exist in DB');
    }
}
