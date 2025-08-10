<?php

namespace App\Containers\AppSection\Student\Tests\Functional\API;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Student\UI\API\Controllers\UpdateStudentController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class UpdateStudentTest extends ApiTestCase
{
    // TODO: test
    public function testUpdateExistingStudent(): void
    {
        $this->actingAs(User::factory()->createOne());
        $student = Student::factory()->createOne([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $response = $this->patchJson(action(UpdateStudentController::class, ['id' => $student->getHashedKey()]), $data);

        $response->assertOk();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.type', 'Student')
                    ->where('data.id', $student->getHashedKey())
                    // ->where('data.some_field', $data['some_field'])
                    ->etc()
        );
    }
}
