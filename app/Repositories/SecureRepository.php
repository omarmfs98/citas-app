<?php

namespace App\Repositories;

use App\Models\Secure;
use App\Repositories\BaseRepository;

/**
 * Class SecureRepository
 * @package App\Repositories
 * @version May 27, 2020, 5:44 pm UTC
*/

class SecureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Secure::class;
    }
}
