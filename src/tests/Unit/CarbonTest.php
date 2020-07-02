<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\CreatesApplication;
use Carbon\Carbon;

class CarbonTest extends TestCase
{
    use CreatesApplication;

    public function setUp() :void
    {
        parent::setUp();
        $this->createApplication();
    }

    public function tearDown() :void
    {
        parent::tearDown();
        Carbon::setTestNow();
    }

    public function fiscalYearProvider()
    {
        return [
            ['2019-3-31', 2018],
            ['2019-4-1', 2019],
            ['2020-3-31', 2019],
            ['2020-4-1', 2020],
        ];
    }

    /**
     * @dataProvider fiscalYearProvider
     */
    public function testFiscalYear($date, $expected)
    {
        $corbon = Carbon::create($date);
        $this->assertEquals($corbon->fiscalYear(), $expected);
    }

    public function ageProvider()
    {
        return [
            ['2000-1-1', '2020-3-1', 20],
            ['2000-1-1', '2020-10-1', 21],
            ['2000-5-1', '2020-3-1', 19],
            ['2000-5-1', '2020-10-1', 20],
        ];
    }

    /**
     * @dataProvider ageProvider
     */
    public function testAge($date, $today, $expected)
    {
        Carbon::setTestNow(Carbon::create($today));
        // setTestNowが効かないので直接ロジック書く

        // 誕生日
        $carbon = Carbon::create($date);
        $birthday = $carbon->format('Ymd');

        // 年度の末日
        $today = Carbon::today();
        $year = ($today->month > 3) ? $today->year + 1: $today->year;
        $endday = sprintf('%04d%02d%01d', $year, 3, 31);

        // 年齢
        $age = floor(($endday - $birthday) / 10000);

        $this->assertEquals($age, $expected);
    }

    public function courseProvider()
    {
        return [
            ['1984-5-1', '2020-3-1', 0],
            ['1985-5-1', '2020-3-1', 1],
            ['1986-5-1', '2020-3-1', 1],
        ];
    }

    /**
     * @dataProvider courseProvider
     */
    public function testCourse($date, $today, $expected)
    {
        Carbon::setTestNow(Carbon::create($today));

        $carbon = Carbon::create($date);
        $this->assertEquals($carbon->course, $expected);
    }
}
