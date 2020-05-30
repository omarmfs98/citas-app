<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cita
 * @package App\Models
 * @version May 29, 2020, 6:40 pm UTC
 *
 * @property integer $paciente_id
 * @property integer $doctor_id
 * @property string|\Carbon\Carbon $date_cita
 */
class Cita extends Model
{
    use SoftDeletes;

    public $table = 'citas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'paciente_id',
        'date_cita'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'paciente_id' => 'integer',
        'date_cita' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'paciente_id' => 'required',
        'date_cita' => 'required'
    ];

    
}
