<?php echo $__env->make("template.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent("body"); ?>
<?php echo $__env->make("template.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\Ngoding\laravel\tsalisa-laravel\resources\views/template/main.blade.php ENDPATH**/ ?>