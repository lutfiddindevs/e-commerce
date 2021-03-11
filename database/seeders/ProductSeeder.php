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
              'name' => 'Oppo Mobile',
              'price' => '300',
              'category' => 'mobile',
              'description' => 'A smartphone with 8GB and much more features',
              'gallery' => 'https://images-na.ssl-images-amazon.com/images/I/51dcbt2%2B-JL._SL1000_.jpg'
           ],
           [
              'name' => 'Redmi Mobile',
              'price' => '150',
              'category' => 'mobile',
              'description' => 'A smartphone with 4GB and 48MPx camera',
              'gallery' => 'https://i01.appmifile.com/webfile/globalimg/in/cms/D7A7DA95-AEF8-228B-A2D2-A3FEBF237C33.jpg'
           ],
           [
              'name' => 'LG TV',
              'price' => '450',
              'category' => 'television',
              'description' => '1080 Full LedTv with smartTV',
              'gallery' => 'https://www.lg.com/us/images/tvs/lm9500/lg_tv_lm9500_gallery01.jpg'
           ],
           [
               'name' => 'LG Fridge',
               'price' => '350',
               'category' => 'fridge',
               'description' => 'A great production from LG',
               'gallery' => 'https://smarthomeguide.in/wp-content/uploads/2018/06/lg-dual-fridge1.jpg'
           ]
        ]);
    }
}
