@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center">
                <h3 class="fw-bold">{{ $category->name }}</h3>
            </div>
        </div>
        <div class="row justify-content-center" id="tampung">

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var endpoint = '{{ $category->endpoint }}';
        $.get('https://api.themoviedb.org/3' + endpoint +
            '?api_key={{ env('API_KEY') }}',
            function(data) {
                var result = data.results;

                var detail = "{{ url('detail') }}";

                $.each(result, function(i, item) {
                    console.log(item);
                    $('#tampung').append(
                        '<div class="col-3 mb-3">' +
                        '<a href="' + detail + '/' + item.id + '" class="text-decoration-none">' +
                        '<div class="card h-100">' +
                        '<img src="https://image.tmdb.org/t/p/w500/' + item.poster_path +
                        '" class="card-img-top" alt="' + item.title + '">' +
                        '<div class="card-body">' +
                        '<h5 class="card-title text-center">' + item.title + '</h5>' +
                        '</div>' +
                        '</div>' +
                        '</a>' +
                        '</div>'
                    );
                });
            }).fail(function() {
            console.log('error');
        });
    </script>
@endsection
