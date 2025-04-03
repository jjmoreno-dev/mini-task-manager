<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rowCategories = \DB::select("SELECT id from categories limit 1");
       
        DB::table('tasks')->truncate();
        DB::table('tasks')->insert([
            [
                'title' => 'title test one',
                'description' => 'description test one',
                'completed' => true,
                'category_id' => $rowCategories[0]->id,
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => 'title test two',
                'description' => 'description test two',
                'completed' => false,
                'category_id' => $rowCategories[0]->id,
                'created_at' => date("Y-m-d H:i:s"),
            ],
        ]);
       
    }
}
