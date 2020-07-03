<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Record;
use Faker\Generator as Faker;

$factory->define(Record::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\Models\User::class),
        'year' => $faker->dateTimeBetween('-20 years')->format('Y'),
        'date' => function (array $record) use ($faker) {
            $start = $record['year'] . '-4-1';
            $end = ($record['year'] + 1) . '-3-31';
            return $faker->dateTimeBetween($start, $end)->format('Y-m-d');
        },
        'course' => $faker->numberBetween(0, 1),
        'place' => $faker->streetName,
    ];
});
