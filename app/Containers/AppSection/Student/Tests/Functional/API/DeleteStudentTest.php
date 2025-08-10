<?php

namespace App\Containers\AppSection\Student\Tests\Functional\API;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Student\UI\API\Controllers\DeleteStudentController;
use App\Containers\AppSection\User\Models\User;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class DeleteStudentTest extends ApiTestCase
{
    public function testDeleteExistingStudent(): void
    {
        $this->actingAs(User::factory()->createOne());
        $student = Student::factory()->createOne();

        $response = $this->deleteJson(action(DeleteStudentController::class, ['id' => $student->getHashedKey()]));

        $response->assertNoContent();
    }
}
