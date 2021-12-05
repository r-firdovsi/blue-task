<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'weblink' => $faker->url,
        'logo' => $faker->image('public/storage/company/logos', 100, 100, null, false)
    ];
});
