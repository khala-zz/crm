<?php $__env->startSection('title', ' | Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">

        <?php if(\Auth::user()->is_admin == 1): ?>
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <?php if(count(getContacts()) > 0): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo e(count(getContacts())); ?></h3>

                                <p>Contacts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo e(url('admin/contacts')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif; ?>

                <?php if(count(getContacts('Lead')) > 0): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo e(count(getContacts('Lead'))); ?></h3>

                                <p>Leads</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo e(url('admin/contacts?status_name=Lead')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif; ?>

                <?php if(count(getContacts('Opportunity')) > 0): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo e(count(getContacts('Opportunity'))); ?></h3>

                                <p>Opportunities</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?php echo e(url('admin/contacts?status_name=Opportunity')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif; ?>

                <?php if(count(getContacts('Customer')) > 0): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo e(count(getContacts('Customer'))); ?></h3>

                                <p>Potential Customers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo e(url('admin/contacts?status_name=Customer')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif; ?>
            </div>

            <div class="row">
                <section class="col-lg-12 connectedSortable ui-sortable">
                    <!-- TO DO List -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="ion ion-clipboard"></i>

                            <h3 class="box-title">My Team</h3>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Contacts</th>
                                        <th>Tasks</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = getUsers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($user->name); ?></td>
                                            <td><?php echo e($user->email); ?></td>
                                            <td><?php echo e($user->position_title); ?></td>
                                            <td><a href="<?php echo e(url('admin/contacts?assigned_user_id=' . $user->id)); ?>"><?php echo e($user->contacts->count()); ?></a></td>
                                            <td><a href="<?php echo e(url('admin/tasks?assigned_user_id=' . $user->id)); ?>"><?php echo e($user->tasks->count()); ?></a></td>
                                            <td><a href="<?php echo e(url('admin/users/' . $user->id)); ?>" data-toggle="tooltip" title="view details"><i class="fa fa-camera"></i></a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- /.box -->
                </section>
            </div>

        <?php else: ?>

            <div class="row">
                <?php if(user_can("list_contacts")): ?>

                    <?php if(\Auth::user()->contacts->count() > 0): ?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo e(\Auth::user()->contacts->count()); ?></h3>

                                    <p>My Contacts</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo e(url('admin/contacts')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    <?php endif; ?>

                    <?php if(\Auth::user()->leads->count() > 0): ?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?php echo e(\Auth::user()->leads->count()); ?></h3>

                                    <p>My Leads</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="<?php echo e(url('admin/contacts?status_name=Lead')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    <?php endif; ?>

                    <?php if(\Auth::user()->opportunities->count() > 0): ?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo e(\Auth::user()->opportunities->count()); ?></h3>

                                    <p>My Opportunities</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="<?php echo e(url('admin/contacts?status_name=Opportunity')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    <?php endif; ?>

                    <?php if(\Auth::user()->customers->count() > 0): ?>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?php echo e(\Auth::user()->customers->count()); ?></h3>

                                    <p>My Potential Customers</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="<?php echo e(url('admin/contacts?status_name=Customer')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    <?php endif; ?>

                <?php endif; ?>
            </div>

            <?php if(user_can("list_tasks")): ?>
                <div class="row">
                    <section class="col-lg-12 connectedSortable ui-sortable">
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="ion ion-clipboard"></i>

                                <h3 class="box-title">To do list</h3>

                            </div>

                            <div class="box-body">
                                <ul class="todo-list">
                                    <?php $__currentLoopData = \Auth::user()->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <span class="handle ui-sortable-handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
                                            <span class="text"><?php echo e($task->name); ?></span>


                                                <?php if($task->getStatus->name == 'Not Started'): ?>
                                                    <small class="label label-warning">not started</small>
                                                <?php elseif($task->getStatus->name == 'Started'): ?>
                                                    <small class="label label-info">started</small>
                                                <?php elseif($task->getStatus->name == 'Completed'): ?>
                                                    <small class="label label-success">completed</small>
                                                <?php else: ?>
                                                    <small class="label label-danger">cancelled</small>
                                                <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            <?php endif; ?>

        <?php endif; ?>

    </section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm_laravel\resources\views/pages/home/index.blade.php ENDPATH**/ ?>