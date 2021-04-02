<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => "user{$i}",
                'email' => "user{$i}@gmail.com",
                'phone' => bcrypt('User@123'),
            ]);
        }
        for ($i = 0; $i < 20; $i++) {
            DB::table('students')->insert([
                'name' => "user{$i}",
                'email' => "user{$i}@gmail.com",
                'phone' => "0123456789",
            ]);
        }
    }
}
