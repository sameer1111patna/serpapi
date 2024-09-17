
<?php $__env->startSection('content'); ?>
<h1>Job Listings</h1>
<?php if($errorMessage): ?>
        <div style="color: red;">
            <strong>Error:</strong> <?php echo e($errorMessage); ?>

        </div>
<?php endif; ?>
<?php if(count($jobs['results']) > 0): ?>
<div class="col-2 mb-2 float-right">
        <form action="<?php echo e(route('jobs.export')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit"class="btn btn-success">Export to CSV</button>
        </form>
</div>
<table id="customers">
  <tr>
    <th>Job Tilte</th>
    <th>Company</th>
    <th>Location</th>
  </tr>
  <?php $__currentLoopData = $jobs['results']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td><?php echo e($job['title']); ?></td>
    <td><?php echo e($job['company_name']); ?></td>
    <td> <?php echo e($job['location']); ?></td>
  </tr>

    <!-- <li>No jobs found.</li> -->
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php else: ?>
        <p>No results found.</p>
  <?php endif; ?>


</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Dell\Desktop\SERPAPI\resources\views/jobs/index.blade.php ENDPATH**/ ?>