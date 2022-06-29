<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row mb-3">
            <div class="col text-center">
                <h3 class="fw-bold">Discover Movie</h3>
            </div>
        </div>
        <div class="row justify-content-center" id="tampung">

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $.get('https://api.themoviedb.org/3/discover/movie?api_key=<?php echo e(env('API_KEY')); ?>&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1',
            function(data) {
                var result = data.results;
                var detail = "<?php echo e(url('detail')); ?>";

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dev/Private/movieapp/resources/views/homepage.blade.php ENDPATH**/ ?>