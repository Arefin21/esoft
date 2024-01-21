<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller {
    public function AllMenu() {
        $menus = Menu::all();
        return view('backend.menu.all_menu', compact('menus'));
    }

    public function AddMenu() {
        return view('backend.menu.add_menu');
    }

    public function storeMenu(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Menu::create([
            'name' => $request->name,
        ]);

        $notification = [
            'message'    => 'Menu Stored Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function editMenu($id) {
        $menu = Menu::findOrFail($id);
        return view('backend.menu.add_menu', compact('menu'));
    }

    public function updateMenu(Request $request) {
        $menu_id = $request->id;
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $menu_id->update([
            'name' => $request->name,
        ]);

        $notification = [
            'message'    => 'Menu Update Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function deleteMenu($id) {

        Menu::findOrFail($id)->delete();
        $notification = [
            'message'    => 'Menu Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
