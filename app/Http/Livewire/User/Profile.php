<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Profile extends Component
{
    public $name;

    public $phone;

    public function mount()
    {
        $user = auth()->user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }

    public function save()
    {
        auth()->user()->update([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
