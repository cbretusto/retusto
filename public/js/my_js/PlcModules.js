function AddRevisionHistory(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    };



	$.ajax({
        url: "add_revision_history",
        method: "post",
        data: $('#formAddRevision').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#BtnAddRevisionIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnAddRevision").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving User Failed!');

                if(response['error']['process_owner'] === undefined){
                    $("#txtProcessOwner").removeClass('is-invalid');
                    $("#txtProcessOwner").attr('title', '');
                }
                else{
                    $("#txtProcessOwner").addClass('is-invalid');
                    $("#txtProcessOwner").attr('title', response['error']['process_owner']);
                }

                if(response['error']['revision_date'] === undefined){
                    $("#txtRevisionDate").removeClass('is-invalid');
                    $("#txtRevisionDate").attr('title', '');
                }
                else{
                    $("#txtRevisionDate").addClass('is-invalid');
                    $("#txtRevisionDate").attr('title', response['error']['revision_date']);
                }

                if(response['error']['version_no'] === undefined){
                    $("#txtVersionNo").removeClass('is-invalid');
                    $("#txtVersionNo").attr('title', '');
                }
                else{
                    $("#txtVersionNo").addClass('is-invalid');
                    $("#txtVersionNo").attr('title', response['error']['version_no']);
                }

                if(response['error']['add_reason_for_revision'] === undefined){
                    $("#txtAddReasonForRevisionId").removeClass('is-invalid');
                    $("#txtAddReasonForRevisionId").attr('title', '');
                }
                else{
                    $("#txtAddReasonForRevisionId").addClass('is-invalid');
                    $("#txtAddReasonForRevisionId").attr('title', response['error']['add_reason_for_revision']);
                }

                if(response['error']['concerned_dept'] === undefined){
                    $("#txtConcernedDept").removeClass('is-invalid');
                    $("#txtConcernedDept").attr('title', '');
                }
                else{
                    $("#txtConcernedDept").addClass('is-invalid');
                    $("#txtConcernedDept").attr('title', response['error']['concerned_dept']);
                }

                if(response['error']['add_details_of_revision'] === undefined){
                    $("#txtAddDetailsOfRevision").removeClass('is-invalid');
                    $("#txtAddDetailsOfRevision").attr('title', '');
                }
                else{
                    $("#txtAddDetailsOfRevision").addClass('is-invalid');
                    $("#txtAddDetailsOfRevision").attr('title', response['error']['add_details_of_revision']);
                }

                if(response['error']['in_charge'] === undefined){
                    $("#txtProcessInCharge").removeClass('is-invalid');
                    $("#txtProcessInCharge").attr('title', '');
                }
                else{
                    $("#txtProcessInCharge").addClass('is-invalid');
                    $("#txtProcessInCharge").attr('title', response['error']['in_charge']);
                }

            }
            else if(response['result'] == 1){
                $("#modalAddRevision").modal('hide');
                $("#formAddRevision")[0].reset();
                toastr.success('Revision history was succesfully saved!');
                dataTablePlcModuleRevisionHistory.draw(); // reload the tables after insertion
            }

            $("#BtnAddRevisionIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddRevision").removeAttr('disabled');
            $("#BtnAddRevisionIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#BtnAddRevisionIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddRevision").removeAttr('disabled');
            $("#BtnAddRevisionIcon").addClass('fa fa-check');
        }
    });
}

function NoRevisionHistory(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    };

	$.ajax({
        url: "no_revision_history",
        method: "post",
        data: $('#formNoRevision').serialize(),
        dataType: "json",
        beforeSend: function(){
            // $("#BtnAddRevisionIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnAddRevision").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving User Failed!');

                if(response['error']['no_revision'] === undefined){
                    $("#txtNoRevisionId").removeClass('is-invalid');
                    $("#txtNoRevisionId").attr('title', '');
                }
                else{
                    $("#txtNoRevisionId").addClass('is-invalid');
                    $("#txtNoRevisionId").attr('title', response['error']['no_revision']);
                }

            }
            else if(response['result'] == 1){
                $("#modalNoRevision").modal('hide');
                $("#formNoRevision")[0].reset();
                toastr.success('Revision history was succesfully saved!');
                dataTablePlcModuleRevisionHistory.draw(); // reload the tables after insertion
            }

            // $("#btnAddRevisionIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnNoRevision").removeAttr('disabled');
            // $("#BtnAddRevisionIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            // $("#BtnAddRevisionIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnNoRevision").removeAttr('disabled');
            // $("#BtnAddRevisionIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT USER BY ID TO EDIT ==============================
function GetRevisionHistoryId(revisionHistoryId){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    };

    $.ajax({
        url: "get_revision_history_id_to_edit",
        method: "get",
        data: {
            revision_history_id: revisionHistoryId
        },
        dataType: "json",
        beforeSend: function(){
        },
        success: function(response){
            let history_revision = response['revision_history'];
            // let implodedReasonRev = response ['explodeReasonForRevision'];
            // let implodedDetailsRev = response ['explodeReasonForDetailsRevision']
            // let implodedReasonRevArr = [];
            // let implodedDetailsArr = [];
            // console.log(implodedDetailsRev);


            if(history_revision.length > 0){
            //     $('#txtMaxRowReasonIdForEdit').val(0).trigger('change');
            //     $('#dynamic_field_for_revision').find('.btn_remove_for_reason').closest('tr').remove();

               

            //     for (let index = 0; index < implodedReasonRev.length; index++) {
            //         implodedReasonRevArr.push(implodedReasonRev[index]);
            //     }
                
            //     let counter = 0;
            //     for (let reasonIndex = 0; reasonIndex < implodedReasonRevArr.length; reasonIndex++) {
            //         counter++;
                  
            //         var html  = '<tr class="col-md-12" style="text-align:center;" id="tr_for_reason_'+reasonIndex+'">'
            //             html += '	<td class ="col-md-1">'
            //             html += '		<button type="button" name="remove" id="'+reasonIndex+'" class="btn btn-danger btn_remove_for_reason" ><i class="fa fa-times"></i></button>'
            //             html += '	</td>'
            //             html += '	<td>'
            //             html += ' <input class="form-control" type="text" name="edit_revision_history_reason_'+reasonIndex+'" id="txtEditRevisionHistoryReason" autocomplete = "off">'
            //             html += '	</td>'

            //             html += '</tr>'
            //             $('#dynamic_field_for_revision').append(html);
            //             $('input[name="edit_revision_history_reason_'+reasonIndex+'"]', $('#editRevisionHistoryForm')).val(implodedReasonRevArr[reasonIndex]);
            //             $('#txtMaxRowReasonIdForEdit').val(counter);
                   
                       
            //     }
            //     console.log(counter);

            //     $('#txtMaxRowDetailsIdForEdit').val(0).trigger('change');
            //     $('#dynamic_field_for_details').find('.btn_remove_for_details').closest('tr').remove();
            //     for (let index1 = 0; index1 < implodedDetailsRev.length; index1++) {
            //         implodedDetailsArr.push(implodedDetailsRev[index1]);
            //     }
            //     for (let implodedArrLoop1 = 0; implodedArrLoop1 < implodedDetailsArr.length; implodedArrLoop1++) {
                    
            //         var html  = '<tr class="col-md-12" style="text-align:center;" id="tr_for_details_'+implodedArrLoop1+'">'
            //             html += '	<td class ="col-md-1">'
            //             html += '		<button type="button" name="remove" id="'+implodedArrLoop1+'" class="btn btn-danger btn_remove_for_details" ><i class="fa fa-times"></i></button>'
            //             html += '	</td>'
            //             html += '	<td>'
            //             html += ' <input class="form-control" type="text" name="edit_revision_history_details_'+implodedArrLoop1+'" id="txtEditRevisionHistoryDetails" autocomplete = "off">'
            //             html += '	</td>'

            //             html += '</tr>'
            //             $('#dynamic_field_for_details').append(html);
            //             $('input[name="edit_revision_history_details_'+implodedArrLoop1+'"]', $('#editRevisionHistoryForm')).val(implodedDetailsArr[implodedArrLoop1]);
            //             $('#txtMaxRowDetailsIdForEdit').val(implodedArrLoop1);
                        

            //     }

                $("#txtEditRevisionHistoryProcessOwner").val(history_revision[0].process_owner);
                $("#txtEditRevisionHistoryConcernedDept").val(history_revision[0].concerned_dept);
                $("#txtEditRevisionHistoryInCharge").val(history_revision[0].in_charge);
                $("#txteditReasonForRevision").val(history_revision[0].reason_for_revision);
                $("#txteditDetailsOfRevision").val(history_revision[0].details_of_revision);

                


            }
            else{
                toastr.warning('No Revision History Record Found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}



//============================== EDIT Revision History ==============================
function EditRevisionHistory(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    };

    $.ajax({
        url: "edit_revision_history",
        method: "post",
        data: $('#editRevisionHistoryForm').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnRevisionHistoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnEditRevisionHistory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Updating Revision History Failed!');

                // if(response['error']['employee_no'] === undefined){
                //     $("#txtEditPLCCategory").removeClass('is-invalid');
                //     $("#txtEditPLCCategory").attr('title', '');
                // }
                // else{
                //     $("#txtEditPLCCategory").addClass('is-invalid');
                //     $("#txtEditPLCCategory").attr('title', response['error']['employee_no']);
                // }

            }
            else if(response['result'] == 1){
                $("#modalEditRevisionHistory").modal('hide');
                $("#editRevisionHistoryForm")[0].reset();
                toastr.success('User was succesfully saved!');
                dataTablePlcModuleRevisionHistory.draw(); // reload the tables after insertion
            }

            $("#iBtnRevisionHistoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditRevisionHistory").removeAttr('disabled');
            $("#iBtnRevisionHistoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnRevisionHistoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditRevisionHistory").removeAttr('disabled');
            $("#iBtnRevisionHistoryIcon").addClass('fa fa-check');
        }
    });
}

function DeleteRevisionHistory() {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    };

    $.ajax({
        url: "delete_revision_history",
        method: "post",
        data: $('#deleteHistoryForm').serialize(),
        dataType: "json",
        beforeSend: function () {
            $("#deleteHistoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnDeleteHistory").prop('disabled', 'disabled');
        },
        success: function (response) {
            let result = response['result'];
            if (result == 1) {
                $("#modalDeleteHistory").modal('hide');
                $("#deleteHistoryForm")[0].reset();
                toastr.success('PLC Category successfully deleted!');
                dataTablePlcModuleRevisionHistory.draw();
            }
            else {
                toastr.warning('PLC Category already deleted!');
            }

            $("#deleteHistoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnDeleteHistory").removeAttr('disabled');
            $("#deleteHistoryIcon").addClass('fa fa-check');
        },
        error: function (data, xhr, status) {
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#deleteHistoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnDeleteHistory").removeAttr('disabled');
            $("#deleteHistoryIcon").addClass('fa fa-check');
        }
    });
}

function ActivateRevisionHistory() {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "3000",
        "timeOut": "3000",
        "extendedTimeOut": "3000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
    };

    $.ajax({
        url: "activate_revision_history",
        method: "post",
        data: $('#activateHistoryForm').serialize(),
        dataType: "json",
        beforeSend: function () {
            $("#activateHistoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnActivateHistory").prop('disabled', 'disabled');
        },
        success: function (response) {
            let result = response['result'];
            if (result == 1) {
                $("#modalActivateHistory").modal('hide');
                $("#activateHistoryForm")[0].reset();
                toastr.success('PLC Category successfully activated!');
                dataTablePlcModuleRevisionHistory.draw();
            }
            else {
                toastr.warning('PLC Category already deactivated!');
            }

            $("#activateHistoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnActivateHistory").removeAttr('disabled');
            $("#activateHistoryIcon").addClass('fa fa-check');
        },
        error: function (data, xhr, status) {
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#activateHistoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnActivateHistory").removeAttr('disabled');
            $("#activateHistoryIcon").addClass('fa fa-check');
        }
    });
}