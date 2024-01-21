<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller {
    public function AllSubMenu() {
        $submenus = Submenu::with('menu')->get();
        return view('backend.subMenu.all_sub_menu', compact('submenus'));
    }

    public function AddSubMenu() {
        $menus = Menu::all();
        return view('backend.subMenu.add_sub_menu', compact('menus'));
    }

    public function storeSubMenu(Request $request) {
        $request->validate([
            'name'    => 'required',
            'menu_id' => 'required|exists:menus,id',
        ]);

        Submenu::create([
            'name'    => $request->name,
            'menu_id' => $request->menu_id,
        ]);

        $notification = [
            'message'    => 'SubMenu Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function editSubMenu($id) {
        $submenu = Submenu::findOrFail($id);
        $menus = Menu::all();
        return view('backend.subMenu.edit_sub_menu', compact('menus', 'submenu'));
    }

    public function updateSubMenu(Request $request) {
        $submenu_id = $request->id;
        $submenu = Submenu::findOrFail($submenu_id);
        $request->validate([
            'name'    => 'required',
            'menu_id' => 'required|exists:menus,id',
        ]);

        $submenu->update([
            'name'    => $request->name,
            'menu_id' => $request->menu_id,
        ]);

        $notification = [
            'message'    => 'SubMenu Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('all.subMenu')->with($notification);
    }

    public function DeleteSubMenu($id) {
        Submenu::findOrFail($id)->delete();
        $notification = [
            'message'    => 'SubMenu Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
