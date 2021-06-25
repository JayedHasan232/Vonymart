<?php

namespace App\Http\Livewire\Admin\Page\Slider;

use Livewire\Component;
use Livewire\WithFileUploads;

use Storage;
use App\Helpers\ImageResize as Image;
use App\Models\Slider;

class Edit extends Component
{
    use WithFileUploads;

    public $slider;

    public $privacy;
    public $title;
    public $overview;
    public $link;
    public $link_title;
    public $image;

    public function mount($id)
    {
        $this->slider = Slider::findOrFail($id);

        $this->privacy = $this->slider->privacy;
        $this->title = $this->slider->title;
        $this->overview = $this->slider->overview;
        $this->link = $this->slider->link;
        $this->link_title = $this->slider->link_title;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required',
            'overview' => 'required',
        ]);

        $this->slider->update([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'overview' => $this->overview,
            'link' => $this->link,
            'link_title' => $this->link_title,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){

            Storage::delete($this->item->image);
            Storage::delete($this->item->image_medium);
            Storage::delete($this->item->image_small);

            $image = $this->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 600,
                    'height' => 240,
                ],
                'small' => (object) [
                    'width' => 360,
                    'height' => 160,
                ]
            ];
            $path = "slider";

            $result = Image::store($image, $dimension, $path);

            $this->slider->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.slider.edit')->extends('layouts.admin');
    }
}
