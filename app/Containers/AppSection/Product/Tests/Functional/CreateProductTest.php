<?php

namespace App\Containers\AppSection\Product\Tests\Functional;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group product
 * @group functional
 */
final class CreateProductTest extends TestCase
{
    use RefreshDatabase;

    public function testGuestCannotCreateProduct(): void
    {
        $data = [
            'name' => 'Test Product',
            'description' => 'This is a test product description',
            'price' => 99.99,
            'stock' => 50,
        ];

        $response = $this->postJson('/v1/products', $data);

        $response->assertStatus(401);
    }

    public function testAuthenticatedUserCanCreateProduct(): void
    {
        $user = User::factory()->createOne();
        
        $data = [
            'name' => 'Test Product',
            'description' => 'This is a test product description',
            'price' => 99.99,
            'stock' => 50,
        ];

        $response = $this->actingAs($user, 'api')->postJson('/v1/products', $data);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'type',
                    'id',
                    'name',
                    'description',
                    'price',
                    'stock',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('products', [
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock'],
        ]);
    }

    public function testCreateProductWithInvalidData(): void
    {
        $user = User::factory()->createOne();
        
        $response = $this->actingAs($user, 'api')->postJson('/v1/products', [
            'name' => '', // Invalid: required field
            'price' => -10, // Invalid: must be >= 0
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'description', 'stock'])
            ->assertJsonValidationErrors(['price']);
    }
}
