<?php

use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
           ['id'=>1,'name'=>'Leopold',],
           ['id'=>2,'name'=>'Filco',],
           ['id'=>3,'name'=>'Akko',],
        ]);
    }
}
