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

// contacts
$factory->define(App\Contact::class, function(Faker\Generator $faker) {
	return [
	'fname' => $faker->firstName,
	'lname' => $faker->lastName,
	'title' => $faker->word,
	'email' => $faker->email,
	'phone' => $faker->phoneNumber,
	];
});

// division
$factory->define(App\Division::class, function(Faker\Generator $faker) {
	return [
	'title' => $faker->word,
	'description' => $faker->paragraph,
	'url' => $faker->url,
	];
});

// areas
$factory->define(App\Area::class, function(Faker\Generator $faker) {
	return [
	'title' => $faker->word,
	'description' => $faker->paragraph,
	'url' => $faker->url,
	'division' => function() {
		return factory('App\Division')->create()->title;
	},
	'leadership' => function() {
		return factory('App\Contact')->create()->lname;
	},
	];
});

// clients
$factory->define(App\Client::class, function(Faker\Generator $faker) {
	return [
	'title' => $faker->word,
	'description' => $faker->paragraph,
	'url' => $faker->url,
	'area' => function() {
		return factory('App\Area')->create()->title;
	},
	'owners' => function() {
		return factory('App\Contact')->create()->lname;
	},
	'contributors' => function() {
		return factory('App\Contact')->create()->lname;
	},
	];
});

// projects
$factory->define(App\Project::class, function(Faker\Generator $faker) {
	return [
	'status' => $faker->randomElement(['active', 'icebox', 'complete']),
	'phase' => $faker->word,
	'type' => $faker->randomElement(['project', 'feature']),
	'start_date' => $faker->date,
	'end_date' => $faker->date,
	'client' => function() {
		return factory('App\Client')->create()->title;
	},
	'description' => $faker->paragraph,
	'notes' => $faker->sentence,
	'contacts' => function() {
		return factory('App\Contact')->create()->lname;
	},
	];
});

