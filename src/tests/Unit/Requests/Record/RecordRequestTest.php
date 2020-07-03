<?php

namespace Tests\Unit\Requests\Record;

use PHPUnit\Framework\TestCase;
use App\Http\Requests\Record\RecordRequest;

class RecordRequestTest extends TestCase
{
    public function dataProvider()
    {
        return [
            ['year', null, false],
            ['year', 'a', false],
            ['year', 2020, true],
        ];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testValidation($item, $data, $expected)
    {
        $rules = (new RecordRequest())->rules();

        $validator = \Validator::make(
            [$item => $data],
            [$item => $rules[$item]],
        );
        $result = $validator->passes();

        $this->assertEquals($expected, $result);
    }
}
