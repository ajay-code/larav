<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Admin::class, function (){
    return [
        'name' =>'admin',
        'username' => 'admin',
        'password' => bcrypt('123456')
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company
    ];
});

$factory->define(\App\Models\Subcategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'category_id' => factory(App\Models\Category::class)->create()->id
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker){
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'subcategory_id' => factory(\App\Models\Subcategory::class)->create()->id,
        'title' => $faker->sentence,
        'description' => $faker->paragraphs(3 ,true),
        'budget' => 12345,
        'order_completed' => false,
        'primary_image' => 1,
    ];
});