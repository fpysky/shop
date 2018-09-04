<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        User::create([
            'name' => 'usera',
            'email' => 'usera@gmail.com',
            'password' => bcrypt('111111')
        ]);
        User::create([
            'name' => 'userb',
            'email' => 'userb@gmail.com',
            'password' => bcrypt('11111'),
        ]);
    }
}