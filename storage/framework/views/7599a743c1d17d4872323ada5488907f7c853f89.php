<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Folders</h3>

        <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e(Request::segment(3)=='' && $folder->title=='Inbox'?'active':(Request::segment(3) == $folder->title?'active':'')); ?>"><a href="<?php echo e(url('admin/mailbox/' . $folder->title)); ?>"><i class="<?php echo e($folder->icon); ?>"></i> <?php echo e($folder->title); ?>

                        <?php if($folder->title=='Inbox' && $unreadMessages): ?><span class="label label-primary pull-right"><?php echo e($unreadMessages); ?></span> <?php endif; ?>
                     </a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <!-- /.box-body -->
</div><?php /**PATH C:\xampp\htdocs\crm_laravel\resources\views/pages/mailbox/includes/folders_panel.blade.php ENDPATH**/ ?>