<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\myPortfolio;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(UsersTableSeeder::class);
        
        $faker = Faker::create('id_ID');

        // $users = factory(App\User::class,3)
        //         ->create()
        //         ->each(function($user){
        //             $user->posts()->save(factory(App\Post::class)->make());
        //         });

        for($i=1;$i <= 10;$i++){
            myPortfolio::create([
                'category_id'=>$faker->category_id,
                'image_file_url'=>$faker->imageUrl(360, 360, 'animals', true, 'cats'),
                'home_image'=>$faker->imageUrl(360, 360, 'animals', true, 'cats'),
                'Name'=>$faker->Name,
                'About'=>$faker->About,
                'Profile'=>$faker->Profile,
                'Email'=>$faker->Email,
                'Phone'=>$faker->Phone,
            ]);
        }
    }
}
