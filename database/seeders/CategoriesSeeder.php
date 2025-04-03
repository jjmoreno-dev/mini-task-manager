<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();        
        DB::table('categories')->insert([
            [
            'name' => 'categories test one',
            'created_at' => date("Y-m-d H:i:s"),
            ],
            [
            'name' => 'categories test two',
            'created_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
