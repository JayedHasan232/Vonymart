<?php

namespace App\Http\Livewire\Admin\Page;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\SiteInfo as Info;
use Illuminate\Support\Facades\Storage;

class SiteInfo extends Component
{
    use WithFileUploads;

    public $name, $mobile, $email, $google_map, $address, $facebook_page, $facebook_group, $twitter, $linkedin, $youtube, $logo, $favicon;

    public function mount()
    {
        $info = Info::find(1);

        $this->name = $info->name ?? '';
        $this->mobile = $info->mobile ?? '';
        $this->email = $info->email ?? '';
        $this->google_map = $info->google_map ?? '';
        $this->address = $info->address ?? '';
        $this->facebook_page = $info->facebook_page ?? '';
        $this->facebook_group = $info->facebook_group ?? '';
        $this->twitter = $info->twitter ?? '';
        $this->linkedin = $info->linkedin ?? '';
        $this->youtube = $info->youtube ?? '';
    }

    public function updateInfo()
    {
        $info = Info::find(1);

        if (!Info::find(1)) {
            Info::create([
                'name' => $this->name,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'google_map' => $this->google_map,
                'address' => $this->address,
                'facebook_page' => $this->facebook_page,
                'facebook_group' => $this->facebook_group,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
                'youtube' => $this->youtube,
                'created_by' => auth()->id(),
                'created_at' => now(),
            ]);
        } else {
            Info::find(1)->update([
                'name' => $this->name,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'google_map' => $this->google_map,
                'address' => $this->address,
                'facebook_page' => $this->facebook_page,
                'facebook_group' => $this->facebook_group,
                'twitter' => $this->twitter,
                'linkedin' => $this->linkedin,
                'youtube' => $this->youtube,
                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }


        if ($info) {
            if ($this->logo) {

                Storage::delete($info->logo);

                $info->logo = $this->logo->store('images/resources');
                $info->save();
            }

            if ($this->favicon) {

                Storage::delete($info->favicon);

                $info->favicon = $this->favicon->store('images/resources');
                $info->save();
            }
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.site-info')->extends('layouts.admin');
    }
}
