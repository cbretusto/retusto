//============================== ADD PMI FCRP CATEGORY ==============================
function AddPmiFcrpCategory(){
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

    let formData = new FormData($('#formAddPmiFcrpCategory')[0]);

	$.ajax({
        url: "add_pmi_fcrp_category",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnAddPmiFcrpCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiFcrpCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving User Failed!');
                if(response['error']['titles'] === undefined){
                    $("#selectAddPmiFcrpTitle").removeClass('is-invalid');
                    $("#selectAddPmiFcrpTitle").attr('title', '');
                }
                else{
                    $("#selectAddPmiFcrpTitle").addClass('is-invalid');
                    $("#selectAddPmiFcrpTitle").attr('title', response['error']['titles']);
                }
                if(response['error']['control_objectives'] === undefined){
                    $("#txtAddPmiFcrpControlObjectives").removeClass('is-invalid');
                    $("#txtAddPmiFcrpControlObjectives").attr('title', '');
                }
                else{
                    $("#txtAddPmiFcrpControlObjectives").addClass('is-invalid');
                    $("#txtAddPmiFcrpControlObjectives").attr('title', response['error']['control_objectives']);
                }
                if(response['error']['internal_controls'] === undefined){
                    $("#txtAddPmiFcrpInternalControl").removeClass('is-invalid');
                    $("#txtAddPmiFcrpInternalControl").attr('title', '');
                }
                else{
                    $("#txtAddPmiFcrpInternalControl").addClass('is-invalid');
                    $("#txtAddPmiFcrpInternalControl").attr('title', response['error']['internal_controls']);
                }
                if(response['error']['g_ng'] === undefined){
                    $("#txtAddPmiFcrpGNg").removeClass('is-invalid');
                    $("#txtAddPmiFcrpGNg").attr('title', '');
                }
                else{
                    $("#txtAddPmiFcrpGNg").addClass('is-invalid');
                    $("#txtAddPmiFcrpGNg").attr('title', response['error']['g_ng']);
                }
                if(response['error']['detected_problems_improvement_plans'] === undefined){
                    $("#txtAddPmiFcrpDetectedProblemsImprovementPlans").removeClass('is-invalid');
                    $("#txtAddPmiFcrpDetectedProblemsImprovementPlans").attr('title', '');
                }
                else{
                    $("#txtAddPmiFcrpDetectedProblemsImprovementPlans").addClass('is-invalid');
                    $("#txtAddPmiFcrpDetectedProblemsImprovementPlans").attr('title', response['error']['detected_problems_improvement_plans']);
                }
                if(response['error']['review_findings'] === undefined){
                    $("#txtAddPmiFcrpReviewFindings").removeClass('is-invalid');
                    $("#txtAddPmiFcrpReviewFindings").attr('title', '');
                }
                else{
                    $("#txtAddPmiFcrpReviewFindings").addClass('is-invalid');
                    $("#txtAddPmiFcrpReviewFindings").attr('title', response['error']['review_findings']);
                }
                if(response['error']['follow_up_details'] === undefined){
                    $("#txtAddPmiFcrpFollowupDetails").removeClass('is-invalid');
                    $("#txtAddPmiFcrpFollowupDetails").attr('title', '');
                }
                else{
                    $("#txtAddPmiFcrpFollowupDetails").addClass('is-invalid');
                    $("#txtAddPmiFcrpFollowupDetails").attr('title', response['error']['follow_up_details']);
                }
                if(response['error']['g_ng_last'] === undefined){
                    $("#txtAddPmiFcrpGNgLast").removeClass('is-invalid');
                    $("#txtAddPmiFcrpGNgLast").attr('title', '');
                }
                else{
                    $("#txtAddPmiFcrpGNgLast").addClass('is-invalid');
                    $("#txtAddPmiFcrpGNgLast").attr('title', response['error']['g_ng_last']);
                }
                // if(response['error']['uploaded_file'] === undefined){
                //     $("#txtAddPmiFcrpFile").removeClass('is-invalid');
                //     $("#txtAddPmiFcrpFile").attr('title', '');
                // }
                // else{
                //     $("#txtAddPmiFcrpFile").addClass('is-invalid');
                //     $("#txtAddPmiFcrpFile").attr('title', response['error']['uploaded_file']);
                // }
            }
            else if(response['result'] == 1){
                $("#modalAddPmiFcrpCategory").modal('hide');
                $("#formAddPmiFcrpCategory")[0].reset();
                toastr.success('Succesfully saved!');
                dataTableClcCategoryPmiFcrp.draw(); // reload the tables after insertion
            }

            $("#iBtnAddPmiFcrpCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiFcrpCategory").removeAttr('disabled');
            $("#iBtnAddPmiFcrpCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnAddPmiFcrpCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiFcrpCategory").removeAttr('disabled');
            $("#iBtnAddPmiFcrpCategoryIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT PMI FCRP CATEGORY BY ID TO EDIT ==============================
function GetPmiFcrpByIdToEdit(pmi_fcrpId){
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
        url: "get_pmi_fcrp_category_by_id",
        method: "get",
        data: {
            pmi_fcrp_category_id: pmi_fcrpId
        },
        dataType: "json",
        beforeSend: function(){    
        },
        
        success: function(response){
            let pmi_fcrp_category = response['pmi_fcrp_category'];

            console.log(response);

            if(pmi_fcrp_category.length > 0){
                $("#selectEditPmiFcrpTitle")                        .val(pmi_fcrp_category[0].titles).trigger('change');
                $("#txtEditPmiFcrpControlObjectives")                .val(pmi_fcrp_category[0].control_objectives);
                $("#txtEditPmiFcrpInternalControls")                 .val(pmi_fcrp_category[0].internal_controls);
                $("#txtEditPmiFcrpDetectedProblemsImprovementPlans") .val(pmi_fcrp_category[0].detected_problems_improvement_plans);
                $("#txtEditPmiFcrpReviewFindings")                   .val(pmi_fcrp_category[0].review_findings);
                $("#txtEditPmiFcrpFollowupDetails")                  .val(pmi_fcrp_category[0].follow_up_details);
                // $("#EditPmiFcrpFile")                                .val(pmi_fcrp_category[0].uploaded_file);
            }
            else{
                toastr.warning('No Record Found!');
            }
        },
        
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

//============================== EDIT PMI FCRP CATEGORY ==============================
function EditPmiFcrpCategory(){
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

    let formData = new FormData($('#formEditPmiFcrpCategory')[0]);

	$.ajax({
        url: "edit_pmi_fcrp_category",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnEditPmiFcrpCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiFcrpCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving User Failed!');
                if(response['error']['status'] === undefined){
                    $("#selectEditPmiFcrpTitle").removeClass('is-invalid');
                    $("#selectEditPmiFcrpTitle").attr('title', '');
                }
                else{
                    $("#selectEditPmiFcrpTitle").addClass('is-invalid');
                    $("#selectEditPmiFcrpTitle").attr('title', response['error']['status']);
                }
                if(response['error']['control_objectives'] === undefined){
                    $("#txtEditPmiFcrpControlObjectives").removeClass('is-invalid');
                    $("#txtEditPmiFcrpControlObjectives").attr('title', '');
                }
                else{
                    $("#txtEditPmiFcrpControlObjectives").addClass('is-invalid');
                    $("#txtEditPmiFcrpControlObjectives").attr('title', response['error']['control_objectives']);
                }
                if(response['error']['internal_controls'] === undefined){
                    $("#txtEditPmiFcrpInternalControl").removeClass('is-invalid');
                    $("#txtEditPmiFcrpInternalControl").attr('title', '');
                }
                else{
                    $("#txtEditPmiFcrpInternalControl").addClass('is-invalid');
                    $("#txtEditPmiFcrpInternalControl").attr('title', response['error']['internal_controls']);
                }
                if(response['error']['g_ng'] === undefined){
                    $("#txtEditPmiFcrpGNg").removeClass('is-invalid');
                    $("#txtEditPmiFcrpGNg").attr('title', '');
                }
                else{
                    $("#txtEditPmiFcrpGNg").addClass('is-invalid');
                    $("#txtEditPmiFcrpGNg").attr('title', response['error']['g_ng']);
                }
                if(response['error']['detected_problems_improvement_plans'] === undefined){
                    $("#txtEditPmiFcrpDetectedProblemsImprovementPlans").removeClass('is-invalid');
                    $("#txtEditPmiFcrpDetectedProblemsImprovementPlans").attr('title', '');
                }
                else{
                    $("#txtEditPmiFcrpDetectedProblemsImprovementPlans").addClass('is-invalid');
                    $("#txtEditPmiFcrpDetectedProblemsImprovementPlans").attr('title', response['error']['detected_problems_improvement_plans']);
                }
                if(response['error']['review_findings'] === undefined){
                    $("#txtEditPmiFcrpReviewFindings").removeClass('is-invalid');
                    $("#txtEditPmiFcrpReviewFindings").attr('title', '');
                }
                else{
                    $("#txtEditPmiFcrpReviewFindings").addClass('is-invalid');
                    $("#txtEditPmiFcrpReviewFindings").attr('title', response['error']['review_findings']);
                }
                if(response['error']['follow_up_details'] === undefined){
                    $("#txtEditPmiFcrpFollowupDetails").removeClass('is-invalid');
                    $("#txtEditPmiFcrpFollowupDetails").attr('title', '');
                }
                else{
                    $("#txtEditPmiFcrpFollowupDetails").addClass('is-invalid');
                    $("#txtEditPmiFcrpFollowupDetails").attr('title', response['error']['follow_up_details']);
                }
                if(response['error']['g_ng_last'] === undefined){
                    $("#txtEditPmiFcrpGNgLast").removeClass('is-invalid');
                    $("#txtEditPmiFcrpGNgLast").attr('title', '');
                }
                else{
                    $("#txtEditPmiFcrpGNgLast").addClass('is-invalid');
                    $("#txtEditPmiFcrpGNgLast").attr('title', response['error']['g_ng_last']);
                }
                // if(response['error']['uploaded_file'] === undefined){
                //     $("#txtEditPmiFcrpFile").removeClass('is-invalid');
                //     $("#txtEditPmiFcrpFile").attr('title', '');
                // }
                // else{
                //     $("#txtEditPmiFcrpFile").addClass('is-invalid');
                //     $("#txtEditPmiFcrpFile").attr('title', response['error']['uploaded_file']);
                // }
            }
            else if(response['result'] == 1){
                $("#modalEditPmiFcrpCategory").modal('hide');
                $("#formEditPmiFcrpCategory")[0].reset();
                toastr.success('Succesfully saved!');
                dataTableClcCategoryPmiFcrp.draw(); // reload the tables after insertion
            }

            $("#iBtnEditPmiFcrpCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiFcrpCategory").removeAttr('disabled');
            $("#iBtnEditPmiFcrpCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnEditPmiFcrpCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiFcrpCategory").removeAttr('disabled');
            $("#iBtnEditPmiFcrpCategoryIcon").addClass('fa fa-check');
        }
    });
}

//============================== CHANGE PMI FCRP CATEGORY STATUS ==============================
function ChangeClcCategoryPmiFcrpStatus(){
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
        url: "change_clc_category_pmi_fcrp_stat",
        method: "post",
        data: $('#formChangeClcCategoryPmiFcrpStat').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnChangeClcCategoryPmiFcrpStatIcon").addClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiFcrpStat").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validation'] == 'hasError'){
                toastr.error('User activation failed!');
            }else{
                if(response['result'] == 1){
                    if($("#txtChangeClcCategoryPmiFcrpStat").val() == 1){
                        toastr.success('User activation success!');
                        $("#txtChangeClcCategoryPmiFcrpStat").val() == 2;
                    }
                    else{
                        toastr.success('User deactivation success!');
                        $("#txtChangeClcCategoryPmiFcrpStat").val() == 1;
                    }
                }
                $("#modalChangeClcCategoryPmiFcrpStat").modal('hide');
                $("#formChangeClcCategoryPmiFcrpStat")[0].reset();
                dataTableClcCategoryPmiFcrp.draw();
            }

            $("#iBtnChangeClcCategoryPmiFcrpStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiFcrpStat").removeAttr('disabled');
            $("#iBtnChangeClcCategoryPmiFcrpStatIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnChangeClcCategoryPmiFcrpStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiFcrpStat").removeAttr('disabled');
            $("#iBtnChangeClcCategoryPmiFcrpStatIcon").addClass('fa fa-check');
        }
    });
}


