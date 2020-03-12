<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        Admin::create([
            'name' => 'admin',
            'email' => 'default@portal.com',
            'password' => Hash::make('1q2w3e4r5t')
        ]);
    }
}
