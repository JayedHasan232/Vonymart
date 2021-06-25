<?php

namespace App\Http\Livewire\Admin\Page\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Helpers\ImageResize as Image;
use App\Models\Slider;

class Create extends Component
{
    use WithFileUploads;

    public $privacy = 1;
    public $title;
    public $overview;
    public $link;
    public $link_title;
    public $image;

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required',
            'overview' => 'required',
            'image' => 'required|image',
        ]);

        $slider = Slider::create([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'overview' => $this->overview,
            'link' => $this->link,
            'link_title' => $this->link_title,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($slider && $this->image){
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
        return view('livewire.admin.page.slider.create')->extends('layouts.admin');
    }
}
