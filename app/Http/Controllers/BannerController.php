<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BannerController extends Controller {
    public function AllBanner() {

        $banner = Banner::latest()->get();

        return view('backend.banner.all_banner', compact('banner'));
    }

    public function AddBanner() {

        return view('backend.banner.add_banner');
    }

    public function StoreBanner(Request $request) {

        $request->validate([
            'banner_image' => 'required',
            'banner_title' => 'required',
        ]);

        $image = $request->file('banner_image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img = $img->resize(1600, 523);
        $img->save(base_path('public/upload/banner_images/' . $name_gen));

        Banner::create([

            'banner_title' => $request->banner_title,
            'banner_image' => 'upload/banner_images/' . $name_gen,
            'created_at'   => now(),
        ]);
        $notification = [
            'message'    => 'Banner Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.banner')->with($notification);

    }

    public function EditBanner($id) {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.edit_banner', compact('banner'));
    }

    public function UpdateBanner(Request $request) {

        $banner_id = $request->id;
        if ($request->file('banner_image')) {
            $image = $request->file('banner_image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(1600, 523);
            $img->save(base_path('public/upload/banner_images/' . $name_gen));

            Banner::findOrFail($banner_id)->update([

                'banner_title' => $request->banner_title,
                'banner_image' => 'upload/banner_images/' . $name_gen,
                'created_at'   => now(),
            ]);
            $notification = [
                'message'    => 'Banner Update Successfully With Image',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.banner')->with($notification);

        } else {

            Banner::findOrFail($banner_id)->update([

                'banner_title' => $request->banner_title,

            ]);
            $notification = [
                'message'    => 'Banner Update Successfully Without Image',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.banner')->with($notification);

        }

    }

    public function DeleteBanner($id) {

        $banner = Banner::findOrFail($id);
        $img = $banner->banner_image;
        unlink($img);

        Banner::findOrFail($id)->delete();
        $notification = [
            'message'    => 'Banner Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
