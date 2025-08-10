<?php

namespace App\Containers\AppSection\Student\Tests\Functional\API;

use App\Containers\AppSection\Student\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Student\UI\API\Controllers\CreateStudentController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class CreateStudentTest extends ApiTestCase
{
    public function testCreateStudent(): void
    {
        $this->actingAs(User::factory()->createOne());
        $data = [
            // TODO: test
            // 'something' => 'value',
        ];

        $response = $this->postJson(action(CreateStudentController::class), $data);

        $response->assertCreated();
        $response->assertJson(
            fn (AssertableJson $json) =>
                $json->has('data')
                    ->where('data.type', 'Student')
                    // ->where('data.something', $data['something'])
                    ->etc()
        );
    }
}
