<?php

namespace App\Containers\AppSection\Student\Tests\Functional\API;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Student\UI\API\Controllers\ListStudentsController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class ListStudentsTest extends ApiTestCase
{
    public function testListStudentsByAdmin(): void
    {
        $this->actingAs(User::factory()->createOne());
        Student::factory()->count(2)->create();

        $response = $this->getJson(action(ListStudentsController::class));

        $response->assertOk();
        $response->assertJson(
            static fn (AssertableJson $json) =>
                $json->has('data', 2)
                    ->etc()
        );
    }
}
