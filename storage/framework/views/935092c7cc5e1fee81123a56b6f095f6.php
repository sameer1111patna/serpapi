
<?php $__env->startSection('content'); ?>
<div class="container">
        <h1>Job Search</h1>
        <form action="<?php echo e(url('/jobs/list')); ?>" method="POST">
          <?php echo csrf_field(); ?>
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title" value="<?php echo e(old('title')); ?>" onkeyup="validateJobTitle()"placeholder="Enter job title">
            <span id="jobMessage">
            <?php if($errors->has('title')): ?>
            
                <?php $__currentLoopData = $errors->get('title'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-danger mt-2"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            <?php endif; ?>
            </span>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location"onkeyup="validatelocation()" placeholder="Enter location">
            <span id="locationMessage">
           
                <?php $__currentLoopData = $errors->get('location'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="alert alert-danger mt-2"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
            </span>
            <button type="submit"class="btn btn-success">Search</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\SERPAPI\resources\views/jobs/form.blade.php ENDPATH**/ ?>