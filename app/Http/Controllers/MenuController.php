<?php

namespace App\Http\Controllers;

use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::whereNull('parent_id')->with('children')->get();

        $menuTree = $this->buildMenuTree($menus);
        return view('menu.index', compact('menus', 'menuTree'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $menus = Menu::with('children')->whereNull('parent_id')->get();
        $menuTree = $this->buildMenuTree($menus);
        return view('menu.create', compact('menus','menuTree'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {

        Menu::create($request->validated());

        // Redirect back to the menu creation page
        return redirect(route('menu.create'))->with('success', 'Menu item created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $menus = Menu::get();
        $menuTree = $this->buildMenuTree($menus);
        return view('menu.edit', compact('menus', 'menu', 'menuTree'));
    }


    private function buildMenuTree($menus, $parentId = null, $prefix = '')
    {
        $tree = [];

        foreach ($menus as $menu) {
            if ($menu->parent_id == $parentId) {
                $menu->name = $prefix . $menu->name; // Prefix the name for display
                $tree[] = $menu;
                $children = $this->buildMenuTree($menus, $menu->id, $prefix . '---- '); // Recursively get children
                $tree = array_merge($tree, $children); // Merge children into the tree
            }
        }

        return $tree;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->validated());
        return to_route('menu.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {

        $menu->delete();

        return back();
    }
}
