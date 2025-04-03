<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;

class TaskManager extends Component
{
    public $title, $description, $completed, $mobile, $task_id,$category_id; 
    
    public $isModalOpen = 0;
    public function render()
    {
        $this->task = Task::all();
        $this->category = Category::all();
        
        return view('livewire.index');
       
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function resetCreateForm()
    {
        $this->title = '';
        $this->description= '';
        $this->completed= '';
        $this->category_id= '';
       
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    public function store()
    {
        $this->validate([
            'title'=>'required',
            'completed'=>'required',
            'category_id'=>'required',
            
        ]);

        Task::updateOrCreate(['id'=> $this->task_id], [
            'title'=>$this->title,
            'description'=>$this->description,
            'completed'=>$this->completed,
            'category_id'=>$this->category_id,
           'created_at' => date("Y-m-d H:i:s"),
        ]);
        session()->flash('message', $this->task_id ? 'task updated.' : 'task created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->completed = $task->completed;
        $this->category_id = $task->category_id;

        $this->openModalPopover();
    }
    public function exportPDF()
    {
        $tasks = Task::all();
        $pdf = PDF::loadView('livewire.exportPDF', ['tasks' => $tasks]);
        return $pdf->download('task' . rand(1, 1000) . '.pdf');
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Task deleted.');
    }
}
