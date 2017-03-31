<?php

/*
|--------------------------------------------------------------------------
| User Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory('App\User', [
	'name' => 'QA admin',
	'email' => 'admin@cp.com',
	'password' => bcrypt('admin')
]);