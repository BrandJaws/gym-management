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
            'name' => 'Zuhair Ahmad',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
