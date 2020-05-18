<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            ['group' => 'Nhóm 1'],
            ['group' => 'Nhóm 2'],
            ['group' => 'Nhóm 3'],
            ['group' => 'Nhóm 4'],
            ['group' => 'Nhóm 5']
        ]);
    }
}
