<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Skayologie',
            'email' => 'jawadboulmal@gmail.com',
            "password"=>"Login@1234"
        ]);
        User::factory(10)->create();
    }
}
