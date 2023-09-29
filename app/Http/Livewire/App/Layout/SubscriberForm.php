<?php

namespace App\Http\Livewire\App\Layout;

use App\Models\NewsletterSubscriber;
use Livewire\Component;

class SubscriberForm extends Component
{
    public $email;

    public function subscribe()
    {
        $subscriber = NewsletterSubscriber::where('email', $this->email)->first();

        if ($subscriber) {
            return back()->with('warning', __('Congrats! You are already a subscriber.'));
        }

        NewsletterSubscriber::create([
            'email' => $this->email,
            'ipAddress' => request()->ip(),
        ]);

        return back()->with('success', __('Congrats! From now you will receive updates from us.'));
    }

    public function render()
    {
        return view('livewire.app.layout.subscriber-form');
    }
}
