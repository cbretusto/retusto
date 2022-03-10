@php 
$layout = 'layouts.super_user_layout'; 

@endphp

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
                                        <a class="nav-link active" id="SA-tab" data-toggle="tab" href="#SA-TabId" role="tab"
                                            aria-controls="SA-TabId" aria-selected="false">SA</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    
                                    <div class="tab-pane fade  show active" id="SA-TabId" role="tabpanel" aria-labelledby="SA-tab">
                                        <div class="text-right mt-4">
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#modalAddSaModule" style="float: right;"><i
                                                    class="fa fa-plus fa-md"></i> Add
                                                SA Data</button>
                                        </div><br> <br>

                                        <div class="table-responsive">
                                            <table id="plcModulesSaDataTables"
                                                class="table table-sm table-bordered table-striped table-hover text-center"
                                                style="width: 100%;">
                                                <thead>

                                                    <tr>
                                                        <th rowspan="2" style="vertical-align: middle;text-align-center;">
                                                            Control No.</th>
                                                        <th rowspan="2" style="vertical-align: middle;text-align-center;">
                                                            Key Control</th>
                                                        <th rowspan="2" style="vertical-align: middle;text-align-center;">IT
                                                            Control</th>
                                                        <th rowspan="2"
                                                            style="vertical-align: middle;text-align-center; width: 20%">
                                                            Internal Control</th>
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
                                                    {{-- <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>

                                                    </tr> --}}
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

{{-- ======================================================= SA MODULE ============================================================= --}}

    {{-- <!-- ADD RCM MODAL-->
    <div class="modal fade" id="modalAddSaModule">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fab fa-stack-overflow"></i> Upload Flow Chart</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddSaModule">
                    @csrf
                    <div class="modal-body">
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddSaModule" class="btn btn-primary"><i id="btnAddSaModuleIcon"
                                class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END ADD RCM MODAL--> --}}

       <!-- ADD REVISION -->
    <div class="modal fade" id="modalAddSaModule">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="far fa-edit"></i> Add Revision</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="formAddre" >
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" name="category_name" id="txtCategoryNameId"
                                    value="{{ Session::get('goto_id') }}">

                                <div class="form-group">
                                    <label>Process Owner</label>
                                    <input type="text" class="form-control" name="process_owner" id="txtProcessOwner"
                                        autocomplete="off">
                                </div>


                                <div class="form-group">
                                    <label>Revision Date</label>
                                    <input type="date" class="form-control" name="revision_date" id="txtRevisionDate">
                                </div>


                                <div class="form-group">
                                    <label>Version No.</label>
                                    <input type="number" class="form-control" name="version_no" id="txtVersionNo"
                                        autocomplete="off">
                                </div>

                                {{-- <div class="row">
                            <label>Reason for Revision</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-primary btn-sm"  name="add_reason" id="addReasonID">&nbsp;Add Reason</button>

                            <div class= "form-group col-md-12 mt-2" id="dynamic_field" value="0">
                                <input type="hidden" name="txt_max_row_reason" id="txtMaxRowReasonId" value="0">
                            </div>
                        </div> --}}

                                <div class="form-group">
                                    <label>Reason for Revision</label>
                                    {{-- <textarea  id="txtReasonForRevision" class="form-control" name="reason_for_revsiion" autocomplete="off"> --}}
                                    <textarea type="text" class="form-control" name="add_reason_for_revision"
                                        id="txtAddReasonForRevisionId"></textarea>
                                </div>



                                <div class="form-group">
                                    <label>Concerned Dept/Section</label>
                                    <input type="text" class="form-control" name="concerned_dept" id="txtConcernedDept"
                                        autocomplete="off">
                                </div>

                                {{-- <div class="row">
                            <label>Details of Revision</label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-primary btn-sm"  name="add_reason_details" id="addReasonDetailsID">&nbsp;Add Details</button>

                            <div class= "form-group col-md-12 mt-2" id="dynamic_field1" value="0">
                                <input type="hidden" name="txt_max_row_reason_details" id="txtMaxRowReasonDetailsId" value="0">
                            </div>
                        </div> --}}

                                <div class="form-group">
                                    <label>Details of Revision</label>
                                    {{-- <textarea  id="txtReasonForRevision" class="form-control" name="reason_for_revsiion" autocomplete="off"> --}}
                                    <textarea type="text" class="form-control" name="add_details_of_revision"
                                        id="txtAddDetailsOfRevision"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>In-Charge</label>
                                    <input type="text" class="form-control" name="in_charge" id="txtProcessInCharge"
                                        autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddRevision1" class="btn btn-primary"><i id="BtnAddRevisionIcon"
                                class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    



@endsection

@section('js_content')
    <script type="text/javascript">
    $(document).ready(function () {
        const d = new Date();
        let year = d.getFullYear();

        $('#txtNoRevisionId').val('No Revision for ' + year)

         //VIEW PLC MODULES SA DATATABLES
        dataTablePlcModuleSa = $("#plcModulesSaDataTables").DataTable({
            "processing": false,
            "serverSide": true,
            "responsive": true,
            // "scrollX": true,
            // "scrollX": "100%",
            "language": {
                "info": "Showing _START_ to _END_ of _TOTAL_ records",
                "lengthMenu": "Show _MENU_ records",
            },
            "ajax": {
                url: "view_plc_sa_data",
                // this will be pass in the uri called view_users_archive that handles datatables of view_users_archive() method inside UserController
                data: function(param) {
                    param.session = $("input[name='session_name']").val();
                }
            },
            "columns": [
                {
                    "data": "control_no",
                    orderable: false
                },
                {
                    "data": "key_control",
                    orderable: false
                },
                {
                    "data": "it_control",
                    orderable: false
                },
                {
                    "data": "internal_control",
                    orderable: false
                },
                {
                    "data": "dic_assessment",
                    orderable: false
                },
                {
                    "data": "dic_status",
                    orderable: false
                },
                {
                    "data": "oec_assessment",
                    orderable: false
                },
                {
                    "data": "oec_status",
                    orderable: false
                },
                {
                    "data": "rf_improvement",
                    orderable: false
                },
                {
                    "data": "rf_assessment",
                    orderable: false
                },
                {
                    "data": "rf_status",
                    orderable: false
                },
                {
                    "data": "action",
                    orderable: false
                },
            ],
        });

        $('#btnAddRevision1').on('click', function(e){
            e.preventDefault();
            // console.log($('#formAddre').serialize());
                // $.ajax({
                //     url: "add_plc_module_sa_data",
                //     method: "post",
                //     // processData: false,
                //     // contentType: false,
                //     data: {
                //         test : test,
                //     },
                //     dataType: "json",
                
                //     success: function(response){
                    
                //     },
                //     // error: function(data, xhr, status){
                //     //     toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                //     //     $("#btnAddSaModuleIcon").removeClass('fa fa-spinner fa-pulse');
                //     //     $("#btnAddSaModule").removeAttr('disabled');
                //     //     $("#btnAddSaModuleIcon").addClass('fa fa-check');
                //     // }
                // });
        });
    });

      
       
    </script>
@endsection
