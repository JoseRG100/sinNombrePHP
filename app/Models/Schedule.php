<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 *
 * @property $id
 * @property $id_class
 * @property $time_start
 * @property $time_end
 * @property $day
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Schedule extends Model
{
    
    static $rules = [
		'id_class' => 'required',
		'time_start' => 'required',
		'time_end' => 'required',
		'day' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_class','time_start','time_end','day'];



}
