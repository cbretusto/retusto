@php $layout = 'layouts.super_user_layout'; @endphp

@auth
    @php
    if (Auth::user()->user_level_id == 1) {
        $layout = 'layouts.super_user_layout';
    } elseif (Auth::user()->user_level_id == 2) {
        $layout = 'layouts.admin_layout';
    } elseif (Auth::user()->user_level_id == 3) {
        $layout = 'layouts.user_layout';
    }
    @endphp



    @extends($layout)
    @section('title', 'Dashboard')
@endauth
@section('content_page')

    @php
    if (Session::get('goto_id') == 1) {
        $title = 'PMI-01 Receiving Orders';
    } elseif (Session::get('goto_id') == 2) {
        $title = 'PMI-02 Shipment Preparation';
    } elseif (Session::get('goto_id') == 3) {
        $title = 'PMI-03 Changing Sales Prices';
    }

    @endphp


    <style type="text/css">
        table {
            color: black;
        }

        table.table tbody td {
            padding: 4px 4px;
            margin: 1px 1px;
            font-size: 16px;
            vertical-align: middle;
        }

        table.table thead th {
            padding-top: 5px;
            padding-bottom: 5px;
            padding-right: 5px;
            padding-left: 5px;
            font-size: 16px;
            text-align: center;
            white-space: nowrap;
            padding: 5px 5px;
            margin: 3px 3px;
        }

    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1>PMI-01 Receiving Orders</h1> --}}
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('plc_dashboard') }}">PLC Dashboard</a></li>
                            {{-- <li class="breadcrumb-item active">PMI-01 Receiving Orders</li> --}}
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <input type="hidden" name="session_name" value="{{ Session::get('goto_id') }}">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="SA-tab" data-toggle="tab" href="#SA-TabId" role="tab"
                                            aria-controls="SA-TabId" aria-selected="false">SA</a>
                                    </li>
                                </ul>

                                {{-- START --}}
                                <div class="tab-pane fade" id="SA-TabId" role="tabpanel" aria-labelledby="SA-tab">
                                    <div class="text-right mt-4">
                                        <button class="btn btn-primary" data-toggle="modal" id="btnShowAddSaModuleModal" data-target="#modalAddSaModule" style="float: right;"><i class="fa fa-plus fa-md"></i> Add SA Data</button>
                                    </div><br> <br>
                                    <div class="table-responsive">
                                        <table id="plcModulesSaDataTables" class="table table-sm table-bordered table-striped table-hover text-center" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="vertical-align: middle;text-align-center;">Control No.</th>
                                                    <th rowspan="2" style="vertical-align: middle;text-align-center;">Key <br> Control</th>
                                                    <th rowspan="2" style="vertical-align: middle;text-align-center;">IT <br> Control</th>
                                                    <th rowspan="2"style="vertical-align: middle;text-align-center; width: 20%">Internal Control</th>
                                                    <th colspan="2">1. Design and Implementation of Controls</th>
                                                    <th colspan="2">2. Operating Effectiveness of Controls</th>
                                                    <th colspan="3">3. Roll forward/Follow up</th>
                                                    <th rowspan="2" style="vertical-align: middle;text-align-center;">Action</th>
                                                </tr>
                                                <tr>
                                                    <th>Assessment details & Findings</th>
                                                    <th>Status</th>
                                                    <th>Assessment details & Findings</th>
                                                    <th>Status</th>
                                                    <th>Improvement plans</th>
                                                    <th>Assessment details & Findings</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>                                     
                                {{-- END --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

          <!-- {{-- ======================================================= SA MODULE ============================================================= --}} -->
    <div class="modal fade" id="modalAddSaModule">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title"><i class="fab fa-stack-overflow"></i> Add SA</h4>
                    <button type="button" style="color: #fff;" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="formAddSaModule" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group col-sm-3 flex-column d-flex"> 
                                    <input type="hidden" name="category_name" id="txtCategoryNameId"
                                        value="{{ Session::get('goto_id') }}">

                                    <label>Control No.</label>
                                    <input type="text" class="form-control" name="control_no" id="txtAddSaControlNo" autocomplete= "off">
                                </div>

                                <div class="form-group">
                                    <label>Key Control</label>
                                    <input type="text" class="form-control" name="key_control" id="txtAddSaKeyControl" autocomplete= "off">
                                </div>

                                <div class="form-group">
                                    <label>It Control</label>
                                    <input type="text" class="form-control" name="it_control" id="txtAddSaItControl" autocomplete= "off">
                                </div>

                                <div class="form-group">
                                    <label>Internal Control</label>
                                    <textarea type="text" class="form-control" name="internal_control" id="txtAddSaInternalControl" autocomplete= "off"></textarea>
                                </div>
                                
                                <!-- <div class="form-group">
                                    <input type="text" class="form-control" name="created_by" id="txtCreatedBy" readonly>
                                </div> -->
                                    
                                <div class="row">
                                    <div class="col-lg-12 mx-auto">            
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><strong>Design and Implementation of Controls</strong></h5> 
                                                <br>
                                                <div class="form-group">
                                                    <label>Assesment details & Findings</label>
                                                    <textarea type="text" class="form-control" name="dic_assessment" id="txtAddSaDicAssessment" autocomplete= "off"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status:</label>&nbsp;&nbsp;&nbsp;
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input radioBtn" type="radio"  name="dic_status" id="txtAddSaDicStatus" value="G">
                                                        <label class="form-check-label" for="inlineRadio1">Good</label>
                                                    </div>&nbsp;&nbsp;&nbsp;
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input radioBtn" type="radio"  name="dic_status" id="txtAddSaDicStatus" value="NG">
                                                        <label class="form-check-label" for="inlineRadio2">Not Good</label>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mx-auto">            
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><strong>Operating Effectiveness of Controls</strong></h5> 
                                                <br>
                                                <div class="form-group">
                                                    <label>Assesment details & Findings</label>
                                                    <textarea type="text" class="form-control" name="oec_assessment" id="txtAddSaOecAssessment" autocomplete= "off"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status:</label>&nbsp;&nbsp;&nbsp;
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input radioBtn" type="radio"  name="oec_status" id="txtAddSaOecStatus" value="G">
                                                        <label class="form-check-label" for="inlineRadio1">Good</label>
                                                    </div>&nbsp;&nbsp;&nbsp;
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input radioBtn" type="radio"  name="oec_status" id="txtAddSaOecStatus" value="NG">
                                                        <label class="form-check-label" for="inlineRadio2">Not Good</label>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mx-auto">            
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><strong>Roll forward / Follow up</strong></h5> 
                                                <br>
                                                <div class="form-group">
                                                    <label>Improvement plans</label>
                                                    <textarea type="text" class="form-control" name="rf_assessment" id="txtAddSaRfAssessment" autocomplete= "off"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Assesment details & Findings</label>
                                                    <textarea type="text" class="form-control" name="rf_improvement" id="txtAddSaRfImprovement" autocomplete= "off"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status:</label>&nbsp;&nbsp;&nbsp;
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input radioBtn" type="radio"  name="rf_status" id="txtAddSaRfStatus" value="G">
                                                        <label class="form-check-label" for="inlineRadio1">Good</label>
                                                    </div>&nbsp;&nbsp;&nbsp;
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input radioBtn" type="radio"  name="rf_status" id="txtAddSaRfStatus" value="NG">
                                                        <label class="form-check-label" for="inlineRadio2">Not Good</label>
                                                    </div>        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddSaModule" class="btn btn-primary"><i id="iBtnAddSaModuleIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- ADD MODAL END -->
@endsection

<!-- {{-- JS CONTENT --}} -->
@section('js_content')

    <script type="text/javascript">
        let dataTableClcCategoryPmiClc;

        $(document).ready(function () {
            
            bsCustomFileInput.init();
            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            $(document).on('click','#tblClcCategoryPmiClc tbody tr',function(e){
                $(this).closest('tbody').find('tr').removeClass('table-active');
                $(this).closest('tr').addClass('table-active');
            });

            // ========================= VIEW PLC MODULES SA DATATABLES ========================= 
            dataTablePlcModuleSa = $("#plcModulesSaDataTables").DataTable({
                "processing": false,
                "serverSide": true,
                "ajax": {
                    url: "view_plc_sa_data",
                    data: function(param) {
                        param.session = $("input[name='session_name']").val();
                    }
                },
                "columns": [
                    {"data": "control_no",          orderable: false},
                    { "data": "key_control",        orderable: false},
                    {"data": "it_control",          orderable: false},
                    {"data": "internal_control",    orderable: false},
                    { "data": "dic_assessment",     orderable: false},
                    {"data": "dic_status",          orderable: false},
                    {"data": "oec_assessment",      orderable: false},
                    {"data": "oec_status",          orderable: false},
                    {"data": "rf_improvement",      orderable: false},
                    {"data": "rf_assessment",       orderable: false},
                    {"data": "rf_status",           orderable: false},
                    {"data": "action",              orderable: false},
                ],
            }); //VIEW PLC MODULES SA DATATABLES END

            // ============================ AUTO ADD CREATED BY USER ============================
            $(document).on('click', '#btnShowAddSaModuleModal, .actionEditPmiClcCategory', function() {
                $.ajax({
                    url: "get_rapidx_user",
                    method: "get",
                    dataType: "json",
                    beforeSend: function(){    
                    },
                    success: function(response){
                        let result = response['get_user'];
                        console.log(result[0].name);
                        $('#txtCreatedBy').val(result[0].name);
                        $('#txtUpdatedBy').val(result[0].name);
                    },
                });
            });

            //============================ ADD SA MODULE ============================
            $("#formAddSaModule").submit(function(event){
                // $('#btnAddSaModule').on('click', function(event) {
                event.preventDefault(); // to stop the form submission
                AddSaModule();
                dataTablePlcModuleSa.draw(); // reload datatables asynchronously
            });
            // VALIDATION(errors)
            $("#txtAddSaControlNo").removeClass('is-invalid');
            $("#txtAddSaControlNo").attr('title', '');
            $("#txtAddSaKeyControl").removeClass('is-invalid');
            $("#txtAddSaKeyControl").attr('title', '');
            $("#txtAddSaItControl").removeClass('is-invalid');
            $("#txtAddSaItControl").attr('title', '');
            $("#txtAddSaInternalControl").removeClass('is-invalid');
            $("#txtAddSaInternalControl").attr('title', '');
            $("#txtAddSaDicAssessment").removeClass('is-invalid');
            $("#txtAddSaDicAssessment").attr('title', '');
            $("#txtAddSaDicStatus").removeClass('is-invalid');
            $("#txtAddSaDicStatus").attr('title', '');
            $("#txtAddSaOecAssessment").removeClass('is-invalid');
            $("#txtAddSaOecAssessment").attr('title', '');
            $("#txtAddSaOecStatus").removeClass('is-invalid');
            $("#txtAddSaOecStatus").attr('title', '');
            $("#txtAddSaRfImprovement").removeClass('is-invalid');
            $("#txtAddSaRfImprovement").attr('title', '');
            $("#txtAddSaRfAssessment").removeClass('is-invalid');
            $("#txtAddSaRfAssessment").attr('title', '');
            $("#txtAddSaRfStatus").removeClass('is-invalid');
            $("#txtAddSaRfStatus").attr('title', '');

        }); // JQUERY DOCUMENT READY END

    </script>
@endsection
