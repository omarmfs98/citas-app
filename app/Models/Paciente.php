<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente
 * @package App\Models
 * @version May 27, 2020, 5:48 pm UTC
 *
 * @property integer $user_id
 * @property integer $secure_id
 */
class Paciente extends Model
{
    use SoftDeletes;

    public $table = 'pacientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'secure_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'secure_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'secure_id' => 'required'
    ];


    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function secure()
    {
        return $this->hasOne('App\Models\Secure','id','secure_id');
    }
    
}
