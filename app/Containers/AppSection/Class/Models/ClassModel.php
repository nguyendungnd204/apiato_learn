<?php

namespace App\Containers\AppSection\Class\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class ClassModel extends ParentModel
{
    protected $table = 'classes';

    protected $fillable = [
        'class_code',
        'name',
        'description',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function students(): HasMany
    {
        return $this->hasMany('App\Containers\AppSection\Student\Models\Student', 'class_id', 'id');
    }

    public function getResourceKey(): string
    {
        return 'classes';
    }
}
