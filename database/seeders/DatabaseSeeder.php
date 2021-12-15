<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ //1
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'created_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([ //1
            'name' => "user",
            'email' => "user@gmail.com",
            'password' => Hash::make('password123'),
            'role' => 'user',
            'created_at' => Carbon::now(),
        ]);

        DB::table('types')->insert([ //1
            'name' => "Basketball",
            'created_at' => Carbon::now(),
        ]);

        DB::table('types')->insert([ //1
            'name' => "Football",
            'created_at' => Carbon::now(),
        ]);

        DB::table('types')->insert([ //1
            'name' => "Handball",
            'created_at' => Carbon::now(),
        ]);

        DB::table('events')->insert([ //1
            'name' => "Basketball at school",
            'description' => "Let's meet up for some basketball at local school",
            'isActive' => false,
            'count' => 5,
            'type_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('events')->insert([ //1
            'name' => "1on1",
            'description' => "Wanna improve my game playing 1on1",
            'isActive' => true,
            'count' => 10,
            'type_id' => 1,
            'created_at' => Carbon::now(),
        ]);


        DB::table('events')->insert([ //1
            'name' => "Daily Kickoff",
            'description' => "Everyone welcome at the stadium",
            'isActive' => true,
            'count' => 16,
            'type_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('events')->insert([ //1
            'name' => "Tryouts for Dodgers",
            'description' => "If you wanna play in a team come and test out your luck",
            'isActive' => false,
            'count' => 5,
            'type_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        DB::table('comments')->insert([ //1
            'content' => "Lame organization",
            'event_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('comments')->insert([ //1
            'content' => "Let's goooo!",
            'event_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('comments')->insert([ //1
            'content' => "I'm lacing my shoes right now, pronto!",
            'event_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('comments')->insert([ //1
            'content' => "Handball? What's that....",
            'event_id' => 3,
            'created_at' => Carbon::now(),
        ]);
    }
}
