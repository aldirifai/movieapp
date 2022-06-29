<?php $__env->startSection('content'); ?>
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
                                <img src="https://image.tmdb.org/t/p/original/<?php echo e($movie->poster_path); ?>"
                                    alt="<?php echo e($movie->title); ?>" class="img-fluid" style="max-height:90% !important">
                            </div>
                            <div class="col-8">
                                <h3 class="fw-bold"><?php echo e($movie->title); ?></h3>
                                <p><?php echo e($movie->overview); ?></p>
                                <p>
                                    <span class="fw-bold">Release Date:</span> <?php echo e($movie->release_date); ?>

                                </p>
                                <p>
                                    <span class="fw-bold">Rating:</span> <?php echo e($movie->vote_average); ?>

                                </p>
                                <p>
                                    <span class="fw-bold">Popularity:</span> <?php echo e($movie->popularity); ?>

                                </p>
                                <p>
                                    <span class="fw-bold">Language:</span> <?php echo e($movie->original_language); ?>

                                </p>
                                <p>
                                    <span class="fw-bold">Genre:</span>
                                    <?php $__currentLoopData = $movie->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($genre->name); ?><?php echo e($loop->last ? '' : ', '); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dev/Private/movieapp/resources/views/detail.blade.php ENDPATH**/ ?>