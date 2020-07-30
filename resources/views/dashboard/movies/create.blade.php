@extends('layouts.dashboard.app')

@section('content')
    <h2>Movie</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.movies.index')}}">Movie</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <div class="d-flex justify-content-center align-items-center flex-column" 
            style="height: 25vh; border: 1px solid black; cursor: pointer;"
            onclick="document.getElementById('movie__file-input').click()">
            <i class="fa fa-video-camera fa-2x"></i>
            <p>Click to upload</p>
        </div>
        <input type="file" name="" id="movie__file-input" style="display: none;">
        <form id="movie__properties" method="POST" action="{{ route('dashboard.movies.store')}}" style="display: none;">
            @csrf
            @method('post')

            @include('dashboard.partials._errors')

            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection