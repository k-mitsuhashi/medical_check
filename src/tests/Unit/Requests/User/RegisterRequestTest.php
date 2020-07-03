<?php

namespace Tests\Unit\Requests\User;

use PHPUnit\Framework\TestCase;
use App\Http\Requests\User\RegisterRequest;

class RegisterRequestTest extends TestCase
{
    public function dataProvider()
    {
        return [
            ['name', null, false],
            ['name', 'aaa', true],
            ['birth_date', null, false],
            ['birth_date', 1, false],
            ['birth_date', 'a', false],
            ['birth_date', '2020-1-1', true],
            ['birth_date', '2050-1-1', false],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testValidation($item, $data, $expected)
    {
        $rules = (new RegisterRequest())->rules();

        $validator = \Validator::make(
            [$item => $data],
            [$item => $rules[$item]],
        );
        $result = $validator->passes();

        $this->assertEquals($expected, $result);
    }
}
