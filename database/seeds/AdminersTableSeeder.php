<?php

use Illuminate\Database\Seeder;
use App\Models\Adminer;

class AdminersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adminer::query()->truncate();
        Adminer::create([
            'username' => 'admin',
            'account' => 'admin',
            'password' => bcrypt('111111')
        ]);
    }
}
