<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_roles')->only(['index']);
        $this->middleware('permission:create_roles')->only(['create', 'store']);
        $this->middleware('permission:update_roles')->only(['edit', 'update']);
        $this->middleware('permission:delete_roles')->only(['destroy']);

    }

    public function index()
    {
        $movies = Movie::paginate(5);
        return view('dashboard.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('dashboard.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:movies,name',
            'permissions' => 'required|array|min:1',
        ]);

        $movie = Movie::create($request->all());
        $movie->attachPermissions($request->permissions);

        session()->flash('success', 'Data added successfully');
        return redirect()->route('dashboard.movies.index');
    }

    public function show()
    {

    }

    public function edit(Movie $movie)
    {
        return view('dashboard.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'name' => 'required|unique:movies,name,' . $movie->id,
            'permissions' => 'required|array|min:1',

        ]);

        $movie->update($request->all());
        $movie->syncPermissions($request->permissions);
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.movies.index');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.movies.index');
    }
}
