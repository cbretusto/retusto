<?php $layout = 'layouts.super_user_layout'; ?>

<?php if(auth()->guard()->check()): ?>
    <?php
        if(Auth::user()->user_level_id == 1){
            $layout = 'layouts.super_user_layout';
        }
        else if(Auth::user()->user_level_id == 2){
            $layout = 'layouts.admin_layout';
        }
        else if(Auth::user()->user_level_id == 3){
            $layout = 'layouts.user_layout';
        }
    ?>
<?php endif; ?>



<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_page'); ?>
    <div class="content-wrapper"  style="height: 666px; overflow: scroll;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-01 Receiving Orders</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>

                                    <a class="text-white" id="pmi_test1" status="1"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                    

                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-02 Shipment Preparation</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test2" status="2"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>

                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-03 Changing Sales Prices</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test3" status="3"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-04 Changing Sales Qty</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test4" status="4"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-05 Invoice Issuance</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test5" status="5"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-06 Changing Sales Invoice1</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test6" status="6"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-07 Changing Sales Invoice2</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test7" status="7"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>


                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-08 Verifying Monthly Data</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test8" status="8"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-09 Purchase Orders</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test9" status="9"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-10 PO Placement to CNPPS Suppliers</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test10" status="10"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-11 Changing POs for CNPPS Suppliers</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test11" status="11"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-12 Receiving Shipments from YEC</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test12" status="12"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-13 Generation of NG Reports</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test13" status="13"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-14 Handling Correct YEC Invoices</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test14" status="14"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-15 Handling Incorrect YEC Invoices</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test15" status="15"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-16 Vouchering</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test16" status="16"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-17 Check payment by Peso</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test17" status="17"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-18 E-Payment by Dollar</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test18" status="18"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-19 Billing</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test19" status="19"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-20 Offset Arrangement to YEC</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test20" status="20"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-21 Collection from YEC</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test21" status="21"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-22 Issuing Debit and Credit Memos</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test22" status="22"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-23 Posting Collections</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test23" status="23"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-24 Physical Count</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test24" status="24"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-25 Devaluation of Slow-moving</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test25" status="25"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-26 Returning Defect Materials to YEC</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test26" status="26"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-27 Receiving Shipment from CNPPS Suppliers</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test27" status="27"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-28 Physical Count-PPS</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test28" status="28"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-29 Handling Invoices from CNPPS Suppliers</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test29" status="29"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-30 Handling of Discrepancies (Invoice vs Actual Shipment) to CNPPS Suppliers</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test30" status="30"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-31 Inventory Evaluation</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test31" status="31"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-32 Correcting Monthly Data</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test32" status="32"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-33 Handling Discrepancies(Supplier Invoice vs Purchase Order) to CNPPS Suppliers</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test33" status="33"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-34 Sales from PPS to TS,CN</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test34" status="34"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">

                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-35 Daily Cash in Bank Monitoring</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test35" status="35"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="info-box bg-info">
                            <div class="info-box-content">
                                <div class="mb-3">
                                    <h2 class="card-title mb-0">PMI-36 Cash in Bank Monthly Monitoring</h2><br>
                                </div>
                            </div>
                                <div class="col-3 text-right"><br>
                                    <a class="text-white" id="pmi_test36" status="36"><i class="fa fa-3x fa-arrow-right bg-info"></i></a>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<!--      -->
<?php $__env->startSection('js_content'); ?>
    <script type="text/javascript">
            $(document).on('click', '#pmi_test1', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
            });
            $(document).on('click', '#pmi_test2', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
            });

            $(document).on('click', '#pmi_test3', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test4', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test5', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test6', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test7', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test8', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test9', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test10', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test11', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test12', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test13', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test14', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                $(document).on('click', '#pmi_test15', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test16', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test17', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test18', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test19', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test20', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test21', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test22', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test23', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test24', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test25', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test26', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test27', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test28', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test29', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test30', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test31', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test32', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test33', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test34', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test35', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });

                 $(document).on('click', '#pmi_test36', function(){

                // console.log('qwe');
                let useSession = $(this).attr('status'); // the status will collect the value (1-, 2-, 3-, 4-, 5-, 6- 7-)
                // let cash_AdvanceId = $(this).attr('cash_advance-id'); // the cash_advance-id(attr) is inside the datatables of UserController that will be use to collect the cash_advance-id
                // console.log(userApproverStat);
                use_session(useSession);
                // $("#approvedCashAdvanceUserStat").val(userApproverStat); // collect the user status id the default is 1, this will be use to change the user status when the formApproveCashAdvanceRemark(form) is submitted
                // $("#approvedCashAdvanceUserId").val(cash_AdvanceId); // after clicking the actionApproveRemark(button) the approvedCashAdvanceUserId will be pass to the approvedCashAdvanceUserId(input=hidden) and when the form is submitted this will be pass to ajax and collect cash_advance-id that will be use to query the cash_advance-id in the CashAdvanceController to update the status of the user
                });


            function use_session(useSession){

                $.ajax({
                    url: "go_to_plc_category_session",
                    method: "get",
                    data: {
                        useSession:useSession,
                    },
                    dataType: "json",
                    beforeSend: function(){
                        // $("#BtnAddRevisionIcon").addClass('fa fa-spinner fa-pulse');
                        // $("#btnAddRevision").prop('disabled', 'disabled');
                    },
                    success: function(response){
                        if(response['result'] == 1){
                            window.location.href = "pmi-01";
                        }
                    },

                });

            }


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Jsox/resources/views/PLC Dashboard/plc_dashboard.blade.php ENDPATH**/ ?>