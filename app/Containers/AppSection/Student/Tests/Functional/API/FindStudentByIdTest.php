<?php

namespace App\Containers\AppSection\Student\Tests\Functional\API;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Student\UI\API\Controllers\FindStudentByIdController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class FindStudentByIdTest extends ApiTestCase
{
    public function testFindStudent(): void
    {
        $this->actingAs(User::factory()->createOne());
        $student = Student::factory()->createOne();

        $response = $this->getJson(action(FindStudentByIdController::class, ['id' => $student->getHashedKey()]));

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.id', $student->getHashedKey())
                    ->etc()
        );
    }
}
