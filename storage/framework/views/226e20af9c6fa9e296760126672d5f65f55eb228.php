


<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh">

    <!-- System title and logo -->
    <a href="<?php echo e(route('dashboard')); ?>" class="brand-link">
        <img src="<?php echo e(asset('public/images/pricon_logo2.png')); ?>"
            alt="OITL"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">

        <span class="brand-text font-weight-light font-size"><h5>JSOX System</h5></span>
    </a> <!-- System title and logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(url('../RapidX')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-arrow-left"></i>
                        <p>Return to RapidX</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                

                <li class="nav-header font-weight-bold">Administrator Management</li>
                <div class="nav-item has-treeview" id="user_management_id" style="display: none;">
                    <a href="<?php echo e(route('user_management')); ?>" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>User Manangment</p>
                    </a>
                </div>

                <li class="nav-header"></li>
                <div class="nav-item has-treeview" id="plc_dashboard_id" style="display: none;">
                    <a href="<?php echo e(route('plc_dashboard')); ?>" class="nav-link">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>PLC Dashboard</p>
                    </a>
                </div>

                <div class="nav-item has-treeview" id="plc_category_id" style="display: none;">
                    <a href="<?php echo e(route('plc_category')); ?>" class="nav-link">
                        
                        
                        <i class="nav-icon far fa-folder"></i>
                        <p>PLC Category</p>
                    </a>
                </div>

                <div class="nav-item has-treeview" id="plc_evidences_id" style="display: none;">
                    <a href="<?php echo e(route('plc_evidences')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>PLC Evidences</p>
                    </a>
                </div>

                <div class="nav-item has-treeview" id="jsoc_plc_matrix_id" style="display: none;">
                    <a href="<?php echo e(route('jsox_plc_matrix')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>Jsox PLC Matrix</p>
                    </a>
                </div>

                <li class="nav-header"></li>
                <div class="nav-item has-treeview" id="clc_dashboard_id" style="display: none;">
                    <a href="<?php echo e(route('clc_dashboard')); ?>" class="nav-link">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>CLC Dashboard</p>
                    </a>
                </div>

                <div class="nav-item has-treeview" id="clc_category_id" style="display: none;">
                    <a href="<?php echo e(route('clc_category')); ?>" class="nav-link">
                        <i class="nav-icon far fa-folder"></i>
                        <p>CLC Category</p>
                    </a>
                </li>


                <div class="nav-item has-treeview" id="clc_evidences_id" style="display: none;">
                    <a href="<?php echo e(route('clc_evidences')); ?>" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>CLC Evidences</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div><!-- Sidebar -->
</aside>
<?php /**PATH /var/www/Jsox/resources/views/shared/pages/admin_nav.blade.php ENDPATH**/ ?>