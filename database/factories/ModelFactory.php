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

$factory->define(App\Badge::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'experience' => $faker->numberBetween(25, 100),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Ingredient::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'allergenic' => $faker->boolean()
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(15,35),
        'experience' => $faker->numberBetween(5, 10),
        'categories_id' => DB::table('categories')->pluck('id')->random()
    ];
});

$factory->define(App\ProductIngredient::class, function (Faker\Generator $faker) {
    return [
        'products_id' => DB::table('products')->pluck('id')->random(),
        'ingredients_id' => DB::table('ingredients')->pluck('id')->random()
    ];
});


$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => app('hash')->make('123'),
        'experience' => $faker->numberBetween(0,2000)
    ];
});

$factory->define(App\UserBadge::class, function (Faker\Generator $faker) {
    return [
        'users_id' => DB::table('users')->pluck('id')->random(),
        'badges_id' => DB::table('badges')->pluck('id')->random()
    ];
});
