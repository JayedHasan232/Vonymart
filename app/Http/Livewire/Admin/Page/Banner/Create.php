<?php

namespace App\Http\Livewire\Admin\Page\Banner;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Helpers\ImageResize as Image;
use App\Models\Banner;

class Create extends Component
{
    use WithFileUploads;

    public $privacy = 1;
    public $title;
    public $link;
    public $image;
    public $position;

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required',
            'image' => 'required|image',
            'position' => 'required',
        ]);

        $slider = Banner::create([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'link' => $this->link,
            'position' => $this->position,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if ($slider && $this->image) {
            $image = $this->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 767,
                    'height' => 233.31,
                ],
                'small' => (object) [
                    'width' => 414,
                    'height' => 125.93,
                ]
            ];
            $path = "slider";

            $result = Image::store($image, $dimension, $path);

            $slider->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,
            ]);
        }

        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.banner.create')->extends('layouts.admin');
    }
}
