<?php

use Illuminate\Database\Seeder;
use App\Facilities;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facilities::truncate();
        $services = array(
            array('name' => 'AROMATHERAPY'),
            array('name' => 'BEAT'),
            array('name' => 'GYM WITH CRECHE'),
            array('name' => 'FITNESS FRIDAYS'),
            array('name' => 'FREE WEIGHTS'),
            array('name' => 'GROUP EXERCISE'),
            array('name' => 'IPAD BAR'),
            array('name' => 'MOVE STUDIO'),
            array('name' => 'PERSONAL TRAINING'),
            array('name' => 'RESISTANCE EQUIPMENT'),
            array('name' => 'SPA POOL'),
            array('name' => 'SQUASH COURTS'),
            array('name' => 'SUNBED'),
            array( 'name' => 'SWIMMING POOL'),
            array('name' => 'WIFI'),
            array('name' => 'CARDIO EQUIPMENT'),
            array('name' => 'ATHLETICS'),
            array( 'name' => 'BEAUTY ROOM'),
            array('name' => 'LOUNGE AREA'),
            array('name' => 'FREE PARKING'),
            array('name' => 'FUNCTIONAL AREA'),
            array('name' => 'HAIRDRESSING'),
            array('name' => 'IPOINT'),
            array('name' => 'MIND AND BODY STUDIO'),
            array('name' => 'PHYSIOTHERAPY'),
            array('name' => 'RELAXATION AREA'),
            array('name' => 'SAUNA'),
            array('name' => 'SPIN STUDIO'),
            array('name' => 'STEAM ROOM'),
            array('name' => 'SWIMMING LESSONS'),
            array( 'name' => 'TOWELS'),
            array( 'name' => 'X-LIFT AREA'),
            array('name' => 'COOL DOWN AIR SHOWERS'),
            array('name' => 'DM SPORTS STORE ON-SITE'),
            array('name' => 'OUTDOOR GROUP EXERCISE'),
            array('name' => 'OLYMPIC RINGS / PULL UP BAR'),

        );
        Facilities::insert($services);
    }
}
