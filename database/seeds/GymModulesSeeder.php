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
            array('name' => 'Membership','route' => 'membership.member','activeRoute' => 'gym/membership','icon' => 'flaticon-users-1'),
            array('name' => 'Employee','route' => 'employee.member','activeRoute' => 'gym/employee','icon' => 'flaticon-users-1'),
            array('name' => 'Members','route' => 'member.dashboard','activeRoute' => 'gym/member','icon' => 'flaticon-users'),
            array('name' => 'Trainers','route' => 'trainer.member','activeRoute' => 'gym/trainer','icon' => 'flaticon-avatar'),
            array('name' => 'Suppliers','route' => 'supplier.member','activeRoute' => 'gym/supplier','icon' => 'flaticon-avatar'),
            array('name' => 'Treasuries','route' => 'treasury.member','activeRoute' => 'gym/treasury','icon' => 'flaticon2-avatar'),
            array('name' => 'Services','route' => 'service.member','activeRoute' => 'gym/service','icon' => 'flaticon2-avatar'),
            array('name' => 'Profile','route' => 'gym.profile','activeRoute' => 'admin/auth','icon' => 'flaticon-user'),
        );
        GymModule::insert($modules);
    }
}
