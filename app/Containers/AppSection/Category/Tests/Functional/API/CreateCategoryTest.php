<?php

namespace App\Containers\AppSection\Category\Tests\Functional\API;

use App\Containers\AppSection\Category\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Category\UI\API\Controllers\CreateCategoryController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class CreateCategoryTest extends ApiTestCase
{
    public function testCreateCategory(): void
    {
        $this->actingAs(User::factory()->createOne());
        $data = [
            // TODO: test
            // 'something' => 'value',
        ];

        $response = $this->postJson(action(CreateCategoryController::class), $data);

        $response->assertCreated();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.type', 'Category')
                    // ->where('data.something', $data['something'])
                    ->etc()
        );
    }
}
