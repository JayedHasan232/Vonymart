<?php

namespace App\Http\Livewire\App\Page;

use App\Mail\ContactMail;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $name, $email, $message;

    public function send()
    {
        $this->validate([
            'email'     => 'required',
            'name'      => 'required',
            'message'   => 'required',
        ]);

        try {
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message
            ];

            Mail::to(env('ADMIN_MAIL', 'info@amidmart.com'))->send(new ContactMail($data));

            $this->reset();
            return back()->with('success', __('Your query has been sent.'));
        } catch (Exception $e) {
            Log::debug('Contact Store', [$e]);
            return back()->with('danger', __('Server error'));
        }
    }

    public function render()
    {
        return view('livewire.app.page.contact')
            ->extends('layouts.app');
    }
}
