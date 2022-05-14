<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CreateCoursesTable;

class Courses extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'courses';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'date_start',
        'date_end',
        'active'

    ];
}
