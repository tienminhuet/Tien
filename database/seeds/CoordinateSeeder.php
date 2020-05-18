<?php

use App\Models\Coordinate;
use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoordinateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = '/database/seeds/coordinates.json';
        $data = json_decode(file_get_contents(base_path($path)), true);
        foreach ($data as $dt) {
            Coordinate::create(array(
                'user_id' => $dt['user_id'],
                'latH' => $dt['latH'],
                'lngH' => $dt['lngH'],
            ));
        }
    }
}
