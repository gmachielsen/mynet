@extends('layouts.dashboard.app')

@section('content')
<h2>Movie</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Movie</li>
    </ol>
</nav>

<div class="tile mb-4">
    <div class="row">
        <div class="col-12">
            <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                        </div>
                    </div> <!-- end of the column -->
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i>Search</button>
                        @if(auth()->user()->hasPermission('create_roles'))
                            <a href="{{ route('dashboard.movies.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        @else 
                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                        @endif
                    </div>
                </div> <!-- end of the row -->
            </form> <!-- end of form -->
        </div> <!-- end of col 12 -->
    </div> <!-- end of row --> 
    <div class="row">
        <div class="col-md-12">
            @if($movies->count()>0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Users count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $index=>$movie)
                        <tr>
                            <td>{{ $index+1}}</td>
                            <td>{{ $movie->name }}</td>
                            <td>
                                @foreach ($movie->permissions as $permission)
                                    <h5 style="display: inline-block;"><span class="badge badge-primary">{{ $permission->name }}</span></h5>
                                @endforeach
                            </td>
                            <td>{{ $movie->users_count }}</td>
                            <td>
                                @if (auth()->user()->hasPermission('update_roles'))
                                    <a href="{{ route('dashboard.movies.edit', $movie->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                @else
                                    <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>  
                                @endif
                                @if(auth()->user()->hasPermission('delete_roles'))  
                                    <form method="POST" style="display: inline-block;" action="{{ route('dashboard.movies.destroy', $movie->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                    </form>
                                @else 
                                    <a href="#" disabled class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>
                                @endif
                                    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $movies->links() }}
            @else 
                <h3 style="font-weight: 400">Sorry no records found</h3>
            @endif
        </div>
    </div>
   
@endsection