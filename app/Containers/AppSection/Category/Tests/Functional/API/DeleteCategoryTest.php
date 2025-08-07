<?php

namespace App\Containers\AppSection\Category\Tests\Functional\API;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Category\UI\API\Controllers\DeleteCategoryController;
use App\Containers\AppSection\User\Models\User;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class DeleteCategoryTest extends ApiTestCase
{
    public function testDeleteExistingCategory(): void
    {
        $this->actingAs(User::factory()->createOne());
        $category = Category::factory()->createOne();

        $response = $this->deleteJson(action(DeleteCategoryController::class, ['id' => $category->getHashedKey()]));

        $response->assertNoContent();
    }
}
