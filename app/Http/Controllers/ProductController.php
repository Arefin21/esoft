<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller {
    public function AllProduct() {
        $products = Product::all();
        return view('backend.product.all_product', compact('products'));
    }

    public function AddProduct() {
        return view('backend.product.add_product');
    }

    public function storeProduct(Request $request) {
        $request->validate([
            'title'       => 'required',
            'image'       => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img = $img->resize(260, 280);
        $img->save(base_path('public/upload/product_images/' . $name_gen));

        Product::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => 'upload/product_images/' . $name_gen,
            'created_at'  => now(),
        ]);
        $notification = [
            'message'    => 'Product Inserted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.product')->with($notification);
    }

    public function EditProduct($id) {
        $products = Product::findOrFail($id);
        return view('backend.product.edit_product', compact('products'));
    }

    public function UpdateProduct(Request $request) {

        $products_id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(260, 280);
            $img->save(base_path('public/upload/product_images/' . $name_gen));

            Product::findOrFail($products_id)->update([

                'title'       => $request->title,
                'description' => $request->description,
                'image'       => 'upload/product_images/' . $name_gen,
                'created_at'  => now(),
            ]);
            $notification = [
                'message'    => 'Product Update Successfully With Image',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.product')->with($notification);

        } else {

            Product::findOrFail($products_id)->update([

                'title'       => $request->title,
                'description' => $request->description,
            ]);
            $notification = [
                'message'    => 'Product Update Successfully Without Image',
                'alert-type' => 'success',
            ];
            return redirect()->route('all.product')->with($notification);
        }
    }

    public function DeleteProduct($id) {

        $products_id = Product::findOrFail($id);
        $img = $products_id->image;
        unlink($img);

        Product::findOrFail($id)->delete();
        $notification = [
            'message'    => 'Product Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);

    }
}
