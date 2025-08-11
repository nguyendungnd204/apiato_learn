<?php

namespace App\Containers\AppSection\Class\Models;

use App\Ship\Parents\Models\Model as ParentModel;

final class Classes extends ParentModel
{
    protected $table = 'classes';

    protected $fillable = [
        'class_code',
        'name',
        'description',
        'start_date',
        'end_date',
    ];

    public function students()
    {
        return $this->hasMany('App\Containers\AppSection\Student\Models\Student', 'class_id', 'id');
    }
}
