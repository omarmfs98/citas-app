<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Schedule
 * @package App\Models
 * @version May 28, 2020, 7:01 pm UTC
 *
 * @property string|\Carbon\Carbon $start_time
 * @property string|\Carbon\Carbon $end_time
 */
class Schedule extends Model
{
    use SoftDeletes;

    public $table = 'schedules';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'start_time',
        'end_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'start_time' => 'required',
        'end_time' => 'required'
    ];

    
}
