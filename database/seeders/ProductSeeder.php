<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'Oppo mobile',
                'price'=>'300',
                'category'=>'mobile',
                'description'=>'A smartphone with 8 gb ram',
                'gallery'=>'https://unsplash.com/photos/l36pWK5GGZE',
            ],
            [
                'name'=>'panasonic Tv',
                'price'=>'400',
                'category'=>'TV',
                'description'=>'A smartTV with 4K video',
                'gallery'=>'https://unsplash.com/photos/CrPAvN29Nhs',
            ],
            [
                'name'=>'Soni TV',
                'price'=>'500',
                'category'=>'mobile',
                'description'=>'A smarttv with 4 gb ram and 4k video',
                'gallery'=>'https://unsplash.com/photos/CrPAvN29Nhs',
            ],
            [
                'name'=>'LG fridge',
                'price'=>'200',
                'category'=>'fridge',
                'description'=>'A cooler fridge',
                'gallery'=>'https://unsplash.com/photos/CrPAvN29Nhs',
            ],

        ]);
    }
}
