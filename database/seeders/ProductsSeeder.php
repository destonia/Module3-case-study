<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert([
            'name' => 'Dev Care',
            'description' => 'Dev Care Nourishing Face Cream, Packaging Size: Glass Bottle',
            'photo' => 'https://4.imimg.com/data4/MJ/EN/MY-4313393/nourishing-face-cream-500x500.jpg',
            'price' => 88
        ]);

        DB::table('products')->insert([
            'name' => 'Organic Face Cream',
            'description' => 'For Third party or Private Label',
            'photo' => 'https://5.imimg.com/data5/LW/MR/MY-43870616/organic-face-cream-500x500.jpg',
            'price' => 75
        ]);

        DB::table('products')->insert([
            'name' => 'Oxygenating Cream',
            'description' => 'It earned near perfect points for effectively cleansing: 96% of users reported that it deeply purified their skin',
            'photo' => 'https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1603131224-41297.jpg?crop=0.668xw:1.00xh;0,0.00160xh&resize=768:*',
            'price' => 80
        ]);

        DB::table('products')->insert([
            'name' => 'Differin Gel Acne Treatment',
            'description' => 'Acne Treatment Differin Gel, Acne Spot Treatment for Face with Adapalene, 15g, 30 Day Supply, 0.5 Ounce',
            'photo' => 'https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1603131448-61jog-dpsgl-sl1000-1603131436.jpg?crop=0.6666666666666666xw:1xh;center,top&resize=768:*',
            'price' => 12
        ]);

    }
}
