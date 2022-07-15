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



<?php $__env->startSection('title', 'Blank Page'); ?>

<?php $__env->startSection('content_page'); ?>

    <style type="text/css">
        table{
            color: black;
        }

        table.table tbody td{
            vertical-align: middle;
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sample Matrix</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Reference</h3>
                            </div>
                            <div class="card-body">
                                <div style="float: right;">                   
                                    <button class="btn btn-info" data-toggle="modal" data-target="#modalAddJsoxPlcMatrix" id="btnShowAddJsoxPlcMatrixModal"><i class="fa fa-plus"></i>  Add Jsox Plc Matrix </button>
                                </div> <br><br>
                                <div class="table responsive">
                                    <table id="tblJsoxPlcMatrix" class="table table-sm table-bordered table-striped table-hover" style="width: 100%;">
                                        <thead>
                                            <tr style="text-align:center">
                                            <th>Process Name</th>
                                            <th>Control No.</th>
                                            <th>Documents</th>
                                            <th>Frequency</th>
                                            <th>No. of Samples</th>
                                            <th>In-Charge</th>
                                            <th>Status</th>
                                            <th style="width: 20%">Action</th>
                                            </tr>
                                        </thead>            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ADD MODAL START -->
            <div class="modal fade" id="modalAddJsoxPlcMatrix">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h4 class="modal-title"><i class="fab fa-stack-overflow"></i> JSOX PLC Matrix</h4>
                            <button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" id="formAddJsoxPlcMatrix">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 flex-column d-flex"> 
                                        <br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>Process Name: </strong></span>
                                            </div>
                                            <select class="form-control select2bs4 selectJsoxPlcMatrix"  id="selAddJsoxPlcMatrix" name="process_name" style="width: 70%;">
                                            <!-- Code generated -->    
                                        </div> 
                                    </div>

                                    <div class="form-group col-sm-12 flex-column d-flex"> 
                                        <div class="input-group">
                                            <input type="hidden" class="form-control">                                     
                                        </div>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control">                                     
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>Control No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span>
                                            </div>
                                            <input type="text" class="form-control" id="txtAddControlNo" name="control_no" autocomplete="off"> 
                                        </div> 
                                    </div>
                                    <div class="border-top border-bottom">
                                        <div class="col-sm-12 float-right" id="divAddDocument">
                                            <input type="hidden" name="document_number" id="addDocumentCounter" value="1">
                                            <button type="button" class="btn btn-sm btn-dark float-right mb-2 mt-1" id="addRowDocument"><i class="fa fa-plus"></i> Add Row</button>
                                            <button type="button" class="btn btn-sm btn-danger float-right mr-2 mb-2 mt-1 d-none" id="removeRowDocument"><i class="fas fa-times"></i> Remove Row</button>
                                        </div>
                                        <div class="form-group col-sm-12 flex-column d-flex" id="idDocumentDiv"> 
                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    -<span class="input-group-text ml-2" id="inputGroup-sizing-default"><strong>1. Document: &nbsp;&nbsp;&nbsp; </strong></span>
                                                </div>
                                                <input type="text" class="form-control" id="txtAddDocument_1" name="document_1" autocomplete="off"> 
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 flex-column d-flex mt-2"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>Frequency: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span>
                                            </div>
                                            <input type="text" class="form-control" id="txtAddFrequency" name="frequency" autocomplete="off"> 
                                        </div> 
                                    </div>

                                    <div class="form-group col-sm-12 flex-column d-flex"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>No. of Sample: </strong></span>
                                            </div>
                                            <input type="text" class="form-control" id="txtAddSamples" name="samples" autocomplete="off"> 
                                        </div>  
                                    </div>

                                    <div class="form-group col-sm-12 flex-column d-flex"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>In-Charge: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span>
                                            </div> 
                                            <input type="text" class="form-control" id="txtAddInCharge" name="in_charge" autocomplete="off"> 
                                        </div> 
                                        <input type="hidden" class="form-control" id="txtAddCreatedBy" name="created_by" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" id="btnAddJsoxPlcMatrix" class="btn btn-dark"><i id="iBtnAddJsoxPlcMatrixIcon" class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- ADD MODAL END -->

            <!-- EDIT MODAL START -->
            <div class="modal fade" id="modalEditJsoxPlcMatrix">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <h4 class="modal-title"><i class="fab fa-stack-overflow"></i> JSOX PLC Matrix</h4>
                            <button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" id="formEditJsoxPlcMatrix">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 flex-column d-flex"> 
                                        <input type="hidden" class="form-control" name="jsox_plc_matrix_id" id="txtEditJsoxPlcMatrixId"> 
                                        <br>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>Process Name: </strong></span>
                                            </div>
                                            <select class="form-control select2bs4 selectJsoxPlcMatrix"  id="selEditJsoxPlcMatrix" name="process_name" style="width: 70%;">
                                            <!-- Code generated -->    
                                        </div> 
                                    </div>

                                    <div class="form-group col-sm-12 flex-column d-flex"> 
                                        <div class="input-group">
                                            <input type="hidden" class="form-control">                                     
                                        </div>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control">                                     
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>Control No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span>
                                            </div>
                                            <input type="text" class="form-control" id="txtEditControlNo" name="control_no"> 
                                        </div> 
                                    </div>

                                    
                                    <div class="border-top border-bottom">
                                        <div class="col-sm-12 float-right" id="divAddDocumentEdit">
                                            <input type="hidden" name="document_number" id="addDocumentCounterEdit" value="1">
                                            <button type="button" class="btn btn-sm btn-dark float-right mb-2 mt-1" id="addRowDocumentEdit"><i class="fa fa-plus"></i> Add Row</button>
                                            <button type="button" class="btn btn-sm btn-danger float-right mr-2 mb-2 mt-1 d-none" id="removeRowDocumentEdit"><i class="fas fa-times"></i> Remove Row</button>
                                        </div>
                                        <div class="form-group col-sm-12 flex-column d-flex" id="idDocumentDivEdit"> 

                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    -<span class="input-group-text ml-2" id="inputGroup-sizing-default"><strong>1. Document: &nbsp;&nbsp;&nbsp; </strong></span>
                                                </div>
                                                <input type="text" class="form-control" id="txtEditDocument_1" name="document_1" autocomplete="off"> 
                                            </div> 
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-12 flex-column d-flex mt-2"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>Frequency: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span>
                                            </div>
                                            <input type="text" class="form-control" id="txtEditFrequency" name="frequency"> 
                                        </div> 
                                    </div>

                                    <div class="form-group col-sm-12 flex-column d-flex"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>No. of Sample: </strong></span>
                                            </div>
                                            <input type="text" class="form-control" id="txtEditSamples" name="samples"> 
                                        </div>  
                                    </div>

                                    <div class="form-group col-sm-12 flex-column d-flex"> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><strong>In-Charge: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span>
                                            </div> 
                                            <input type="text" class="form-control" id="txtEditInCharge" name="in_charge"> 
                                        </div> 
                                        <input type="hidden" class="form-control" id="txtUpdatedBy" name="updated_by" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" id="btnEditJsoxPlcMatrix" class="btn btn-dark"><i id="iBtnEditJsoxPlcMatrixIcon" class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- EDIT MODAL END -->

            <!-- CHANGE STAT MODAL START -->
            <div class="modal fade" id="modalChangeJsoxPlcMatrixStat">
                <div class="modal-dialog">
                    <div class="modal-content modal-sm">
                        <div class="modal-header bg-dark">
                            <h4 class="modal-title" id="h4ChangeJsoxPlcMatrixStat"><i class="fa fa-user"></i> Change Status</h4>
                            <button type="button" style="color: #fff" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" id="formChangeJsoxPlcMatrixStat">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <label id="lblChangeJsoxPlcMatrixStatLabel"></label>
                                <input type="hidden" name="jsox_plc_matrix_id" id="txtChangeJsoxPlcMatrixId">
                                <input type="hidden" name="status" id="txtChangeJsoxPlcMatrixStat">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                <button type="submit" id="btnChangeJsoxPlcMatrixStat" class="btn btn-dark"><i id="iBtnChangeJsoxPlcMatrixStatIcon" class="fa fa-check"></i> Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- CHANGE STAT MODAL END -->

        </section>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_content'); ?>
    <script type="text/javascript">
        let dataTableJsoxPlcMatrix;

        $(document).ready(function () {
            bsCustomFileInput.init();
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            $(document).on('click','#tblJsoxPlcMatrix tbody tr',function(e){
                $(this).closest('tbody').find('tr').removeClass('table-active');
                $(this).closest('tr').addClass('table-active');
            });

            // ======================= CLC CATEGORY  DATA TABLE =======================
            GetPlcCategory($(".selectJsoxPlcMatrix"));
        
            dataTableJsoxPlcMatrix = $("#tblJsoxPlcMatrix").DataTable({ 
                "processing" : false,
                "serverSide" : true,
                "ajax" : {
                    url: "view_jsox_plc_matrix",
                },

                "columns":[
                    { "data" : "process_name" },
                    { "data" : "control_no" },
                    // { "data" : "document" },
                    { "data" : "documentsxz" },
                    { "data" : "frequency" },
                    { "data" : "samples" },
                    { "data" : "in_charge" },
                    { "data" : "status" },
                    { "data" : "action", orderable:false, searchable:false }
                ],
            });// END OF DATATABLE

            // ============================ AUTO ADD CREATED BY USER ============================
            $(document).on('click', '#btnShowAddJsoxPlcMatrixModal, .actionEditClcEvidences', function() {
                $.ajax({
                    url: "get_rapidx_user",
                    method: "get",
                    dataType: "json",
                    beforeSend: function(){    
                    },
                    success: function(response){
                        let result = response['get_user'];
                        console.log(result[0].name);
                        $('#txtAddCreatedBy').val(result[0].name);
                        $('#txtUpdatedBy').val(result[0].name);
                    },
                });
            });

            //============================ ADD CLC CATEGORY ============================
            $("#formAddJsoxPlcMatrix").submit(function(event){
                event.preventDefault(); // to stop the form submission
                AddJsoxPlcMatrix();
                dataTableJsoxPlcMatrix.draw(); // reload datatables asynchronously
            });
            // VALIDATION(errors)
            $("#selAddJsoxPlcMatrix").removeClass('is-invalid');
            $("#selAddJsoxPlcMatrix").attr('title', '');
            $("#txtAddControlNo").removeClass('is-invalid');
            $("#txtAddControlNo").attr('title', '');
            $("#txtAddDocument").removeClass('is-invalid');
            $("#txtAddDocument").attr('title', '');
            $("#txtAddFrequency").removeClass('is-invalid');
            $("#txtAddFrequency").attr('title', '');
            $("#txtAddSamples").removeClass('is-invalid');
            $("#txtAddSamples").attr('title', '');
            $("#txtAddInCharge").removeClass('is-invalid');
            $("#txtAddInCharge").attr('title', '');

            //============================== EDIT REPORT ==============================
            // actionEditClcCategory is generated by datatables and open the modalEditClcCategory(modal) to collect the id of the specified rows
            $(document).on('click', '.actionEditJsoxPlcMatrix', function(){
                // the jsox_plc_matrix-id(attr) is inside the datatables of ClcCategoryController that will be use to collect the jsox_plc_matrix-id
                let JsoxPlcMatrixId = $(this).attr('jsox_plc_matrix-id'); 

                // after clicking the actionEditClcCategory(button) the JsoxPlcMatrixId will be pass to the txtEditClcCategoryId(input=hidden) and when the form is submitted this 
                // will be pass to ajax and collect jsox_plc_matrix-id that will be use to query the jsox_plc_matrix-id in the ClcCategoryController to update the report
                $("#txtEditJsoxPlcMatrixId").val(JsoxPlcMatrixId);

                // COLLECT THE file_recordId AND PASS TO INPUTS, BASED ON THE CLICKED ROWS //
                    //GetClcCategoryByIdToEdit() function is inside ClcCategory.js and pass the JsoxPlcMatrixId as an argument when passing the ajax that will be use to query 
                    // the jsox_plc_matrix-id of get_clc_category_by_id() method inside ClcCategoryController and pass the fetched report based on that query as $clc_category_id(variable) 
                    // to pass the values in the inputs of modalEditClcCategory and also to validate the fetched values, inside GetClcCategoryByIdToEdit under ClcCategory.js
                    GetJsoxPlcMatrixByIdToEdit(JsoxPlcMatrixId); 
            });
                // The EditClcCategory(); function is inside public/js/my_js/ClcCategory.js
                // after the submission, the ajax request will pass the formEditClcCategory(form) of its data(input) in the uri(edit_cls_category)
                // then the controller will handle that uri to use specific method called edit_cls_category() inside ClcCategoryController
            $("#formEditJsoxPlcMatrix").submit(function(event){
                event.preventDefault();
                EditJsoxPlcMatrix();
            });

             //============================== CHANGE USER STATUS ==============================
            // aChangeUserStat is generated by datatables and open the modalChangeClcCategoryStat(modal) to collect and change the id & status of the specified rows
            $(document).on('click', '.actionChangeJsoxPlcMatrixStat', function(){
                let jsoxplcmatrixStat = $(this).attr('status'); // the status will collect the value (1-active, 2-inactive)
                let jsoxplcmatrixId = $(this).attr('jsox_plc_matrix-id'); // the clc_categories-id(attr) is inside the datatables of UserController that will be use to collect the clc_categories-id
                // console.log(jsoxplcmatrixId);
                $("#txtChangeJsoxPlcMatrixStat").val(jsoxplcmatrixStat); // collect the user status id the default is 2, this will be use to change the user status when the formChangeClcCategoryStat(form) is submitted
                $("#txtChangeJsoxPlcMatrixId").val(jsoxplcmatrixId); // after clicking the aChangeUserStat(button) the clccategoryId will be pass to the clc_category_id(input=hidden) and when the form is submitted this will be pass to ajax and collect user-id that will be use to query the user-id in the UserController to update the status of the user

                if(jsoxplcmatrixStat == 1){
                    $("#lblChangeJsoxPlcMatrixStatLabel").text('Are you sure to activate?'); 
                    $("#h4ChangeJsoxPlcMatrixStat").html('<i class="fa fa-user"></i> Activate!');
                }
                else{
                    $("#lblChangeJsoxPlcMatrixStatLabel").text('Are you sure to deactivate?');
                    $("#h4ChangeJsoxPlcMatrixStat").html('<i class="fa fa-user"></i> Deactivate!');
                }
            });

            // ChangeClcCategoryStatus(); function is inside public/js/my_js/User.js
            // after the submission, the ajax request will pass the formChangeClcCategoryStat(form) of data(input) in the uri(change_clc_category_stat)
            // then the controller will handle that uri to use specific method called change_clc_category_stat() inside UserController
            $("#formChangeJsoxPlcMatrixStat").submit(function(event){
                event.preventDefault();
                ChangeJsoxPlcMatrixStatus();
            });

            //============================= ADD DOCUMENT MULTIPLE=============================
            let documentCounter = 1;
            $('#addRowDocument').on('click', function(){
                documentCounter++;
                if(documentCounter > 1){
                    $('#removeRowDocument').removeClass('d-none');
                }
                console.log('document Row(+):', documentCounter);
                let html;

                // html ='<div class="form-group col-sm-12">';
                    html ='<div class="input-group divDocumentHeader_'+documentCounter+'">';
                        html +='<div class="input-group-prepend ">';
                        html +='-<span class="input-group-text ml-2 mt-2" id="inputGroup-sizing-default"><strong>'+documentCounter+'. Document: &nbsp;&nbsp;&nbsp; </strong></span>';
                        html +='</div>';
                        html +=' <input type="text" class="form-control mt-2" id="txtAddDocument_'+documentCounter+'" name="document_'+documentCounter+'" autocomplete="off"> ';
                    html +='</div>';
                // html +='</div>';

                $('#addDocumentCounter').val(documentCounter);
                $('#idDocumentDiv').append(html);
            });
            

            //============================= REMOVE ADD DOCUMENT MULTIPLE=============================
            $("#divAddDocument").on('click', '#removeRowDocument', function(e){
                let plcCapaCapaAnalysis =  $('#removeRowDocument').val();

                if(documentCounter > 1){
                    $('.divDocumentHeader_'+documentCounter).remove();
                    // $('#cardCapaAnalysis').find('#row_'+documentCounter).remove();
                    documentCounter--;
                    $('#addDocumentCounter').val(documentCounter).trigger('change');
                    console.log('document Row(-):' + documentCounter);
                }

                if(documentCounter < 2){
                    $('#removeRowDocument').addClass('d-none');
                }
            });

            //============================= EDIT DOCUMENT MULTIPLE=============================
            let documentCounterEdit = 1;
            $('#addRowDocumentEdit').on('click', function(){
                documentCounterEdit++;
                if(documentCounterEdit > 1){
                    $('#removeRowDocumentEdit').removeClass('d-none');
                }
                console.log('document Edit Row(+):', documentCounterEdit);
                let html;

                // html ='<div class="form-group col-sm-12">';
                    html ='<div class="input-group divDocumentEditHeader_'+documentCounterEdit+'">';
                        html +='<div class="input-group-prepend ">';
                        html +='-<span class="input-group-text ml-2 mt-2" id="inputGroup-sizing-default"><strong>'+documentCounterEdit+'. Document: &nbsp;&nbsp;&nbsp; </strong></span>';
                        html +='</div>';
                        html +=' <input type="text" class="form-control mt-2" id="txtEditDocument_'+documentCounterEdit+'" name="document_'+documentCounterEdit+'" autocomplete="off"> ';
                    html +='</div>';
                // html +='</div>';
                        
                

                $('#addDocumentCounterEdit').val(documentCounterEdit);
                $('#idDocumentDivEdit').append(html);
            });

            //============================= REMOVE EDIT DOCUMENT MULTIPLE=============================
            $("#divAddDocumentEdit").on('click', '#removeRowDocumentEdit', function(e){
                let plcCapaCapaAnalysis =  $('#removeRowDocumentEdit').val();

                if(documentCounterEdit > 1){
                    $('.divDocumentEditHeader_'+documentCounterEdit).remove();
                    documentCounterEdit--;
                    $('#addDocumentCounterEdit').val(documentCounterEdit).trigger('change');
                    console.log('document Edit Row(-):' + documentCounterEdit);
                }

                if(documentCounterEdit < 2){
                    $('#removeRowDocumentEdit').addClass('d-none');
                }
            });


        }); // JQUERY DOCUMENT READY END
    </script>                  
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Jsox_test/resources/views/jsox_plc_matrix.blade.php ENDPATH**/ ?>