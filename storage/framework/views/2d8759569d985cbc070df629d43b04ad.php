 
<?php $__env->startSection('title', 'Contact Us'); ?> 
<?php $__env->startSection('body'); ?>
<div class="row d-flex justify-content-center m-5">
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($contact->name); ?></td>
            <td><?php echo e($contact->email); ?></td>
            <td><?php echo e($contact->phone); ?></td>
            <td><?php echo e($contact->message); ?></td>
            <td>
                <form method="POST" action="/contact/delete/<?php echo e($index); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("template.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Ngoding\laravel\tsalisa-laravel\resources\views/contact-list.blade.php ENDPATH**/ ?>