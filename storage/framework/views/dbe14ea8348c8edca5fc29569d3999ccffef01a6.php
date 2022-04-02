<?php $layout = 'layouts.super_user_layout'; ?>





<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_page'); ?>
<div class="content-wrapper">
<div class="container-fluid yes">
    <div>
        <img src="<?php echo e(asset('public/images/under construction.gif')); ?>" style="height:100vh; width:87vw;">
        
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<!--  -->
<?php $__env->startSection('js_content'); ?>
    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Jsox_testing/resources/views/dashboard.blade.php ENDPATH**/ ?>