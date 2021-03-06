// // ============================== DELETE SA DATA ==============================
// function DeleteSaData(){
//     toastr.options = {
//         "closeButton": false,
//         "debug": false,
//         "newestOnTop": true,
//         "progressBar": true,
//         "positionClass": "toast-top-right",
//         "preventDuplicates": false,
//         "onclick": null,
//         "showDuration": "300",
//         "hideDuration": "3000",
//         "timeOut": "3000",
//         "extendedTimeOut": "3000",
//         "showEasing": "swing",
//         "hideEasing": "linear",
//         "showMethod": "fadeIn",
//         "hideMethod": "fadeOut",
//     };

//     $.ajax({
//         url: "delete_sa_data",
//         method: "post",
//         data: $('#deleteSaForm').serialize(),
//         dataType: "json",
//         beforeSend: function(){
//             $("#iBtnDeleteSaDataIcon").addClass('fa fa-spinner fa-pulse');
//             $("#btnDeleteSaData").prop('disabled', 'disabled');
//         },
//         success: function(response){
//             let result = response['result'];
//             if(result == 1){
//                 $("#modalDeleteSaData").modal('hide');
//                 $("#deleteSaForm")[0].reset();
//                 toastr.success('SA Data successfully deleted');
//                 dataTablePlcModuleSa.draw();
//             }
//             else{
//                 toastr.warning('No SA Data found!');
//             }

//             $("#iBtnDeleteSaDataIcon").removeClass('fa fa-spinner fa-pulse');
//             $("#btnDeleteSaData").removeAttr('disabled');
//             $("#iBtnDeleteSaDataIcon").addClass('fa fa-check');
//         },
//         error: function(data, xhr, status){
//             toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//             $("#iBtnDeleteSaDataIcon").removeClass('fa fa-spinner fa-pulse');
//             $("#btnDeleteSaData").removeAttr('disabled');
//             $("#iBtnDeleteSaDataIcon").addClass('fa fa-check');
//         }
//     });
// }

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
            // console.log(response);
            let sa_data     = response['sa_data'];
            let dic_details = response['dic_details'];
            let oec_details = response['oec_details'];
            let rf_details  = response['rf_details'];
            let fu_details  = response['fu_details'];
            // console.log('test', sa_data);
            if(sa_data.length > 0){
                $("#selectEditDept").val(sa_data[0].concerned_dept).trigger('change');
                $("#txtEditSaControlNo").val(sa_data[0].control_no);
                $("#txtEditSaInternalControl").val(sa_data[0].internal_control);
                $("#txtEditSaRfImprovement").val(sa_data[0].rf_improvement);
                $("#txtEditSaFuImprovement").val(sa_data[0].fu_improvement);

                //START DIC GET DATA
                $("#txtEditSaDicAssessment").val(dic_details[0].dic_assessment_details_findings);
                $("#txtDicEditOrigFile").val(dic_details[0].dic_attachment);

                // To remove auto counting of row in multiple (EDIT)
                for(let dic = 2; dic <= dic_details.length; dic++){
                    $('#removeRowDicAssessmentDetailsAndFindings')[0].click();
                }
                let dic_counter = 1;
                // To automatic add row in edit base on how many the DIC is
                for(let dic = 2; dic <= dic_details.length; dic++){
                    $('#addRowDicAssessmentDetailsAndFindings')[0].click();

                    $('#txtEditSaDicAssessment_'+dic).val(dic_details[dic_counter].dic_assessment_details_findings)
                    $('#txtDicEditOrigFile_'+dic).val(dic_details[dic_counter].dic_attachment)

                    if(dic_details[dic_counter].dic_attachment != ''){
                        $("#DicAttachment_"+dic).addClass('d-none');
                        $("#DicCheckBox_"+dic).removeClass('d-none');
                        $("#DicReuploadFile_"+dic).removeClass('d-none');
                        $("#txtDicEditOrigFile_"+dic).removeClass('d-none');
                    }
                    dic_counter = dic_counter+1;
                }
                // DIC
                if($('#txtDicEditOrigFile').val() != ''){
                    $("#DicAttachment").addClass('d-none');
                    $("#txtDicEditOrigFile").removeClass('d-none');
                    $("#DicCheckBox").removeClass('d-none');
                    $("#DicReuploadFile").removeClass('d-none');
                    console.log('DIC Attachment not null');
                }else{
                    $("#DicAttachment").removeClass('d-none');
                    $("#txtDicEditOrigFile").addClass('d-none');
                    $("#DicCheckBox").addClass('d-none');
                    $("#DicReuploadFile").addClass('d-none');
                    console.log('DIC Attachment null');
                }//END DIC GET DATA

                //START OEC GET DATA
                $("#txtEditSaOecAssessment").val(oec_details[0].oec_assessment_details_findings);
                $("#txtOecAttachment").val(oec_details[0].oec_attachment);

                // To remove auto counting of row in multiple (EDIT)
                for(let oec = 2; oec <= oec_details.length; oec++){
                    $('#removeRowOecAssessmentDetailsAndFindings')[0].click();
                }
                let oec_counter = 1;
                // To automatic add row in edit base on how many the DIC is
                for(let oec = 2; oec <= oec_details.length; oec++){
                    $('#addRowOecAssessmentDetailsAndFindings')[0].click();
                    $('#txtEditSaOecAssessment_'+oec).val(oec_details[oec_counter].oec_assessment_details_findings)
                    $('#txtOecAttachment_'+oec).val(oec_details[oec_counter].oec_attachment)

                    if(oec_details[oec_counter].oec_attachment != ''){
                        $("#OecAttachment_"+oec).addClass('d-none');
                        $("#OecCheckBox_"+oec).removeClass('d-none');
                        $("#OecReuploadFile_"+oec).removeClass('d-none');
                        $("#txtOecAttachment_"+oec).removeClass('d-none');
                    }
                    oec_counter = oec_counter+1;
                }
                
                // OEC
                if($('#txtOecAttachment').val() != ''){
                    $("#OecAttachment").addClass('d-none');
                    $("#txtOecAttachment").removeClass('d-none');
                    $("#OecCheckBox").removeClass('d-none');
                    $("#OecReuploadFile").removeClass('d-none');
                    console.log('OEC Attachment not null');
                }else{
                    $("#OecAttachment").removeClass('d-none');
                    $("#txtOecAttachment").addClass('d-none');
                    $("#OecCheckBox").addClass('d-none');
                    $("#OecReuploadFile").addClass('d-none');
                    console.log('OEC Attachment null');
                }//END OEC GET DATA

                //START RF GET DATA
                $("#txtEditSaRfAssessment").val(rf_details[0].rf_assessment_details_findings);
                $("#txtRfAttachment").val(rf_details[0].rf_attachment);

                // To remove auto counting of row in multiple (EDIT)
                for(let rf = 2; rf <= rf_details.length; rf++){
                    $('#removeRowRfAssessmentDetailsAndFindings')[0].click();
                }
                let rf_counter = 1;
                // To automatic add row in edit base on how many the DIC is
                for(let rf = 2; rf <= rf_details.length; rf++){
                    $('#addRowRfAssessmentDetailsAndFindings')[0].click();
                    // $("#txtEditSaDicAssessment").val(sa_data[0].plc_sa_dic_assessment_details_finding.dic_assessment_details_findings);

                    $('#txtEditSaRfAssessment_'+rf).val(rf_details[rf_counter].rf_assessment_details_findings)
                    $('#txtRfAttachment_'+rf).val(rf_details[rf_counter].rf_attachment)

                    if(rf_details[rf_counter].rf_attachment != ''){
                        $("#RfAttachment_"+rf).addClass('d-none');
                        $("#chckRfCheckBox_"+rf).removeClass('d-none');
                        $("#txtRfReuploadFile_"+rf).removeClass('d-none');
                        $("#txtRfAttachment_"+rf).removeClass('d-none');
                    }
                    rf_counter = rf_counter+1;
                }
                // RF
                if($('#txtRfAttachment').val() != ''){
                    $("#RfAttachment").addClass('d-none');
                    $("#txtRfAttachment").removeClass('d-none');
                    $("#chckRfCheckBox").removeClass('d-none');
                    $("#txtRfReuploadFile").removeClass('d-none');
                    console.log('RF Attachment not null');
                }else{
                    $("#RfAttachment").removeClass('d-none');
                    $("#txtRfAttachment").addClass('d-none');
                    $("#chckRfCheckBox").addClass('d-none');
                    $("#txtRfReuploadFile").addClass('d-none');
                    console.log('RF Attachment null');
                }

                //START FU GET DATA
                $("#txtEditSaFuAssessment").val(fu_details[0].fu_assessment_details_findings);
                $("#txtFuAttachment").val(fu_details[0].fu_attachment);

                // To remove auto counting of row in multiple (EDIT)
                for(let fu = 2; fu <= fu_details.length; fu++){
                    $('#removeRowFuAssessmentDetailsAndFindings')[0].click();
                }
                let fu_counter = 1;
                // To automatic add row in edit base on how many the DIC is
                for(let fu = 2; fu <= fu_details.length; fu++){
                    $('#addRowFuAssessmentDetailsAndFindings')[0].click();

                    $('#txtEditSaFuAssessment_'+fu).val(fu_details[fu_counter].fu_assessment_details_findings)
                    $('#txtFuAttachment_'+fu).val(fu_details[fu_counter].fu_attachment)

                    if(fu_details[fu_counter].fu_attachment != ''){
                        $("#FuAttachment_"+fu).addClass('d-none');
                        $("#chckFuCheckBox_"+fu).removeClass('d-none');
                        $("#txtFuReuploadFile_"+fu).removeClass('d-none');
                        $("#txtFuAttachment_"+fu).removeClass('d-none');
                    }
                    fu_counter = fu_counter+1;
                }
                // FU
                if($('#txtFuAttachment').val() != ''){
                    $("#FuAttachment").addClass('d-none');
                    $("#txtFuAttachment").removeClass('d-none');
                    $("#chckFuCheckBox").removeClass('d-none');
                    $("#txtFuReuploadFile").removeClass('d-none');
                    console.log('FU Attachment not null');
                }else{
                    $("#FuAttachment").removeClass('d-none');
                    $("#txtFuAttachment").addClass('d-none');
                    $("#chckFuCheckBox").addClass('d-none');
                    $("#txtFuReuploadFile").addClass('d-none');
                    console.log('FU Attachment null');
                }

                if(sa_data[0].key_control != null){
                    $("#txtEditSaKeyControl").prop("checked",true);
                    $("#txtEditSaItControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("disabled",true);
                }else{
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaItControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("checked",false);
                }

                if(sa_data[0].it_control != null){
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaItControl").prop("checked",true);
                    $("#txtEditSaNonKeyControl").prop("disabled",true);
                }else{
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaItControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("checked",false);
                }

                if(sa_data[0].non_key_control != null){
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaItControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("checked",true);
                }else{
                    $("#txtEditSaKeyControl").prop("disabled",true);
                    $("#txtEditSaItControl").prop("disabled",true);
                    $("#txtEditSaNonKeyControl").prop("checked",false);
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

function LoadUserListAssessedBy(cboElement){
    let result = '<option value="">N/A</option>';

    $.ajax({
        url: "load_assessed_by_SA",
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

// function UserList(cboElement){
//     let result = '<option value="">N/A</option>';

//     $.ajax({
//     url: "load_user_SA",
//     method: "get",
//     dataType: "json",
//     beforeSend: function(){
//             result = '<option value=""> -- Loading -- </option>';
//             cboElement.html(result);
//         },
//         success: function(response){
//             result = '';
//             if(response['users'].length > 0){
//                 result = '<option selected disabled>-- Select User -- </option>';
//                 for(let index = 0; index < response['users'].length; index++){
//                     result += '<option value="' + response['users'][index].rapidx_name + '">' + response['users'][index].rapidx_name + '</option>';
//                 }
//             }
//             else{
//                 result = '<option value=""> -- No record found -- </option>';
//             }
//             cboElement.html(result);
//         },
//         error: function(data, xhr, status){
//             result = '<option value=""> -- Reload Again -- </option>';
//             cboElement.html(result);
//             toastr.error('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//         }

//     });
// }


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

                $("#modalFirstHalfYecApprovedDate").modal('hide');
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

// COUNT PMI BY ID
function countPmiCategoryById(category){
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
        url: "count_pmi_category_by_id",
        method: "get",
        data: {
            category: category
        },
        dataType: "json",
        beforeSend: function(){  
        },
        success: function(JsonObject){
            if(JsonObject['get_sa_status'].length > 0){
                $("#totalNumberOfGood"+JsonObject['category']).text(JsonObject['get_dic_good_status'] + JsonObject['get_oec_good_status']);
            }
            else{
                // toastr.warning('No Record Found!');
            }

            if(JsonObject['get_sa_status'].length > 0){
                $("#totalNumberOfNotGood"+JsonObject['category']).text(JsonObject['get_dic_not_good_status'] + JsonObject['get_oec_not_good_status']);
            }
            else{
                // toastr.warning('No Record Found!');
            }

        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}