// ============================== DELETE SA DATA ==============================
function DeleteSaData(){
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
        url: "delete_sa_data",
        method: "post",
        data: $('#deleteSaForm').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnDeleteSaDataIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnDeleteSaData").prop('disabled', 'disabled');
        },
        success: function(response){
            let result = response['result'];
            if(result == 1){
                $("#modalDeleteSaData").modal('hide');
                $("#deleteSaForm")[0].reset();
                toastr.success('SA Data successfully deleted');
                dataTablePlcModuleSa.draw();
            }
            else{
                toastr.warning('No SA Data found!');
            }

            $("#iBtnDeleteSaDataIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnDeleteSaData").removeAttr('disabled');
            $("#iBtnDeleteSaDataIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnDeleteSaDataIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnDeleteSaData").removeAttr('disabled');
            $("#iBtnDeleteSaDataIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT USER BY ID TO EDIT ==============================
function GetSaData(saDataId){
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
        url: "get_sa_data_to_edit",
        method: "get",
        data: {
            sa_data_id: saDataId
        },
        dataType: "json",
        beforeSend: function(){
        },
        success: function(response){
            let sa_data = response['sa_data'];
            if(sa_data.length > 0){
                if(sa_data[0].key_control == 'X'){
                    $("#txtEditSaKeyControl").prop("checked",true);
                    $("#txtEditSaNonKeyControl").prop("disabled",true);
                    $("#txtEditSaItControl").prop("disabled",true);
                }else{
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("checked",false);
                    $("#txtEditSaItControl").prop("disabled",true);
                }

                if(sa_data[0].it_control == 'X'){
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("disabled",true);
                    $("#txtEditSaItControl").prop("checked",true);
                }else{
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("checked",false);
                    $("#txtEditSaItControl").prop("disabled",true);
                }

                if(sa_data[0].non_key_control == 'X'){
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("checked",true);
                    $("#txtEditSaItControl").prop("disabled",true);
                }else{
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("checked",false);
                    $("#txtEditSaItControl").prop("disabled",true);
                }

                if(sa_data[0].dic_status == 'G'){
                    $("#txtEditSaDicGStatus").prop("checked",true);
                }else if (sa_data[0].dic_status == 'NG'){
                    $("#txtEditSaDicNGStatus").prop("checked",true);
                }else if (sa_data[0].dic_status == 'No Sample'){
                    $("#txtEditSaDicNoSample").prop("checked",true);
                }

                if(sa_data[0].oec_status == 'G'){
                    $("#txtEditSaOecGStatus").prop("checked",true);
                }else if (sa_data[0].oec_status == 'NG'){
                    $("#txtEditSaOecNGStatus").prop("checked",true);
                }else if (sa_data[0].oec_status == 'No Sample'){
                    $("#txtEditSaOecNoSample").prop("checked",true);
                }

                if(sa_data[0].rf_status == 'G'){
                    $("#txtEditSaRfGStatus").prop("checked",true);
                }else if (sa_data[0].rf_status == 'NG'){
                    $("#txtEditSaRfNGStatus").prop("checked",true);
                }else if (sa_data[0].rf_status == 'No Sample'){
                    $("#txtEditSaRfNoSample").prop("checked",true);
                }
                if(sa_data[0].fu_status == 'G'){
                    $("#txtEditSaFuGStatus").prop("checked",true);
                }else if (sa_data[0].fu_status == 'NG'){
                    $("#txtEditSaFuNGStatus").prop("checked",true);
                }else if (sa_data[0].fu_status == 'No Sample'){
                    $("#txtEditSaNoFuSample").prop("checked",true);
                }

                $("#selectAddRapidxUser").val(sa_data[0].assessed_by).trigger('change');
                $("#selectEditDepartment").val(sa_data[0].concerned_dept).trigger('change');
                $("#txtEditSaControlNo").val(sa_data[0].control_no);
                $("#txtEditSaInternalControl").val(sa_data[0].internal_control);
                $("#txtEditSaDicAssessment").val(sa_data[0].dic_assessment);

                // DIC
                $("#txtDicAttachment").val(sa_data[0].dic_attachment);
                if($('#txtDicAttachment').val() != ''){
                    $("#DicAttachment").addClass('d-none');
                    $("#txtDicAttachment").removeClass('d-none');
                    $("#DicCheckBox").removeClass('d-none');
                    $("#DicReuploadFile").removeClass('d-none');
                    console.log('not null');
                }else{
                    $("#DicAttachment").removeClass('d-none');
                    $("#txtDicAttachment").addClass('d-none');
                    $("#DicCheckBox").addClass('d-none');
                    $("#DicReuploadFile").addClass('d-none');
                    console.log('null');
                }

                $("#txtEditSaOecAssessment").val(sa_data[0].oec_assessment);

                // OEC
                $("#txtOecAttachment").val(sa_data[0].oec_attachment);
                if($('#txtOecAttachment').val() != ''){
                    $("#OecAttachment").addClass('d-none');
                    $("#txtOecAttachment").removeClass('d-none');
                    $("#OecCheckBox").removeClass('d-none');
                    $("#OecReuploadFile").removeClass('d-none');
                    console.log('not null');
                }else{
                    $("#OecAttachment").removeClass('d-none');
                    $("#txtOecAttachment").addClass('d-none');
                    $("#OecCheckBox").addClass('d-none');
                    $("#OecReuploadFile").addClass('d-none');
                    console.log('null');
                }

                $("#txtEditSaRfAssessment").val(sa_data[0].rf_assessment);
                $("#selectRapidxUser").val(sa_data[0].second_half_assessed_by).trigger('change');

                // RF
                $("#txtRfAttachment").val(sa_data[0].rf_attachment);
                if($('#txtRfAttachment').val() != ''){
                    $("#RfAttachment").addClass('d-none');
                    $("#txtRfAttachment").removeClass('d-none');
                    $("#RfCheckBox").removeClass('d-none');
                    $("RfReuploadFile").removeClass('d-none');
                    console.log('not null');
                }else{
                    $("#RfAttachment").removeClass('d-none');
                    $("#txtRfAttachment").addClass('d-none');
                    $("#RfCheckBox").addClass('d-none');
                    $("#RfReuploadFile").addClass('d-none');
                    console.log('null');
                }

                $("#txtEditSaRfImprovement").val(sa_data[0].rf_improvement);
                $("#txtEditSaFuAssessment").val(sa_data[0].fu_assessment);

                // FU
                $("#txtFuAttachment").val(sa_data[0].fu_attachment);
                if($('#txtFuAttachment').val() != ''){
                    $("#FuAttachment").addClass('d-none');
                    $("#txtFuAttachment").removeClass('d-none');
                    $("#FuCheckBox").removeClass('d-none');
                    $("FuReuploadFile").removeClass('d-none');
                    console.log('not null');
                }else{
                    $("#FuAttachment").removeClass('d-none');
                    $("#txtFuAttachment").addClass('d-none');
                    $("#FuCheckBox").addClass('d-none');
                    $("#FuReuploadFile").addClass('d-none');
                    console.log('null');
                }

                $("#txtEditSaFuImprovement").val(sa_data[0].fu_improvement);
            }
            else{
                toastr.warning('No SA Data Record Found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function EditSaModuleData(){
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

    let formData = new FormData($('#formEditSaModule')[0]);

	$.ajax({
        url: "edit_sa_module",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnEditSaModuleIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnEditSaModule").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving SA Data Failed!');

                // if(response['error']['control_no'] === undefined){
                //     $("#txtAddSaControlNo").removeClass('is-invalid');
                //     $("#txtAddSaControlNo").attr('title', '');
                // }
                // else{
                //     $("#txtAddSaControlNo").addClass('is-invalid');
                //     $("#txtAddSaControlNo").attr('title', response['error']['control_no']);
                // }

                // if(response['error']['assessed_by'] === undefined){
                //     $("#txtAddAssessedBy").removeClass('is-invalid');
                //     $("#txtAddAssessedBy").attr('title', '');
                // }
                // else{
                //     $("#txtAddAssessedBy").addClass('is-invalid');
                //     $("#txtAddAssessedBy").attr('title', response['error']['assessed_by']);
                // }

                // if(response['error']['checked_by'] === undefined){
                //     $("#txtAddCheckedBy").removeClass('is-invalid');
                //     $("#txtAddCheckedBy").attr('title', '');
                // }
                // else{
                //     $("#txtAddCheckedBy").addClass('is-invalid');
                //     $("#txtAddCheckedBy").attr('title', response['error']['checked_by']);
                // }

                // if(response['error']['add_debit'] === undefined){
                //     $("#txtAddDebitId").removeClass('is-invalid');
                //     $("#txtAddDebitId").attr('title', '');
                // }
                // else{
                //     $("#txtAddDebitId").addClass('is-invalid');
                //     $("#txtAddDebitId").attr('title', response['error']['add_debit']);
                // }

                // if(response['error']['add_credit'] === undefined){
                //     $("#txtAddCreditId").removeClass('is-invalid');
                //     $("#txtAddCreditId").attr('title', '');
                // }
                // else{
                //     $("#txtAddCreditId").addClass('is-invalid');
                //     $("#txtAddCreditId").attr('title', response['error']['add_credit']);
                // }

                // if(response['error']['add_control_id'] === undefined){
                //     $("#txtAddControlId").removeClass('is-invalid');
                //     $("#txtAddControlId").attr('title', '');
                // }
                // else{
                //     $("#txtAddControlId").addClass('is-invalid');
                //     $("#txtAddControlId").attr('title', response['error']['add_control_id']);
                // }

                // if(response['error']['add_internal_control'] === undefined){
                //     $("#txtAddInternalControlId").removeClass('is-invalid');
                //     $("#txtAddInternalControlId").attr('title', '');
                // }
                // else{
                //     $("#txtAddInternalControlId").addClass('is-invalid');
                //     $("#txtAddInternalControlId").attr('title', response['error']['add_internal_control']);
                // }

                // if(response['error']['add_system'] === undefined){
                //     $("#txtAddSystemId").removeClass('is-invalid');
                //     $("#txtAddSystemId").attr('title', '');
                // }
                // else{
                //     $("#txtAddSystemId").addClass('is-invalid');
                //     $("#txtAddSystemId").attr('title', response['error']['add_system']);
                // }

            }
            else if(response['result'] == 1){
                $("#modalEditSaData").modal('hide');
                $("#formEditSaModule")[0].reset();
                toastr.success('SA Data was succesfully saved!');
                dataTablePlcModuleSa.draw(); // reload the tables after insertion
            }

            $("#iBtnEditSaModuleIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditSaModule").removeAttr('disabled');
            $("#iBtnEditSaModuleIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnEditSaModuleIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditSaModule").removeAttr('disabled');
            $("#iBtnEditSaModuleIcon").addClass('fa fa-check');
        }
    });
}

function LoadUserList(cboElement)
{
    let result = '<option value="">N/A</option>';

    $.ajax({

    url: "load_user_management_SA",
    method: "get",
    dataType: "json",
    beforeSend: function(){
            result = '<option value=""> -- Loading -- </option>';
            cboElement.html(result);
        },
        success: function(response){
            result = '';
            if(response['users'].length > 0){
                result = '<option selected disabled>-- Select User -- </option>';
                for(let index = 0; index < response['users'].length; index++){
                    result += '<option value="' + response['users'][index].rapidx_name + '">' + response['users'][index].rapidx_name + '</option>';
                }
            }
            else{
                result = '<option value=""> -- No record found -- </option>';
            }
            cboElement.html(result);
        },
        error: function(data, xhr, status){
            result = '<option value=""> -- Reload Again -- </option>';
            cboElement.html(result);
            toastr.error('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }

    });
}

function UserList(cboElement)
{
    let result = '<option value="">N/A</option>';

    $.ajax({

    url: "load_user_SA",
    method: "get",
    dataType: "json",
    beforeSend: function(){
            result = '<option value=""> -- Loading -- </option>';
            cboElement.html(result);
        },
        success: function(response){
            result = '';
            if(response['users'].length > 0){
                result = '<option selected disabled>-- Select User -- </option>';
                for(let index = 0; index < response['users'].length; index++){
                    result += '<option value="' + response['users'][index].rapidx_name + '">' + response['users'][index].rapidx_name + '</option>';
                }
            }
            else{
                result = '<option value=""> -- No record found -- </option>';
            }
            cboElement.html(result);
        },
        error: function(data, xhr, status){
            result = '<option value=""> -- Reload Again -- </option>';
            cboElement.html(result);
            toastr.error('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }

    });
}


function ApprovedSaData(){
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
        url: "approved_sa_data",
        method: "post",
        data: $('#formApproveSaData').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnApproveIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnApprove").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Cannot Approve!');
            }else{
                if(response['result'] == 1){
                    toastr.success('Already Approved');
                }
                $("#modalApproveSaData").modal('hide');
                $("#formApproveSaData")[0].reset();
                dataTablePlcModuleSa.draw();
            }

            $("#iBtnApproveIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnApprove").removeAttr('disabled');
            $("#iBtnApproveIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnApproveIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnApprove").removeAttr('disabled');
            $("#iBtnApproveIcon").addClass('fa fa-check');
        }
    });
}

function DisapprovedSaData(){
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
        url: "disapproved_sa_data",
        method: "post",
        data: $('#formDisapproveSaData').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnDisapproveIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnDisapprove").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validation'] == 'hasError'){
                toastr.error('Cannot Approve!');
            }else{
                if(response['result'] == 1){
                    toastr.success('Already Approved');
                }
                $("#modalDisapproveSaData").modal('hide');
                $("#formDisapproveSaData")[0].reset();
                dataTablePlcModuleSa.draw();
            }

            $("#iBtnDisapproveIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnDisapprove").removeAttr('disabled');
            $("#iBtnDisapproveIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnDisapproveIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnDisapprove").removeAttr('disabled');
            $("#iBtnDisapproveIcon").addClass('fa fa-check');
        }
    });
}

//============================== YEC APPROVED DATE ==============================
function YecApprovedDate(){
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
        url: "yec_approved_date",
        method: "post",
        data: $('#formYecApprovedDate').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnYecApprovedDateIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnYecApprovedDate").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                if(response['error']['yec_approved_date'] === undefined){
                    $("#dateYecApprovedDate").removeClass('is-invalid');
                    $("#dateYecApprovedDate").attr('title', '');
                }
                else{
                    $("#dateYecApprovedDate").addClass('is-invalid');
                    $("#dateYecApprovedDate").attr('title', response['error']['yec_approved_date']);
                }
                toastr.error('Error!');
            }else{
                if(response['result'] == 1){
                    toastr.success('Successfully Added');
                }

                $("#modalYecApprovedDate").modal('hide');
                $("#formYecApprovedDate")[0].reset();
                dataTablePlcModuleSa.draw();
            }
            $("#iBtnYecApprovedDateIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnYecApprovedDate").removeAttr('disabled');
            $("#iBtnYecApprovedDateIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnYecApprovedDateIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnYecApprovedDate").removeAttr('disabled');
            $("#iBtnYecApprovedDateIcon").addClass('fa fa-check');
        }
    });
}

//============================== GET YEC APPROVED DATE ==============================
function GetYecApprovedDate(yecApprovedDateId){
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
        url: "get_yec_approved_date",
        method: "get",
        data: {
            yec_approved_date_id: yecApprovedDateId
        },
        dataType: "json",
        beforeSend: function(){
            $("#iBtnYecApprovedDateIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnYecApprovedDate").prop('disabled', 'disabled');
        },
        success: function(response){
            $("#dateYecApprovedDate").val(response['yec_approved_date'][0].yec_approved_date);

            $("#iBtnYecApprovedDateIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnYecApprovedDate").removeAttr('disabled');
            $("#iBtnYecApprovedDateIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnYecApprovedDateIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnYecApprovedDate").removeAttr('disabled');
            $("#iBtnYecApprovedDateIcon").addClass('fa fa-check');
        }
    });
    
}