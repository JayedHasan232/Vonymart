<?php

namespace App\Http\Livewire\Admin\Page\Banner;

use App\Helpers\ImageResize as Image;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $banner;

    public $privacy;

    public $title;

    public $link;

    public $image;

    public $position;

    public function mount(Banner $banner)
    {
        $this->banner = $banner;

        $this->privacy = $this->banner->privacy;
        $this->title = $this->banner->title;
        $this->link = $this->banner->link;
        $this->position = $this->banner->position;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required',
            'position' => 'required',
        ]);

        $this->banner->update([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'link' => $this->link,
            'position' => $this->position,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if ($this->image) {
            Storage::delete($this->banner->image);
            Storage::delete($this->banner->image_medium);
            Storage::delete($this->banner->image_small);

            $image = $this->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 600,
                    'height' => 240,
                ],
                'small' => (object) [
                    'width' => 360,
                    'height' => 160,
                ],
            ];
            $path = 'banner';

            $result = Image::store($image, $dimension, $path);

            $this->banner->update([
                'image' => $result->image,
                'image_medium' => $result->image_medium,
                'image_small' => $result->image_small,
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.banner.edit')->extends('layouts.admin');
    }
}
