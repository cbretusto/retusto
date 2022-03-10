<?php
    session_start();
    $isLogin = false;
    if(isset($_SESSION['rapidx_user_id'])){
        $isLogin = true;
    }

    $isAuthorized = false;
    $user_level = 0;
?>

<?php if($isLogin): ?>
    <!--
         *These are the sessions in RapidX System(for reference only)
        
        $_SESSION["rapidx_user_id"] = Auth::user()->id;
        $_SESSION["rapidx_user_level_id"] = Auth::user()->user_level_id;
        $_SESSION["rapidx_username"] = Auth::user()->username;
        $_SESSION["rapidx_name"] = Auth::user()->name;
        $_SESSION["rapidx_department_id"] = Auth::user()->department_id;

        $user_accesses = UserAccess::on('mysql')->where('user_id', Auth::user()->id)
                        ->where('user_access_stat', 1)
                        ->get();

        $arr_user_accesses = [];
        for($index = 0; $index < count($user_accesses); $index++) {
            // $arr_user_accesses['module_id'] = $user_accesses[$index]->module_id;
            // $arr_user_accesses['user_level_id'] = $user_accesses[$index]->user_level_id;
            array_push($arr_user_accesses, array(
                'module_id' => $user_accesses[$index]->module_id,
                'user_level_id' => $user_accesses[$index]->user_level_id
            ));
        }

        $_SESSION["rapidx_user_accesses"] = $arr_user_accesses;
    -->

    <?php if($_SESSION['rapidx_user_level_id'] == 5): ?> <!-- 1-Super User, 2-Administrator, 3-User, 4-QAD Admin, 5-Other Section -->
        <?php if(count($_SESSION['rapidx_user_accesses']) > 0): ?> <!-- Count the rapidx_user_accesses session based on RapidX session -->
            <?php for($index = 0; $index < count($_SESSION['rapidx_user_accesses']); $index++): ?> <!-- Loop the rapidx_user_accesses session based on RapidX session -->
                <?php if($_SESSION['rapidx_user_accesses'][$index]['module_id'] == 11): ?> <!-- 11-Customer Claim Database System Module -->
                    <?php 
                        $isAuthorized = true; 
                        $user_level = $_SESSION['rapidx_user_accesses'][$index]['user_level_id']; // Collect the user_level_id
                    ?>
                    <?php break; ?>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if(!$isAuthorized): ?>
                <script type="text/javascript">
                    window.location = '../RapidX/';
                </script>
            <?php endif; ?>
        <?php else: ?>
            <script type="text/javascript">
                window.location = '../RapidX/';
            </script>
        <?php endif; ?>
    <?php endif; ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>JSOX | <?php echo $__env->yieldContent('title'); ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('public/images/favicon.ico')); ?>">

            <style>
                .modal-xl-custom{
                    width: 95% !important;
                    min-width: 90% !important;
                }
            </style>
            <!-- CSS LINKS -->
            <?php echo $__env->make('shared.css_links.css_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </head>
        <body class="hold-transition sidebar-mini">
            <input type="hidden" id="login_id" value="<?php echo $_SESSION['rapidx_user_id']; ?>">
            <input type="hidden" id="login_name" value="<?php echo $_SESSION["rapidx_name"]; ?>">
        
        
            <div class="wrapper">
                <?php echo $__env->make('shared.pages.admin_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('shared.pages.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->yieldContent('content_page'); ?>
                <?php echo $__env->make('shared.pages.admin_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <!-- JS LINKS -->
            <?php echo $__env->make('shared.js_links.js_links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('js_content'); ?>
        </body>
    
    <script>
        verifyUser();
        function verifyUser(){
            // var logName = $('#login_name').val();
            var logId = $('#login_id').val();
            console.log(logId);

            $.ajax({
                url: "get_user_log",
                method: "get",
                data: {
                    logId : logId
                },
                dataType: "json",
            
                success: function(response){
                    
                    if(response['result'].length == 0){
                        window.location.href = 'error';
                    }
                    else{
                        for(i = 0; i<response['result'].length;i++){
                            if(response['result'][i]['user_level_id'] == 1){
                                console.log('qweqw');
                                $('#user_management_id').css('display','block');
                                $('#plc_dashboard_id').css('display','block');
                                $('#plc_category_id-id1').css('display','block');
                                $('#plc_evidences_id').css('display','block');
                                $('#jsoc_plc_matrix_id').css('display','block');
                                $('#d-jsoc_plc_matrix_id').css('display','block');

                                $('#clc_dashboard_id').css('display','block');
                                $('#clc_category_id').css('display','block');
                                $('#clc_evidences_id').css('display','block');
                            }
                            if(response['result'][i]['user_level_id'] == 2){
                                $('#plc_dashboard_id').css('display','block');

                                $('#clc_dashboard_id').css('display','block');
                            }
                        }
                    } 
                }
            });
        }
    </script>
    </html>
    <?php else: ?>
    <script type="text/javascript">
        window.location = "/";
    </script>
<?php endif; ?>
<?php /**PATH /var/www/Jsox/resources/views/layouts/admin_layout.blade.php ENDPATH**/ ?>