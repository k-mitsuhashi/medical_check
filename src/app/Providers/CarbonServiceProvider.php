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
        // 年度を求める
        Carbon::macro('fiscalYear', function () {
            return ($this->month > 3) ? $this->year : $this->year - 1;
        });

        // 誕生日から満年齢をセットする
        Carbon::macro('setAge', static function () {
            // 年度の末日を算出する
            $fiscalYear = Carbon::today()->fiscalYear();
            $endday = Carbon::createMidnightDate($year, 3, 31);

            $carbon->age = self::this()->diffInYears($endday);
        });

        // 満年齢からコース区分を取得する
        Carbon::macro('getCourse', static function () {
            return (self::this()->age >= 35) ? 0 : 1;
        });
    }
}
