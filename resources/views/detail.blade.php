@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center">
                <h3 class="fw-bold">Detail Movie</h3>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="https://image.tmdb.org/t/p/original/{{ $movie->poster_path }}"
                                    alt="{{ $movie->title }}" class="img-fluid" style="max-height:90% !important">
                            </div>
                            <div class="col-8">
                                <h3 class="fw-bold">{{ $movie->title }}</h3>
                                <p>{{ $movie->overview }}</p>
                                <p>
                                    <span class="fw-bold">Release Date:</span> {{ $movie->release_date }}
                                </p>
                                <p>
                                    <span class="fw-bold">Rating:</span> {{ $movie->vote_average }}
                                </p>
                                <p>
                                    <span class="fw-bold">Popularity:</span> {{ $movie->popularity }}
                                </p>
                                <p>
                                    <span class="fw-bold">Language:</span> {{ $movie->original_language }}
                                </p>
                                <p>
                                    <span class="fw-bold">Genre:</span>
                                    @foreach ($movie->genres as $genre)
                                        {{ $genre->name }}{{ $loop->last ? '' : ', ' }}
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
