<?php

use App\Models\CarDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('car_details')->insert([
            ['user_id' => '4', 'license' => 'LC001', 'seat' => 7, 'color' => 'Đỏ', 'branch' => 'Vin Fast'],
            ['user_id' => '7', 'license' => 'LC002', 'seat' => 4, 'color' => 'Bạc', 'branch' => 'Bugatti'],
            ['user_id' => '14', 'license' => 'LC003', 'seat' => 7, 'color' => 'Xanh ánh kim', 'branch' => 'Lamborghini'],
            ['user_id' => '16', 'license' => 'LC004', 'seat' => 7, 'color' => 'Vàng ánh kim', 'branch' => 'Mitsubishi'],
            ['user_id' => '20', 'license' => 'LC005', 'seat' => 4, 'color' => 'Bạc', 'branch' => 'Honda']
        ]);
    }
}
