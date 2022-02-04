<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $name=['John','Deo','Mark','Joy','Dan','Johnsen','Dany','Mac'];
        $real_state_type=['house', 'department', 'land', 'commercial_ground'];
        $city=['surat','delhi','mumbai','DC','CA','rajkot'];
        $country=['india','USA','Canada','China','Russia'];
        for($i=0;$i<=19;$i++){

            DB::table('property')->insert([
                'name' => $name[rand(0,7)],
                'real_state_type' => $real_state_type[rand(0,3)],
                'street' => rand(11,999)."th",
                'external_number' => rand(1111111111,9999999999),
                'Internal_number' => rand(1111111111,9999999999),
                'neighborhood' => Str::random(10),
                'city' => $city[rand(0,5)],
                'country' => $country[rand(0,4)],
                'rooms' => rand(1,99),
                'bathrooms' => rand(1,9),
                'comments' => Str::random(10),
            ]);
        }
    }
}
