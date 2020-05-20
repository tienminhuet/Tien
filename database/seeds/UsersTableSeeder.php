<?php

use App\Models\Coordinate;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = '/database/seeds/user.json';
        $faker = Faker\Factory::create('vi_VN');
        $data = json_decode(file_get_contents(base_path($path)), true);
        foreach ($data as $dt) {
            User::create(array(
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('12345678'),
                'gender' => $dt['gender'],
                'occupations' => $dt['occupations'],
                'role' => $dt['role'],
                'home_address' => $dt['home_address'],
                'start_time' => $dt['start_time'],
                'smoking' => $dt['smoking']
            ));
        }
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('12345678'),
            'gender' => 0,
            'role' => 0,
            'super_user' => 1
        ]);
    }
}
