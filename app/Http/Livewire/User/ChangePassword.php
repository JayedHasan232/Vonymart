<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $current_password;

    public $new_password;

    public $password_confirmation;

    protected $rules = [
        'current_password' => ['required'],
        'new_password' => ['required', 'string', 'min:8'],
        'password_confirmation' => ['required', 'same:new_password'],
    ];

    public function save()
    {
        $this->validate();
        $user = auth()->user();

        if (Hash::check($this->current_password, $user->password)) {
            $user->update(['password' => Hash::make($this->new_password)]);

            $this->reset();

            return back()->with('success', 'Success!');
        }

        return back()->with('warning', 'Mismatched!');
    }

    public function render()
    {
        return view('livewire.user.change-password');
    }
}
