<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        Category::create(['name'=>'Classical']);
        Category::create(['name'=>'Animals']);
        Category::create(['name'=>'Funny']);
        Category::create(['name'=>'SMS']);
        Category::create(['name'=>'Alarms']);
        Category::create(['name'=>'Children']);
        Category::create(['name'=>'Standard']);
        Category::create(['name'=>'Music']);
        Category::create(['name'=>'Holiday']);
        Category::create(['name'=>'Nature']);

        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin12345'),
            'email_verified_at'=>NOW(),
        ]);
    }
}
