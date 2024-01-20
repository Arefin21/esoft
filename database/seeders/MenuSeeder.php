<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder {

    public function run(): void {
        $menus = [
            ['name' => 'Home'],
            ['name' => 'About Us'],
            ['name' => 'Products'],
            ['name' => 'Facilities'],
            ['name' => 'Photo Gallery'],
            ['name' => 'Certifications'],
            ['name' => 'Contact'],
        ];

        DB::table('menus')->insert($menus);
    }
}
