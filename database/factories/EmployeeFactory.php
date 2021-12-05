<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber
    ];
});

$factory->afterCreating(Employee::class, function (Employee $employee, Faker $faker) {
    $company = factory(Company::class)->create();
    $employee->company()->associate($company);
});
