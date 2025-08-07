<?php

namespace App\Containers\AppSection\Category\Tests\Functional\API;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Category\UI\API\Controllers\UpdateCategoryController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class UpdateCategoryTest extends ApiTestCase
{
    // TODO: test
    public function testUpdateExistingCategory(): void
    {
        $this->actingAs(User::factory()->createOne());
        $category = Category::factory()->createOne([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->patchJson(action(UpdateCategoryController::class, ['id' => $category->getHashedKey()]), $data);

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.type', 'Category')
                    ->where('data.id', $category->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }
}
