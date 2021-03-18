

<?php $__env->startSection('title', ' | List Contacts'); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            Contacts
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Contacts</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <?php echo $__env->make('includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if(user_can("create_contact")): ?>
                            <a href="<?php echo e(url('/admin/contacts/create')); ?>" class="btn btn-success btn-sm pull-right" title="Add New contact">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        <?php endif; ?>

                        <form method="GET" action="<?php echo e(url('/admin/contacts')); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php echo e(request('search')); ?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <?php if(\Auth::user()->is_admin == 1): ?>
                                        <th>#</th>
                                    <?php endif; ?>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Status</th>
                                    <?php if(\Auth::user()->is_admin == 1): ?>
                                        <th>Created by</th>
                                    <?php endif; ?>
                                    <th>Assigned to</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if(\Auth::user()->is_admin == 1): ?>
                                                <td><?php echo e($item->id); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e($item->first_name); ?></td>
                                            <td><?php echo e($item->middle_name); ?></td>
                                            <td><?php echo e($item->last_name); ?></td>
                                            <td><i class="btn bg-maroon"><?php echo e($item->getStatus->name); ?></i></td>
                                            <?php if(\Auth::user()->is_admin == 1): ?>
                                                <td><?php echo e($item->createdBy->name); ?></td>
                                            <?php endif; ?>
                                            <td><?php echo e($item->assignedTo != null ? $item->assignedTo->name : "not set"); ?></td>
                                            
                                            <td><?php echo e($item->created_at); ?></td>
                                            <td>

                                                <?php if(user_can('view_contact')): ?>
                                                    <a href="<?php echo e(url('/admin/contacts/' . $item->id)); ?>" title="View contact"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <?php endif; ?>

                                                <?php if(user_can('edit_contact')): ?>
                                                    <a href="<?php echo e(url('/admin/contacts/' . $item->id . '/edit')); ?>" title="Edit contact"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                <?php endif; ?>

                                                <?php if(user_can('assign_contact')): ?>
                                                    <a href="<?php echo e(url('/admin/contacts/' . $item->id . '/assign')); ?>" title="Assign contact"><button class="btn btn-primary btn-sm"><i class="fa fa-envelope-o" aria-hidden="true"></i> Assign</button></a>
                                                <?php endif; ?>

                                                <?php if(user_can('delete_contact')): ?>
                                                    <form method="POST" action="<?php echo e(url('/admin/contacts' . '/' . $item->id)); ?>" accept-charset="UTF-8" style="display:inline">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete contact" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $contacts->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm_laravel\resources\views/pages/contacts/index.blade.php ENDPATH**/ ?>