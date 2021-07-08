<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::UpdateOrCreate(['id'=> 1], [
            'name' => 'admin',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
    }
}
