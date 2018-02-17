<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('truncate users');
        factory(\App\User::class,1)->create([
            'name' => 'Rossano',
            'email' => 'rossanorb@gmail.com',
            'password' => bcrypt('102030'),
            'remember_token' => str_random(10),
        ]);

        //factory(\App\User::class,50)->create();
    }
}
