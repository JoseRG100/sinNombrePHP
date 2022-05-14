<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Work
 *
 * @property $id
 * @property $id_class
 * @property $id_student
 * @property $name
 * @property $mark
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Work extends Model
{
    
    static $rules = [
		'id_class' => 'required',
		'id_student' => 'required',
		'name' => 'required',
		'mark' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_class','id_student','name','mark'];



}
