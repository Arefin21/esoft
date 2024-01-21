<?php

namespace App\Http\Controllers;

use App\Models\WhatWeAreAbout;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class WhatWeAreAboutController extends Controller {
    public function AllAbout() {
        $abouts = WhatWeAreAbout::all();
        return view('backend.aboutSection.all_about', compact('abouts'));
    }

    public function AddAbout() {
        return view('backend.aboutSection.add_about');
    }

    public function storeAbout(Request $request) {
        $request->validate([
            'title'       => 'required',
            'image'       => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img = $img->resize(350, 210);
        $img->save(base_path('public/upload/about_images/' . $name_gen));

        WhatWeAreAbout::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => 'upload/about_images/' . $name_gen,
            'created_at'  => now(),
        ]);
        $notification = [
            'message'    => 'About Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.about')->with($notification);
    }

    public function EditAbout($id) {
        $abouts = WhatWeAreAbout::findOrFail($id);
        return view('backend.aboutSection.edit_about', compact('abouts'));
    }

    public function UpdateAbout(Request $request) {

        $abouts_id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(350, 210);
            $img->save(base_path('public/upload/about_images/' . $name_gen));

            WhatWeAreAbout::findOrFail($abouts_id)->update([

                'title'       => $request->title,
                'description' => $request->description,
                'image'       => 'upload/about_images/' . $name_gen,
                'created_at'  => now(),
            ]);
            $notification = [
                'message'    => 'About Update Successfully With Image',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.about')->with($notification);

        } else {

            WhatWeAreAbout::findOrFail($abouts_id)->update([

                'title'       => $request->title,
                'description' => $request->description,
            ]);
            $notification = [
                'message'    => 'About Update Successfully Without Image',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.about')->with($notification);
        }
    }

    public function DeleteAbout($id) {

        $abouts_id = WhatWeAreAbout::findOrFail($id);
        $img = $abouts_id->image;
        unlink($img);

        WhatWeAreAbout::findOrFail($id)->delete();
        $notification = [
            'message'    => 'About Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);

    }
}