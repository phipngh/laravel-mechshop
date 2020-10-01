<?php

use Illuminate\Database\Seeder;

class CatelogiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catelogies')->insert([
            ['id'=>1, 'name'=> 'Keyboard', ],
            ['id'=>2, 'name'=> 'Accessories', ],
            ['id'=>3, 'name'=> 'Keycap', ],
        ]);
    }
}
