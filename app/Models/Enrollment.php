<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Enrollment
 *
 * @property $id
 * @property $id_student
 * @property $id_course
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Enrollment extends Model
{
    
    static $rules = [
		'id_student' => 'required',
		'id_course' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_student','id_course','status'];



}
