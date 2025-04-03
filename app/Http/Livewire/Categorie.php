<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Categorie extends Component
{
    public $name,$category_id; 
    
    public $isModalOpen = 0;
    public function render()
    {
        
        $this->category = Category::all();        
        return view('livewire.categories.index');
       
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function resetCreateForm()
    {
        $this->name = '';       
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
            'name'=>'required',
        ]);

        Category::updateOrCreate(['id'=> $this->category_id], [
            'name'=>$this->name,           
        ]);
        session()->flash('message', $this->category_id ? 'categories updated.' : 'categories created.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $id;
        $this->name = $category->name;        
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Category deleted.');
    }
}
