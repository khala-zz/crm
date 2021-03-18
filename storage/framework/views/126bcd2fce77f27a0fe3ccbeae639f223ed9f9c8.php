

<?php $__env->startSection('title', ' | Mailbox | Compose message'); ?>

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
            <li><a href="<?php echo e(url('/admin/mailbox')); ?>"> Mailbox</a></li>
            <li class="active">Compose</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <a href="<?php echo e(url('admin/mailbox')); ?>" class="btn btn-primary btn-block margin-bottom">Back to inbox</a>

                <?php echo $__env->make('pages.mailbox.includes.folders_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-9">
                <form method="post" action="<?php echo e(url('admin/mailbox-create')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Compose New Message</h3>
                        </div>

                        <?php if($errors->any()): ?>
                            <ul class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                    <?php endif; ?>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <?php $selected_receivers = old('receiver_id') ?>
                                <select name="receiver_id[]" id="receiver_id" multiple class="form-control">
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>" <?php echo e($selected_receivers!=null && in_array($user->id, $selected_receivers)?"selected":""); ?>><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="subject" placeholder="Subject:" value="<?php echo e(old("subject")!=null?old("subject"):""); ?>">
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" class="form-control" name="body" style="height: 300px">
                                    <?php echo e(old("body")!=null?old("body"):""); ?>

                                </textarea>
                            </div>
                            <div class="form-group">
                                <div class="btn btn-default btn-file">
                                    <i class="fa fa-paperclip"></i> Attachments
                                    <input type="file" name="attachments[]" multiple>
                                </div>
                                <p class="help-block">Max. <?php echo e((int)(ini_get('upload_max_filesize'))); ?>M</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="submit" name="submit" value="2" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                                <button type="submit" name="submit" value="1" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(function () {
            //Add text editor
            $("#compose-textarea").wysihtml5();

            $("#receiver_id").select2({placeholder: "To:"});
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm_laravel\resources\views/pages/mailbox/compose.blade.php ENDPATH**/ ?>