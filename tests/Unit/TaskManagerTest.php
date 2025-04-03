<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TaskManagerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    
    public function testCreateTask()
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

        $rowCategories = \DB::select("SELECT id from categories limit 1");

        $task = new Task();
        $task->title = 'Title task';
        $task->description = 'description task';
        $task->completed = true;
        $task->category_id = $rowCategories[0]->id;
        $task->created_at = date("Y-m-d H:i:s");
        $task->save();
        $this->addToAssertionCount(1);
    }



}
