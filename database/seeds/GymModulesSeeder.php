<?php

use Illuminate\Database\Seeder;
use App\GymModule;

class GymModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GymModule::truncate();
        $modules = array(
            array('name' => 'Membership'),
            array('name' => 'Employee'),
            array('name' => 'Members'),
            array('name' => 'Trainers'),
            array('name' => 'Suppliers'),
            array('name' => 'Treasuries'),
            array('name' => 'Services'),
            array('name' => 'Profile'),
        );
        GymModule::insert($modules);
    }
}
