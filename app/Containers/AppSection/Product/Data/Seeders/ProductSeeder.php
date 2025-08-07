<?php

namespace App\Containers\AppSection\Product\Data\Seeders;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

final class ProductSeeder extends ParentSeeder
{
    public function run(): void
    {
        Product::factory()->count(10)->create();
    }
}
