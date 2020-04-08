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
            array('name' => 'Membership', 'route' => 'membership.list', 'activeRoute' => 'gym/membership', 'icon' => 'flaticon-users-1'),
            array('name' => 'Employee', 'route' => 'employee.list', 'activeRoute' => 'gym/employee', 'icon' => 'flaticon-users-1'),
            array('name' => 'Members', 'route' => 'member.dashboard', 'activeRoute' => 'gym/member', 'icon' => 'flaticon-users'),
            array('name' => 'Trainers', 'route' => 'trainer.list', 'activeRoute' => 'gym/trainer', 'icon' => 'flaticon-avatar'),
            array('name' => 'Training', 'route' => 'training.list', 'activeRoute' => 'gym/training', 'icon' => 'flaticon-avatar'),
            array('name' => 'Suppliers', 'route' => 'supplier.list', 'activeRoute' => 'gym/supplier', 'icon' => 'flaticon-avatar'),
            array('name' => 'Treasuries', 'route' => 'treasury.list', 'activeRoute' => 'gym/treasury', 'icon' => 'flaticon2-avatar'),
            array('name' => 'Services', 'route' => 'service.list', 'activeRoute' => 'gym/service', 'icon' => 'flaticon2-avatar'),
            array('name' => 'Profile', 'route' => 'gym.profile', 'activeRoute' => 'admin/auth', 'icon' => 'flaticon-user'),
        );
        GymModule::insert($modules);
    }
}
