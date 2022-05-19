<?php

namespace App\Http\Livewire;

use App\Models\Asset;
use Livewire\Component;

class Assets extends Component
{
    // 'name', 'display_name',
    public $assets, $name, $display_name, $asset_id;
    public $updateMode = false;
    public function render()
    {
        $this->assets = Asset::all();
        return view('livewire.assets');
    }
    private function resetInputFields()
    {
        $this->name = '';
        $this->display_name = '';
    }
    public function store()
    {
        $validatedData = $this->validate([
            'display_name' => 'required',
        ]);
        $asset = [
            'display_name' => $this->display_name,
            'name' => str_replace(" ", "_", strtolower($this->display_name))
        ];
        Asset::create($asset);
        session()->flash('message', 'Assets Created Successfully.');

        $this->resetInputFields();

        $this->emit('assetStore');
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $asset = Asset::where('id', $id)->first();
        $this->asset_id = $id;
        $this->display_name = $asset->display_name;
        $this->name = $asset->name;
    }
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function update()
    {
        $validatedData = $this->validate([
            'display_name' => 'required',
        ]);

        if ($this->asset_id) {
            $asset = Asset::find($this->asset_id);
            $asset->update([
                'display_name' => $this->display_name,
                'name' => str_replace(" ", "_", strtolower($this->display_name))
            ]);
            $this->emit('assetUpdate');
            $this->updateMode = false;
            session()->flash('message', 'assets Updated Successfully.');
            $this->resetInputFields();
        }
    }
    public function delete($id)
    {
        if ($id) {
            Asset::where('id', $id)->delete();
            session()->flash('message', 'assets Deleted Successfully.');
        }
    }
}
