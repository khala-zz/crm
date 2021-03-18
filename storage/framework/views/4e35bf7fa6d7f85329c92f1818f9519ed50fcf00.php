

<?php $__env->startSection('title', ' | List users'); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <?php echo $__env->make('includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <a href="<?php echo e(url('/admin/users/create')); ?>" class="btn btn-success btn-sm pull-right" title="Add New user">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="<?php echo e(url('/admin/users')); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
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
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Position Title</th>
                                    <th>Is Admin</th>
                                    <th>Active / Banned</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item->id); ?></td>
                                            <td><?php echo e($item->name); ?></td>
                                            <td><?php echo e($item->email); ?></td>
                                            <td><?php echo e($item->position_title); ?></td>
                                            <td><?php echo $item->is_admin == 1? '<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>'; ?></td>
                                            <td><?php echo $item->is_active == 1? '<i class="fa fa-check"></i>':'<i class="fa fa-ban"></i>'; ?></td>
                                            <td><?php if(isset($item->roles[0])): ?> <span class="label label-success"><?php echo e($item->roles[0]->name); ?></span> <?php endif; ?></td>
                                            <td>
                                                <a href="<?php echo e(url('/admin/users/' . $item->id)); ?>" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="<?php echo e(url('/admin/users/' . $item->id . '/edit')); ?>" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                <a href="<?php echo e(url('/admin/users/role/' . $item->id)); ?>" title="Select role"><button class="btn bg-purple btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Select role</button></a>

                                                <?php if($item->is_admin == 0): ?>
                                                    <form method="POST" action="<?php echo e(url('/admin/users' . '/' . $item->id)); ?>" accept-charset="UTF-8" style="display:inline">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete user" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $users->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm_laravel\resources\views/pages/users/index.blade.php ENDPATH**/ ?>