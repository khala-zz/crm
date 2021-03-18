<div class="row">
    <div class="col-md-6">
        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
            <label for="name" class="control-label"><?php echo e('Name'); ?></label>
            <input class="form-control" name="name" type="text" id="name" value="<?php echo e(isset($document->name) ? $document->name : ''); ?>">
            <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <?php if(isset($document->file) && !empty($document->file)): ?>
            <a href="<?php echo e(url('uploads/documents/' . $document->file)); ?>"><i class="fa fa-download"></i> <?php echo e($document->file); ?></a>
        <?php endif; ?>
        <div class="form-group <?php echo e($errors->has('file') ? 'has-error' : ''); ?>">
            <label for="file" class="control-label"><?php echo e('File'); ?></label>
            <input class="form-control" name="file" type="file" id="file">
            <?php echo $errors->first('file', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group <?php echo e($errors->has('status') ? 'has-error' : ''); ?>">
            <label for="status" class="control-label"><?php echo e('Status'); ?></label>
            <select name="status" id="status" class="form-control">
                <?php $__currentLoopData = array(1 => "active", 2 => "not active"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e(isset($document->status) && $document->status == $key?"selected":""); ?>><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo $errors->first('status', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo e($errors->has('type') ? 'has-error' : ''); ?>">
            <label for="type" class="control-label"><?php echo e('Type'); ?></label>
            <select name="type" id="type" class="form-control">
                <?php $__currentLoopData = $document_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($document_type->id); ?>" <?php echo e(isset($document->typ) && $document->type == $document_type->id?"selected":""); ?>><?php echo e($document_type->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <?php echo $errors->first('type', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group <?php echo e($errors->has('publish_date') ? 'has-error' : ''); ?>">
            <label for="publish_date" class="control-label"><?php echo e('Publish Date'); ?></label>
            <input class="form-control" name="publish_date" type="text" id="publish_date" value="<?php echo e(isset($document->publish_date) ? $document->publish_date : ''); ?>" >
            <?php echo $errors->first('publish_date', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?php echo e($errors->has('expiration_date') ? 'has-error' : ''); ?>">
            <label for="expiration_date" class="control-label"><?php echo e('Expiration Date'); ?></label>
            <input class="form-control" name="expiration_date" type="text" id="expiration_date" value="<?php echo e(isset($document->expiration_date) ? $document->expiration_date : ''); ?>" >
            <?php echo $errors->first('expiration_date', '<p class="help-block">:message</p>'); ?>

        </div>
    </div>
</div>

<?php if(\Auth::user()->is_admin == 1): ?>
<div class="form-group <?php echo e($errors->has('assigned_user_id') ? 'has-error' : ''); ?>">
    <label for="assigned_user_id" class="control-label"><?php echo e('Assigned User'); ?></label>
    <select name="assigned_user_id" id="assigned_user_id" class="form-control">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($user->id); ?>" <?php echo e(isset($document->assigned_user_id) && $document->assigned_user_id == $user->id?"selected":""); ?>><?php echo e($user->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <?php echo $errors->first('assigned_user_id', '<p class="help-block">:message</p>'); ?>

</div>
<?php endif; ?>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="<?php echo e($formMode === 'edit' ? 'Update' : 'Create'); ?>">
</div><?php /**PATH C:\xampp\htdocs\crm_laravel\resources\views/pages/documents/form.blade.php ENDPATH**/ ?>