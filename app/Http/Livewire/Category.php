<?php

namespace App\Http\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $categories, $name, $description, $category_id;
    protected $rules = [
        'name' => 'required',
        'description' => 'required'
    ];
    public function render()
    {
        $this->categories = ModelsCategory::select('id', 'name', 'description')->get();
        return view('livewire.category');
    }
    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
    }
    public function store()
    {
        $this->validate();
        try {
            ModelsCategory::create([
                'name' => $this->name,
                'description' => $this->description,
            ]);
            session()->flash('success', 'Category Created Successfully!!');
            $this->resetFields();
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while creating category!!');
            $this->resetFields();
        }
    }
    public function edit($id)
    {
        $category = ModelsCategory::findOrFail($id);
        $this->name = $category->name;
        $this->description = $category->description;
        $this->category_id = $category->id;
        $this->updateCategory = true;
    }

    public function cancel()
    {
        $this->updateCategory = false;
        $this->resetFields();
    }

    public function update()
    {

        // Validate request
        $this->validate();

        try {

            // Update category
            ModelsCategory::find($this->category_id)->fill([
                'name' => $this->name,
                'description' => $this->description
            ])->save();

            session()->flash('success', 'Category Updated Successfully!!');

            $this->cancel();
        } catch (\Exception $e) {
            session()->flash('error', 'Something goes wrong while updating category!!');
            $this->cancel();
        }
    }

    public function destroy($id)
    {
        try {
            ModelsCategory::find($id)->delete();
            session()->flash('success', "Category Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something goes wrong while deleting category!!");
        }
    }
}
