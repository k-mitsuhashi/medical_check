<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class CarbonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 年度の末日を算出する
        Carbon::macro('endOfFiscalYear', function () {
            $year = ($this->month > 3) ? $this->year : $this->year - 1;
            return Carbon::createMidnightDate($year, 3, 31);
        });

        // 誕生日から満年齢をセットする
        Carbon::macro('setAge', static function () {
            $endday = Carbon::today()->endOfFiscalYear();
            $carbon->age = self::this()->diffInYears($endday);
        });

        // 満年齢からコース区分を取得する
        Carbon::macro('getCourse', static function () {
            return (self::this()->age >= 35) ? 0 : 1;
        });
    }
}
