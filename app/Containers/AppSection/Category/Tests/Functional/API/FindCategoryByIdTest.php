<?php

namespace App\Containers\AppSection\Category\Tests\Functional\API;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Category\UI\API\Controllers\FindCategoryByIdController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class FindCategoryByIdTest extends ApiTestCase
{
    public function testFindCategory(): void
    {
        $this->actingAs(User::factory()->createOne());
        $category = Category::factory()->createOne();

        $response = $this->getJson(action(FindCategoryByIdController::class, ['id' => $category->getHashedKey()]));

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $category->getHashedKey())
                    ->etc()
        );
    }
}
