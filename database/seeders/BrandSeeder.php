<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert([
            ['name' => 'Apple'],
            ['name' => 'Lenovo'],
            ['name' => 'Acer'],
            ['name' => 'Dell'],
            ['name' => 'Hp'],
            ['name' => 'Asus'],
            ['name' => 'MSI'],
        ]);
    }
}
