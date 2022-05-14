<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Percentage
 *
 *
 * @property $id
 * @property $id_course
 * @property $id_class
 * @property $continuous_assessment
 * @property $exams
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Percentage extends Model
{
    
    static $rules = [
		'id_course' => 'required',
		'id_class' => 'required',
		'continuous_assessment' => 'required',
		'exams' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_course','id_class','continuous_assessment','exams'];



}
