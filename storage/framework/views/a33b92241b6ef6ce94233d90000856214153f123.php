

<?php $__env->startSection('title', ' | Mailbox'); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            Mailbox

            <?php if($unreadMessages): ?>
                <small><?php echo e($unreadMessages); ?> new messages</small>
            <?php endif; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Mailbox</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">

            <?php echo $__env->make('includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="col-md-3">

                <?php if(user_can('compose_email')): ?>
                <a href="<?php echo e(url('admin/mailbox-create')); ?>" class="btn btn-primary btn-block margin-bottom">Compose</a>
                <?php endif; ?>

                <?php echo $__env->make('pages.mailbox.includes.folders_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo e(Request::segment(3)==""?"Inbox":Request::segment(3)); ?></h3>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <form method="GET" action="<?php echo e(url('/admin/mailbox/' . Request::segment(3))); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                                    <input type="text" class="form-control input-sm" name="search" value="<?php echo e(request('search')); ?>" placeholder="Search Mail">
                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>

                    <?php if(!$messages->isEmpty()): ?>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <?php echo $__env->make('pages.mailbox.includes.mailbox_controls', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>

                                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr data-mailbox-id="<?php echo e($message->id); ?>" data-mailbox-flag-id="<?php echo e($message->mailbox_flag_id); ?>" data-user-folder-id="<?php echo e($message->mailbox_folder_id); ?>">
                                            <td>
                                                <?php if(Request::segment(3) != 'Trash'): ?>
                                                    <input type="checkbox" value="1" data-mailbox-id="<?php echo e($message->id); ?>" data-mailbox-flag-id="<?php echo e($message->mailbox_flag_id); ?>" class="check-message">
                                                <?php endif; ?>
                                            </td>
                                            <?php if(Request::segment(3) != 'Trash'): ?>
                                                <td class="mailbox-star">
                                                    <a href="#"><i class="fa <?php echo e($message->is_important==1?'fa-star':'fa-star-o'); ?> text-yellow"></i></a>
                                                </td>
                                            <?php endif; ?>
                                            <td class="mailbox-name"><a href="<?php echo e(url('admin/mailbox-show/' . $message->id)); ?>"><?php echo e($message->sender->name); ?></a></td>
                                            <td class="mailbox-subject">
                                                <?php if($message->is_unread == 1): ?>
                                                    <b><?php echo e($message->subject); ?></b>
                                                <?php else: ?>
                                                    <?php echo e($message->subject); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td class="mailbox-attachment">
                                                <?php if($message->attachments->count() > 0): ?>
                                                    <i class="fa fa-paperclip"></i>
                                                <?php endif; ?>
                                            </td>
                                            <td class="mailbox-date"><?php if($message->time_sent): ?> <?php echo e(Carbon\Carbon::parse($message->time_sent)->diffForHumans()); ?> <?php else: ?> <?php echo e("not sent yet"); ?>  <?php endif; ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer no-padding">

                            <?php echo $__env->make('pages.mailbox.includes.mailbox_controls', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </div>
                    <?php else: ?>
                            <div class="box-body">
                                <p>No messages found</p>
                            </div>
                    <?php endif; ?>
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(asset('theme/views/mailbox/functions.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('theme/views/mailbox/index.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm_laravel\resources\views/pages/mailbox/index.blade.php ENDPATH**/ ?>