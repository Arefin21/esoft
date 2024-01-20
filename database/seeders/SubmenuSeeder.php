<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder {

    public function run(): void {

        $submenus = [
            ['name' => 'HEAT TRANSFER LABELS', 'menu_id' => 3],
            ['name' => 'ALL KINDS OF GARMENTS LABEL', 'menu_id' => 3],
            ['name' => 'Hang Tag', 'menu_id' => 3],
            ['name' => 'OFFSET ITEMS', 'menu_id' => 3],
        ];

        DB::table('submenus')->insert($submenus);
    }
}
