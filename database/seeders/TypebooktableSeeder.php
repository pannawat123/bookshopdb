<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypebooktableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typebook')->insert(array(
            [
                'name' => 'การ์ตูน',
            ],
            
            [
                'name' => 'นวนิยาย',
            ],
            
            [
                'name' => 'แฟนตาซี',
            ]
        ));
    }
}
