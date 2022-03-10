// function AddSaModuleData(){
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



// 	$.ajax({
//         url: "add_sa_module",
//         method: "post",
//         data: $('#formAddSaModule').serialize(),
//         dataType: "json",
//         beforeSend: function(){
//             $("#iBtnAddSaModuleIcon").addClass('fa fa-spinner fa-pulse');
//             $("#btnAddSaModule").prop('disabled', 'disabled');
//         },
//         success: function(response){
//             if(response['validation'] == 'hasError'){
//                 toastr.error('Saving SA Data Failed!');

//                 // if(response['error']['control_no'] === undefined){
//                 //     $("#txtAddSaControlNo").removeClass('is-invalid');
//                 //     $("#txtAddSaControlNo").attr('title', '');
//                 // }
//                 // else{
//                 //     $("#txtAddSaControlNo").addClass('is-invalid');
//                 //     $("#txtAddSaControlNo").attr('title', response['error']['control_no']);
//                 // }

//                 // if(response['error']['assessed_by'] === undefined){
//                 //     $("#txtAddAssessedBy").removeClass('is-invalid');
//                 //     $("#txtAddAssessedBy").attr('title', '');
//                 // }
//                 // else{
//                 //     $("#txtAddAssessedBy").addClass('is-invalid');
//                 //     $("#txtAddAssessedBy").attr('title', response['error']['assessed_by']);
//                 // }

//                 // if(response['error']['checked_by'] === undefined){
//                 //     $("#txtAddCheckedBy").removeClass('is-invalid');
//                 //     $("#txtAddCheckedBy").attr('title', '');
//                 // }
//                 // else{
//                 //     $("#txtAddCheckedBy").addClass('is-invalid');
//                 //     $("#txtAddCheckedBy").attr('title', response['error']['checked_by']);
//                 // }

//                 // if(response['error']['add_debit'] === undefined){
//                 //     $("#txtAddDebitId").removeClass('is-invalid');
//                 //     $("#txtAddDebitId").attr('title', '');
//                 // }
//                 // else{
//                 //     $("#txtAddDebitId").addClass('is-invalid');
//                 //     $("#txtAddDebitId").attr('title', response['error']['add_debit']);
//                 // }

//                 // if(response['error']['add_credit'] === undefined){
//                 //     $("#txtAddCreditId").removeClass('is-invalid');
//                 //     $("#txtAddCreditId").attr('title', '');
//                 // }
//                 // else{
//                 //     $("#txtAddCreditId").addClass('is-invalid');
//                 //     $("#txtAddCreditId").attr('title', response['error']['add_credit']);
//                 // }

//                 // if(response['error']['add_control_id'] === undefined){
//                 //     $("#txtAddControlId").removeClass('is-invalid');
//                 //     $("#txtAddControlId").attr('title', '');
//                 // }
//                 // else{
//                 //     $("#txtAddControlId").addClass('is-invalid');
//                 //     $("#txtAddControlId").attr('title', response['error']['add_control_id']);
//                 // }

//                 // if(response['error']['add_internal_control'] === undefined){
//                 //     $("#txtAddInternalControlId").removeClass('is-invalid');
//                 //     $("#txtAddInternalControlId").attr('title', '');
//                 // }
//                 // else{
//                 //     $("#txtAddInternalControlId").addClass('is-invalid');
//                 //     $("#txtAddInternalControlId").attr('title', response['error']['add_internal_control']);
//                 // }

//                 // if(response['error']['add_system'] === undefined){
//                 //     $("#txtAddSystemId").removeClass('is-invalid');
//                 //     $("#txtAddSystemId").attr('title', '');
//                 // }
//                 // else{
//                 //     $("#txtAddSystemId").addClass('is-invalid');
//                 //     $("#txtAddSystemId").attr('title', response['error']['add_system']);
//                 // }

//             }
//             else if(response['result'] == 1){
//                 $("#modalAddSaModule").modal('hide');
//                 $("#formAddSaModule")[0].reset();
//                 toastr.success('SA Data was succesfully saved!');
//                 dataTablePlcModuleSa.draw(); // reload the tables after insertion
//             }

//             $("#iBtnAddSaModuleIcon").removeClass('fa fa-spinner fa-pulse');
//             $("#btnAddSaModule").removeAttr('disabled');
//             $("#iBtnAddSaModuleIcon").addClass('fa fa-check');
//         },
//         error: function(data, xhr, status){
//             toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//             $("#iBtnAddSaModuleIcon").removeClass('fa fa-spinner fa-pulse');
//             $("#btnAddSaModule").removeAttr('disabled');
//             $("#iBtnAddSaModuleIcon").addClass('fa fa-check');
//         }
//     });
// }

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
        
            // console.log(rcm_data);

            if(sa_data.length > 0){
                if(sa_data[0].dic_status == 'G'){
                    $("#txtEditSaDicGStatus").prop("checked",true);
                }else if (sa_data[0].dic_status == 'NG'){
                    $("#txtEditSaDicNGStatus").prop("checked",true);
                }

                if(sa_data[0].oec_status == 'G'){
                    $("#txtEditSaOecGStatus").prop("checked",true);
                }else if (sa_data[0].oec_status == 'NG'){
                    $("#txtEditSaOecNGStatus").prop("checked",true);
                }

                if(sa_data[0].rf_status == 'G'){
                    $("#txtEditSaRfGStatus").prop("checked",true);
                }else if (sa_data[0].oec_status == 'NG'){
                    $("#txtEditSaRfNGStatus").prop("checked",true);
                }

                $("#txtEditSaAssesedBy").val(sa_data[0].assessed_by);
                $("#txtEditSaCheckedBy").val(sa_data[0].checked_by);
                $("#txtEditSaControlNo").val(sa_data[0].control_no);
                $("#txtEditSaKeyControl").val(sa_data[0].key_control);
                $("#txtEditSaItControl").val(sa_data[0].it_control);
                $("#txtEditSaInternalControl").val(sa_data[0].internal_control);
                $("#txtEditSaDicAssessment").val(sa_data[0].dic_assessment);
                $("#txtEditSaOecAssessment").val(sa_data[0].oec_assessment);
                $("#txtEditSaRfAssessment").val(sa_data[0].rf_assessment);
                $("#txtEditSaRfImprovement").val(sa_data[0].rf_improvement);


                
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

	$.ajax({
        url: "edit_sa_module",
        method: "post",
        data: $('#formEditSaModule').serialize(),
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
                $("#modalEditSaModule").modal('hide');
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
