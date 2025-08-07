<?php

namespace App\Containers\AppSection\Category\Models;

use App\Ship\Parents\Models\Model as ParentModel;

final class Category extends ParentModel
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_active',
        'parent_id',
        'sort_order',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
