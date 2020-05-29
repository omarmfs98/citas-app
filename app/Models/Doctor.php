<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Doctor
 * @package App\Models
 * @version May 28, 2020, 7:07 pm UTC
 *
 * @property integer $specility_id
 */
class Doctor extends Model
{
    use SoftDeletes;

    public $table = 'doctors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'specialty_id', 'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'specialty_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'specialty_id' => 'required',
        'user_id' => 'required'
    ];

    
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function specialty()
    {
        return $this->hasOne('App\Models\Specialty','id','specialty_id');
    }

    public function schedules()
    {
        return $this->hasMany('App\Models\Schedule','doctor_id','id');
    }
}
