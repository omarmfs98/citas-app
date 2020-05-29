<?php

namespace App\Repositories;

use App\Models\Cita;
use App\Repositories\BaseRepository;

/**
 * Class CitaRepository
 * @package App\Repositories
 * @version May 29, 2020, 6:40 pm UTC
*/

class CitaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'paciente_id',
        'doctor_id',
        'date_cita'
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
        return Cita::class;
    }
}
