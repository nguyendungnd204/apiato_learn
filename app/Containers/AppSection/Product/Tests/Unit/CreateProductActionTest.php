<?php

namespace App\Containers\AppSection\Product\Tests\Unit;

use App\Containers\AppSection\Product\Actions\CreateProductAction;
use App\Containers\AppSection\Product\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group product
 * @group unit
 */
final class CreateProductActionTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateProduct(): void
    {
        $data = [
            'name' => 'Test Product',
            'description' => 'This is a test product description',
            'price' => 99.99,
            'stock' => 50,
        ];

        $action = app(CreateProductAction::class);
        $product = $action->run($data);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($data['name'], $product->name);
        $this->assertEquals($data['description'], $product->description);
        $this->assertEquals($data['price'], $product->price);
        $this->assertEquals($data['stock'], $product->stock);
        $this->assertDatabaseHas('products', $data);
    }
}
