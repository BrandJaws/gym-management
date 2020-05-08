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
            array('name' => 'Membership', 'route' => 'membership.list', 'activeRoute' => 'gym/membership', 'icon' => 'flaticon-network'),
            array('name' => 'Employee', 'route' => 'employee.list', 'activeRoute' => 'gym/employee', 'icon' => 'flaticon-avatar'),
            array('name' => 'Members', 'route' => 'member.dashboard', 'activeRoute' => 'gym/member', 'icon' => 'flaticon-avatar'),
            array('name' => 'Trainers', 'route' => 'trainer.list', 'activeRoute' => 'gym/trainer', 'icon' => 'flaticon-presentation'),
            array('name' => 'Training', 'route' => 'training.list', 'activeRoute' => 'gym/training', 'icon' => 'flaticon-presentation-1'),
            array('name' => 'Suppliers', 'route' => 'supplier.list', 'activeRoute' => 'gym/supplier', 'icon' => 'flaticon-user-add'),
            array('name' => 'Treasuries', 'route' => 'treasury.list', 'activeRoute' => 'gym/treasury', 'icon' => 'flaticon-notes'),
            array('name' => 'Services', 'route' => 'service.list', 'activeRoute' => 'gym/service', 'icon' => 'flaticon-businesswoman'),
            array('name' => 'Profile', 'route' => 'gym.profile', 'activeRoute' => 'admin/auth', 'icon' => 'flaticon-user'),
            array('name' => 'Shop', 'route' => 'shop.list', 'activeRoute' => 'gym/shop', 'icon' => 'flaticon2-shopping-cart-1'),
            array('name' => 'Restaurant', 'route' => 'restaurant.list', 'activeRoute' => 'gym/restaurant', 'icon' => 'flaticon2-shopping-cart-1'),
        );
        GymModule::insert($modules);
    }
}
