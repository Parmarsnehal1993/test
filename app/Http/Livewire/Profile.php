<?php

namespace App\Http\Livewire;

use App\Models\Profile as ModelsProfile;
use Livewire\Component;

class Profile extends Component
{

    public $name;
    public $email;
    public function resetField()
    {
        $this->name = '';
        $this->email = '';
    }
    public function store()
    {
        $validateData = $this->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        ModelsProfile::create($validateData);

        session()->flash('message', 'data inserted');
        $this->resetField();
        $this->emit('Data');
    }
    public function render()
    {
        $profile = ModelsProfile::all();
        return view('livewire.profile', ['profile' => $profile]);
    }
}
