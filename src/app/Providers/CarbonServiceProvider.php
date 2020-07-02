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
            // 誕生日
            $carbon = self::this();
            $birthday = $carbon->format('Ymd');

            // 年度の末日
            $today = Carbon::today();
            $year = ($today->month > 3) ? $today->year + 1: $today->year;
            $endday = sprintf('%04d%02d%01d', $year, 3, 31);

            // 年齢
            $carbon->age = floor(($endday - $birthday) / 10000);
        });

        // 満年齢からコース区分を取得する
        Carbon::macro('getCourse', static function () {
            return (self::this()->age >= 35) ? 0 : 1;
        });
    }
}
