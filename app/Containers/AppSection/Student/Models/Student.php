<?php

namespace App\Containers\AppSection\Student\Models;

use App\Ship\Parents\Models\Model as ParentModel;

final class Student extends ParentModel
{
    protected $table = 'students';

    protected $fillable = [
        'student_code',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'email',
        'phone',
        'address',
        'class',
        'major',
        'enrollment_date',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo('App\Containers\AppSection\Class\Models\Classes', 'class_id', 'id');
    }
}
