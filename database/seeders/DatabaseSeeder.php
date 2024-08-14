<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Musicials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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


        $musicians = [];
        for($i=0;$i<10;$i++){
            $musicians[]=[
                'name' => 'Musician '.$i,
                'profile_picture' =>fake()->image(),
                'birth-date' => fake()->date(),
                'instrument' => fake()->text(),
            ];
        }
        DB::table('musicials')->insert($musicians);
    }
}
