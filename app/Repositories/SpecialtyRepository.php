<?php

namespace App\Repositories;

use App\Models\Specialty;
use App\Repositories\BaseRepository;

/**
 * Class SpecialtyRepository
 * @package App\Repositories
 * @version May 27, 2020, 5:43 pm UTC
*/

class SpecialtyRepository extends BaseRepository
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
        return Specialty::class;
    }
}
