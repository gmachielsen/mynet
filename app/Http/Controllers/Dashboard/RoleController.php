<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whenSearch(request()->search)->paginate(5);
        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Category::create($request->all());
        session()->flash('success', 'Data added successfully');
        return redirect()->route('dashboard.roles.index');
    }

    public function show()
    {

    }

    public function edit(Category $category)
    {
        return view('dashboard.roles.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $category->id,
        ]);

        $category->update($request->all());
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.roles.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.roles.index');
    }
}
