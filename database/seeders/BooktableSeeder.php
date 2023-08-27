<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BooktableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book')->insert(array(
            [
                
                'name' => 'คุณภาพชีวิต',
                'price' => 1000,
                'typebook_id' => 1,
                'stock_qty' => 1,
            ],
            
            [
                'name' => 'คุณแม่ร้องขอ',
                'price' => 2000,
                'typebook_id' => 2,
                'stock_qty' => 2,
            ],
            
            [
                'name' => 'เทคนิคเวทย์มนต์',
                'price' => 3000,
                'typebook_id' => 1,
                'stock_qty' => 3,
            ]
        ));
    }
}
