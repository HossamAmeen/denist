<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {

    return [


        'user_name' => $faker->name.'_user',
        'name' => $faker->name ,
        'password' => bcrypt('admin'),
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'role' => 1,
        'user_id' => 1
    ];
});



$factory->define(App\Models\Patient::class, function (Faker $faker) {
    return [
        'name'=>$faker->text ,
        'phone'=>$faker->e164PhoneNumber,
        'address'=>$faker->name,
        'age'=>rand(5,80),
        'national_id'=>"123456789",
        'Nurse_id'=>rand(1,2),
    ];
});

$factory->define(App\Models\Visit::class, function (Faker $faker) {
    $statues = ['منتظر', 'مع الطبيب' , 'جاهز للدفع' , 'انتهت الزياره' ];
    return [
        'date'=>date('Y-m-d'),
        
        'time'=>date("h:i"),
        'status'=>$statues[rand(0,3)],
        
        'patient_id'=>rand(1,9),
        'doctor_id'=>rand(1,2),
        'Nurse_id'=>rand(1,2),
        
        
    ];
});
