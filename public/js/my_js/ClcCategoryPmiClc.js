//============================== ADD PMI CLC CATEGORY ==============================
function AddPmiClcCategory(){
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

    let formData = new FormData($('#formAddPmiClcCategory')[0]);

	$.ajax({
        url: "add_pmi_clc_category",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnAddPmiClcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiClcCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving Failed!');
                if(response['error']['titles'] === undefined){
                    $("#selectAddPmiClcTitle").removeClass('is-invalid');
                    $("#selectAddPmiClcTitle").attr('title', '');
                }
                else{
                    $("#selectAddPmiClcTitle").addClass('is-invalid');
                    $("#selectAddPmiClcTitle").attr('title', response['error']['titles']);
                }
                if(response['error']['control_objectives'] === undefined){
                    $("#txtAddPmiClcControlObjectives").removeClass('is-invalid');
                    $("#txtAddPmiClcControlObjectives").attr('title', '');
                }
                else{
                    $("#txtAddPmiClcControlObjectives").addClass('is-invalid');
                    $("#txtAddPmiClcControlObjectives").attr('title', response['error']['control_objectives']);
                }
                if(response['error']['internal_controls'] === undefined){
                    $("#txtAddPmiClcInternalControls").removeClass('is-invalid');
                    $("#txtAddPmiClcInternalControls").attr('title', '');
                }
                else{
                    $("#txtAddPmiClcInternalControls").addClass('is-invalid');
                    $("#txtAddPmiClcInternalControls").attr('title', response['error']['internal_controls']);
                }
                if(response['error']['g_ng'] === undefined){
                    $("#txtAddPmiClcGNg").removeClass('is-invalid');
                    $("#txtAddPmiClcGNg").attr('title', '');
                }
                else{
                    $("#txtAddPmiClcGNg").addClass('is-invalid');
                    $("#txtAddPmiClcGNg").attr('title', response['error']['g_ng']);
                }
                if(response['error']['detected_problems_improvement_plans'] === undefined){
                    $("#txtAddPmiClcDetectedProblemsImprovementPlans").removeClass('is-invalid');
                    $("#txtAddPmiClcDetectedProblemsImprovementPlans").attr('title', '');
                }
                else{
                    $("#txtAddPmiClcDetectedProblemsImprovementPlans").addClass('is-invalid');
                    $("#txtAddPmiClcDetectedProblemsImprovementPlans").attr('title', response['error']['detected_problems_improvement_plans']);
                }
                if(response['error']['review_findings'] === undefined){
                    $("#txtAddPmiClcReviewFindings").removeClass('is-invalid');
                    $("#txtAddPmiClcReviewFindings").attr('title', '');
                }
                else{
                    $("#txtAddPmiClcReviewFindings").addClass('is-invalid');
                    $("#txtAddPmiClcReviewFindings").attr('title', response['error']['review_findings']);
                }
                if(response['error']['follow_up_details'] === undefined){
                    $("#txtAddFollowupDetails").removeClass('is-invalid');
                    $("#txtAddFollowupDetails").attr('title', '');
                }
                else{
                    $("#txtAddFollowupDetails").addClass('is-invalid');
                    $("#txtAddFollowupDetails").attr('title', response['error']['follow_up_details']);
                }
                if(response['error']['g_ng_last'] === undefined){
                    $("#txtAddPmiClcGNgLast").removeClass('is-invalid');
                    $("#txtAddPmiClcGNgLast").attr('title', '');
                }
                else{
                    $("#txtAddPmiClcGNgLast").addClass('is-invalid');
                    $("#txtAddPmiClcGNgLast").attr('title', response['error']['g_ng_last']);
                }
                // if(response['error']['uploaded_file'] === undefined){
                //     $("#txtAddPmiClcFile").removeClass('is-invalid');
                //     $("#txtAddPmiClcFile").attr('title', '');
                // }
                // else{
                //     $("#txtAddPmiClcFile").addClass('is-invalid');
                //     $("#txtAddPmiClcFile").attr('title', response['error']['uploaded_file']);
                // }
            }
            else if(response['result'] == 1){
                $("#modalAddPmiClcCategory").modal('hide');
                $("#formAddPmiClcCategory")[0].reset();
                toastr.success('Succesfully saved!');
                dataTableClcCategoryPmiClc.draw(); // reload the tables after insertion
            }

            $("#iBtnAddPmiClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiClcCategory").removeAttr('disabled');
            $("#iBtnAddPmiClcCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnAddPmiClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiClcCategory").removeAttr('disabled');
            $("#iBtnAddPmiClcCategoryIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT PMI CLC CATEGORY BY ID TO EDIT ==============================
function GetPmiClcByIdToEdit(pmi_clcId){
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
        url: "get_pmi_clc_category_by_id",
        method: "get",
        data: {
            pmi_clc_category_id: pmi_clcId
        },
        dataType: "json",
        beforeSend: function(){    
        },
        
        success: function(response){
            let pmi_clc_category = response['pmi_clc_category'];

            if(pmi_clc_category.length > 0){
                if(pmi_clc_category[0].g_ng == 'Good'){
                    console.log(pmi_clc_category[0].g_ng);
                    $("#txtEditPmiClcGood").prop("checked", true);
                }else if (pmi_clc_category[0].g_ng == 'Not Good'){
                    console.log(pmi_clc_category[0].g_ng);
                    $("#txtEditPmiClcNotGood").prop("checked", true);
                }
                else if (pmi_clc_category[0].g_ng == null){
                    console.log(pmi_clc_category[0].g_ng);
                    $("#txtEditPmiClcNotGood").prop("checked", false);
                    $("#txtEditPmiClcGood").prop("checked", false);
                }

                if(pmi_clc_category[0].g_ng_last == 'Good'){
                    console.log(pmi_clc_category[0].g_ng_last);
                    $("#txtEditPmiClcGoodLast").prop("checked", true);
                }else if (pmi_clc_category[0].g_ng_last == 'Not Good'){
                    console.log(pmi_clc_category[0].g_ng_last);
                    $("#txtEditPmiClcNotGoodLast").prop("checked", true);
                }
                else if (pmi_clc_category[0].g_ng_last == null){
                    console.log(pmi_clc_category[0].g_ng_last);
                    $("#txtEditPmiClcNotGoodLast").prop("checked", false);
                    $("#txtEditPmiClcGoodLast").prop("checked", false);
                }

                $("#selectEditPmiClcTitle")                         .val(pmi_clc_category[0].titles).trigger('change');
                $("#txtEditPmiClcControlObjectives")                .val(pmi_clc_category[0].control_objectives);
                $("#txtEditPmiClcInternalControls")                 .val(pmi_clc_category[0].internal_controls);
                $("#txtEditPmiClcDetectedProblemsImprovementPlans") .val(pmi_clc_category[0].detected_problems_improvement_plans);
                $("#txtEditPmiClcReviewFindings")                   .val(pmi_clc_category[0].review_findings);
                $("#txtEditFollowupDetails")                        .val(pmi_clc_category[0].follow_up_details);
                // $("#EditPmiClcFile")                                .val(pmi_clc_category[0].uploaded_file);
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

//============================== CHANGE PMI CLC CATEGORY STATUS ==============================
function ChangeClcCategoryPmiClcStatus(){
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
        url: "change_clc_category_pmi_clc_stat",
        method: "post",
        data: $('#formChangeClcCategoryPmiClcStat').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnChangeClcCategoryPmiClcStatIcon").addClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiClcStat").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validation'] == 'hasError'){
                toastr.error('Activation failed!');
            }else{
                if(response['result'] == 1){
                    if($("#txtChangeClcCategoryPmiClcStat").val() == 1){
                        toastr.success('Activation success!');
                        $("#txtChangeClcCategoryPmiClcStat").val() == 2;
                    }
                    else{
                        toastr.success('Deactivation success!');
                        $("#txtChangeClcCategoryPmiClcStat").val() == 1;
                    }
                }
                $("#modalChangeClcCategoryPmiClcStat").modal('hide');
                $("#formChangeClcCategoryPmiClcStat")[0].reset();
                dataTableClcCategoryPmiClc.draw();
            }

            $("#iBtnChangeClcCategoryPmiClcStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiClcStat").removeAttr('disabled');
            $("#iBtnChangeClcCategoryPmiClcStatIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnChangeClcCategoryPmiClcStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiClcStat").removeAttr('disabled');
            $("#iBtnChangeClcCategoryPmiClcStatIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT PMI CLC CATEGORY ==============================
function EditPmiClcCategory(){
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

    let formData = new FormData($('#formEditPmiClcCategory')[0]);

	$.ajax({
        url: "edit_pmi_clc_category",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnEditPmiClcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiClcCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving Failed!');
                if(response['error']['titles'] === undefined){
                    $("#selectEditPmiClcTitle").removeClass('is-invalid');
                    $("#selectEditPmiClcTitle").attr('title', '');
                }
                else{
                    $("#selectEditPmiClcTitle").addClass('is-invalid');
                    $("#selectEditPmiClcTitle").attr('title', response['error']['titles']);
                }
                if(response['error']['control_objectives'] === undefined){
                    $("#txtEditPmiClcControlObjectives").removeClass('is-invalid');
                    $("#txtEditPmiClcControlObjectives").attr('title', '');
                }
                else{
                    $("#txtEditPmiClcControlObjectives").addClass('is-invalid');
                    $("#txtEditPmiClcControlObjectives").attr('title', response['error']['control_objectives']);
                }
                if(response['error']['internal_controls'] === undefined){
                    $("#txtEditPmiClcInternalControls").removeClass('is-invalid');
                    $("#txtEditPmiClcInternalControls").attr('title', '');
                }
                else{
                    $("#txtEditPmiClcInternalControls").addClass('is-invalid');
                    $("#txtEditPmiClcInternalControls").attr('title', response['error']['internal_controls']);
                }
                if(response['error']['g_ng'] === undefined){
                    $("#txtEditPmiClcGNg").removeClass('is-invalid');
                    $("#txtEditPmiClcGNg").attr('title', '');
                }
                else{
                    $("#txtEditPmiClcGNg").addClass('is-invalid');
                    $("#txtEditPmiClcGNg").attr('title', response['error']['g_ng']);
                }
                if(response['error']['detected_problems_improvement_plans'] === undefined){
                    $("#txtEditPmiClcDetectedProblemsImprovementPlans").removeClass('is-invalid');
                    $("#txtEditPmiClcDetectedProblemsImprovementPlans").attr('title', '');
                }
                else{
                    $("#txtEditPmiClcDetectedProblemsImprovementPlans").addClass('is-invalid');
                    $("#txtEditPmiClcDetectedProblemsImprovementPlans").attr('title', response['error']['detected_problems_improvement_plans']);
                }
                if(response['error']['review_findings'] === undefined){
                    $("#txtEditPmiClcReviewFindings").removeClass('is-invalid');
                    $("#txtEditPmiClcReviewFindings").attr('title', '');
                }
                else{
                    $("#txtEditPmiClcReviewFindings").addClass('is-invalid');
                    $("#txtEditPmiClcReviewFindings").attr('title', response['error']['review_findings']);
                }
                if(response['error']['follow_up_details'] === undefined){
                    $("#txtEditFollowupDetails").removeClass('is-invalid');
                    $("#txtEditFollowupDetails").attr('title', '');
                }
                else{
                    $("#txtEditFollowupDetails").addClass('is-invalid');
                    $("#txtEditFollowupDetails").attr('title', response['error']['follow_up_details']);
                }
                if(response['error']['g_ng_last'] === undefined){
                    $("#txtEditPmiClcGNgLast").removeClass('is-invalid');
                    $("#txtEditPmiClcGNgLast").attr('title', '');
                }
                else{
                    $("#txtEditPmiClcGNgLast").addClass('is-invalid');
                    $("#txtEditPmiClcGNgLast").attr('title', response['error']['g_ng_last']);
                }
                // if(response['error']['uploaded_file'] === undefined){
                //     $("#txtEditPmiClcFile").removeClass('is-invalid');
                //     $("#txtEditPmiClcFile").attr('title', '');
                // }
                // else{
                //     $("#txtEditPmiClcFile").addClass('is-invalid');
                //     $("#txtEditPmiClcFile").attr('title', response['error']['uploaded_file']);
                // }
            }
            else if(response['result'] == 1){
                $("#modalEditPmiClcCategory").modal('hide');
                $("#formEditPmiClcCategory")[0].reset();
                toastr.success('Succesfully saved!');
                dataTableClcCategoryPmiClc.draw(); // reload the tables after insertion
            }

            $("#iBtnEditPmiClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiClcCategory").removeAttr('disabled');
            $("#iBtnEditPmiClcCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnEditPmiClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiClcCategory").removeAttr('disabled');
            $("#iBtnEditPmiClcCategoryIcon").addClass('fa fa-check');
        }
    });
}
