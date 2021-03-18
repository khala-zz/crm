<?php $__env->startSection('title', ' | Calendar'); ?>

<?php $__env->startSection('styles'); ?>
    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?php echo e(url('theme/bower_components/fullcalendar/dist/fullcalendar.min.css')); ?>">
    <style>
        .external-event {
            cursor: pointer !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            Calendar
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/admin')); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Calendar</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h4 class="box-title">Tasks</h4>
                    </div>
                    <div class="box-body">
                        <!-- the events -->
                        <div id="external-events">
                            <?php if($countPending): ?>
                                <div class="external-event bg-light-blue">Pending tasks (<?php echo e($countPending); ?>)</div>
                            <?php endif; ?>

                            <?php if($countInProgress): ?>
                                <div class="external-event bg-yellow">In progress tasks (<?php echo e($countInProgress); ?>)</div>
                            <?php endif; ?>

                            <?php if($countFinished): ?>
                                <div class="external-event bg-green">Finished tasks (<?php echo e($countFinished); ?>)</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('pages.calendar.includes.event_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <!-- fullCalendar -->
    <script src="<?php echo e(url('theme/bower_components/moment/moment.js')); ?>"></script>
    <script src="<?php echo e(url('theme/bower_components/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>

    <?php echo $events_js_script ?>

    <script type="text/javascript" src="<?php echo e(url('theme/views/calendar/fullcalendar.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\crm_laravel\resources\views/pages/calendar/index.blade.php ENDPATH**/ ?>