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
	'password' => $password ?: $password = bcrypt('secret'),
	'remember_token' => str_random(10),
	];
});

$factory->define(App\Project::class, function(Faker\Generator $faker) {
	return [
	'id' => $faker->unique()->numberBetween($min = 1, $max = 50),
	'status' => $faker->randomElement(['active', 'icebox', 'complete']),
	'type' => $faker->randomElement(['project', 'feature']),
	'start_date' => $faker->date,
	'end_date' => $faker->date,
	'client' => $faker->name,
	'description' => $faker->paragraph,
	'notes' => $faker->sentence,
	'contacts_id' => $faker->randomDigit,
	'user_id' => function() {
		return factory('App\User')->create()->id;
	},
	];
});