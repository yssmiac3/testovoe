<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consumer;
//use Illuminate\Database\Eloquent\Model;


class ConsumersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++){
        	Consumer::create([
        		'first_name' => $faker->firstName,
        		'last_name' => $faker->lastName,
        		'email' => $faker->email,
        		'amount' => rand(0, 10000),
        	]);
        }
    }
}
