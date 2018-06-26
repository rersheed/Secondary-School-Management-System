<?php

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'regNumber' => $faker->regexify('SHB/\17/\100[1-9]'),
        'surname' => $faker->randomElement($array = array ('Abubakar', 'Anas', 'Abdullahi', 'Ibrahim', 'Isma’ila', 'Aliyu','Umar','Isa', 'Musa','Muhammad')),
        'othernames' => $faker->randomElement($array = array ('Abubakar', 'Anas', 'Abdullahi', 'Ibrahim', 'Isma’ila', 'Aliyu','Umar','Isa', 'Musa','Muhammad')),
        'sex' => $faker->numberBetween(0,1),
        'dateOfBirth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => $faker->phoneNumber,
        'lastSchool' => 'Any School',
        'admissionDate' => '2018-01-09',
        'level_id' => 1,
        'address' => 'No oho',
        'image' => '7e57d004',
        'is_active' => 1,
        'guardian_id' => 1
    ];
});
