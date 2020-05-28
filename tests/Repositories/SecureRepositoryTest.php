<?php namespace Tests\Repositories;

use App\Models\Secure;
use App\Repositories\SecureRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SecureRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SecureRepository
     */
    protected $secureRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->secureRepo = \App::make(SecureRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_secure()
    {
        $secure = factory(Secure::class)->make()->toArray();

        $createdSecure = $this->secureRepo->create($secure);

        $createdSecure = $createdSecure->toArray();
        $this->assertArrayHasKey('id', $createdSecure);
        $this->assertNotNull($createdSecure['id'], 'Created Secure must have id specified');
        $this->assertNotNull(Secure::find($createdSecure['id']), 'Secure with given id must be in DB');
        $this->assertModelData($secure, $createdSecure);
    }

    /**
     * @test read
     */
    public function test_read_secure()
    {
        $secure = factory(Secure::class)->create();

        $dbSecure = $this->secureRepo->find($secure->id);

        $dbSecure = $dbSecure->toArray();
        $this->assertModelData($secure->toArray(), $dbSecure);
    }

    /**
     * @test update
     */
    public function test_update_secure()
    {
        $secure = factory(Secure::class)->create();
        $fakeSecure = factory(Secure::class)->make()->toArray();

        $updatedSecure = $this->secureRepo->update($fakeSecure, $secure->id);

        $this->assertModelData($fakeSecure, $updatedSecure->toArray());
        $dbSecure = $this->secureRepo->find($secure->id);
        $this->assertModelData($fakeSecure, $dbSecure->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_secure()
    {
        $secure = factory(Secure::class)->create();

        $resp = $this->secureRepo->delete($secure->id);

        $this->assertTrue($resp);
        $this->assertNull(Secure::find($secure->id), 'Secure should not exist in DB');
    }
}
