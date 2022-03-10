//============================== ADD USER ==============================
function AddPmiItClcCategory(){
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

    let formData = new FormData($('#formAddPmiItClcCategory')[0]);

	$.ajax({
        url: "add_pmi_it_clc_category",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnAddPmiItClcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiItClcCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving User Failed!');
                if(response['error']['control_objectives'] === undefined){
                    $("#txtAddPmiItClcControlObjectives").removeClass('is-invalid');
                    $("#txtAddPmiItClcControlObjectives").attr('title', '');
                }
                else{
                    $("#txtAddPmiItClcControlObjectives").addClass('is-invalid');
                    $("#txtAddPmiItClcControlObjectives").attr('title', response['error']['control_objectives']);
                }
                if(response['error']['internal_controls'] === undefined){
                    $("#txtAddPmiItClcInternalControl").removeClass('is-invalid');
                    $("#txtAddPmiItClcInternalControl").attr('title', '');
                }
                else{
                    $("#txtAddPmiItClcInternalControl").addClass('is-invalid');
                    $("#txtAddPmiItClcInternalControl").attr('title', response['error']['internal_controls']);
                }
                if(response['error']['status'] === undefined){
                    $("#txtAddPmiItClcStatus").removeClass('is-invalid');
                    $("#txtAddPmiItClcStatus").attr('title', '');
                }
                else{
                    $("#txtAddPmiItClcStatus").addClass('is-invalid');
                    $("#txtAddPmiItClcStatus").attr('title', response['error']['status']);
                }
                if(response['error']['detected_problems_improvement_plans'] === undefined){
                    $("#txtAddPmiItClcDetectedProblemsImprovementPlans").removeClass('is-invalid');
                    $("#txtAddPmiItClcDetectedProblemsImprovementPlans").attr('title', '');
                }
                else{
                    $("#txtAddPmiItClcDetectedProblemsImprovementPlans").addClass('is-invalid');
                    $("#txtAddPmiItClcDetectedProblemsImprovementPlans").attr('title', response['error']['detected_problems_improvement_plans']);
                }
                if(response['error']['review_findings'] === undefined){
                    $("#txtAddPmiITClcReviewFindings").removeClass('is-invalid');
                    $("#txtAddPmiITClcReviewFindings").attr('title', '');
                }
                else{
                    $("#txtAddPmiITClcReviewFindings").addClass('is-invalid');
                    $("#txtAddPmiITClcReviewFindings").attr('title', response['error']['review_findings']);
                }
                if(response['error']['follow_ups'] === undefined){
                    $("#txtAddPmiItClcFollowups").removeClass('is-invalid');
                    $("#txtAddPmiItClcFollowups").attr('title', '');
                }
                else{
                    $("#txtAddPmiItClcFollowups").addClass('is-invalid');
                    $("#txtAddPmiItClcFollowups").attr('title', response['error']['follow_ups']);
                }
                if(response['error']['status_last'] === undefined){
                    $("#txtAddPmiItClcStatusLast").removeClass('is-invalid');
                    $("#txtAddPmiItClcStatusLast").attr('title', '');
                }
                else{
                    $("#txtAddPmiItClcStatusLast").addClass('is-invalid');
                    $("#txtAddPmiItClcStatusLast").attr('title', response['error']['status_last']);
                }
                // if(response['error']['uploaded_file'] === undefined){
                //     $("#txtAddPmiItClcFile").removeClass('is-invalid');
                //     $("#txtAddPmiItClcFile").attr('title', '');
                // }
                // else{
                //     $("#txtAddPmiItClcFile").addClass('is-invalid');
                //     $("#txtAddPmiItClcFile").attr('title', response['error']['uploaded_file']);
                // }
            }
            else if(response['result'] == 1){
                $("#modalAddPmiItClcCategory").modal('hide');
                $("#formAddPmiItClcCategory")[0].reset();
                toastr.success('Succesfully saved!');
                dataTableClcCategoryPmiItClc.draw(); // reload the tables after insertion
            }

            $("#iBtnAddPmiItClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiItClcCategory").removeAttr('disabled');
            $("#iBtnAddPmiItClcCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnAddPmiItClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddPmiItClcCategory").removeAttr('disabled');
            $("#iBtnAddPmiItClcCategoryIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT USER BY ID TO EDIT ==============================
function GetPmiItClcByIdToEdit(pmi_itclcId){
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
        url: "get_pmi_it_clc_category_by_id",
        method: "get",
        data: {
            pmi_it_clc_category_id: pmi_itclcId
        },
        dataType: "json",
        beforeSend: function(){    
        },
        
        success: function(response){
            // console.log(response);            
            let pmi_it_clc_category = response['pmi_it_clc_category'];
            if(pmi_it_clc_category.length > 0){
                $("#txtEditPmiItClcControlObjectives")                .val(pmi_it_clc_category[0].control_objectives);
                $("#txtEditPmiItClcInternalControls")                 .val(pmi_it_clc_category[0].internal_controls);
                $("#txtEditPmiItClcStatus")                           .val(pmi_it_clc_category[0].status);
                $("#txtEditPmiItClcDetectedProblemsImprovementPlans") .val(pmi_it_clc_category[0].detected_problems_improvement_plans);
                $("#txtEditPmiItClcReviewFindings")                   .val(pmi_it_clc_category[0].review_findings);
                $("#txtEditPmiItClcFollowups")                        .val(pmi_it_clc_category[0].follow_ups);
                $("#txtEditPmiItClcStatusLast")                       .val(pmi_it_clc_category[0].status_last);
                // $("#EditPmiItClcFile")                                .val(pmi_it_clc_category[0].uploaded_file);
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

//============================== EDIT  ==============================
function EditPmiItClcCategory(){
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

    let formData = new FormData($('#formEditPmiItClcCategory')[0]);

	$.ajax({
        url: "edit_pmi_it_clc_category",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnEditPmiItClcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiItClcCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving User Failed!');
                if(response['error']['control_objectives'] === undefined){
                    $("#txtEditPmiItClcControlObjectives").removeClass('is-invalid');
                    $("#txtEditPmiItClcControlObjectives").attr('title', '');
                }
                else{
                    $("#txtEditPmiItClcControlObjectives").addClass('is-invalid');
                    $("#txtEditPmiItClcControlObjectives").attr('title', response['error']['control_objectives']);
                }
                if(response['error']['internal_controls'] === undefined){
                    $("#txtEditPmiItClcInternalControl").removeClass('is-invalid');
                    $("#txtEditPmiItClcInternalControl").attr('title', '');
                }
                else{
                    $("#txtEditPmiItClcInternalControl").addClass('is-invalid');
                    $("#txtEditPmiItClcInternalControl").attr('title', response['error']['internal_controls']);
                }
                if(response['error']['status'] === undefined){
                    $("#txtEditPmiItClcStatus").removeClass('is-invalid');
                    $("#txtEditPmiItClcStatus").attr('title', '');
                }
                else{
                    $("#txtEditPmiItClcStatus").addClass('is-invalid');
                    $("#txtEditPmiItClcStatus").attr('title', response['error']['status']);
                }
                if(response['error']['detected_problems_improvement_plans'] === undefined){
                    $("#txtEditPmiItClcDetectedProblemsImprovementPlans").removeClass('is-invalid');
                    $("#txtEditPmiItClcDetectedProblemsImprovementPlans").attr('title', '');
                }
                else{
                    $("#txtEditPmiItClcDetectedProblemsImprovementPlans").addClass('is-invalid');
                    $("#txtEditPmiItClcDetectedProblemsImprovementPlans").attr('title', response['error']['detected_problems_improvement_plans']);
                }
                if(response['error']['review_findings'] === undefined){
                    $("#txtEditPmiITClcReviewFindings").removeClass('is-invalid');
                    $("#txtEditPmiITClcReviewFindings").attr('title', '');
                }
                else{
                    $("#txtEditPmiITClcReviewFindings").addClass('is-invalid');
                    $("#txtEditPmiITClcReviewFindings").attr('title', response['error']['review_findings']);
                }
                if(response['error']['follow_ups'] === undefined){
                    $("#txtEditPmiItClcFollowups").removeClass('is-invalid');
                    $("#txtEditPmiItClcFollowups").attr('title', '');
                }
                else{
                    $("#txtEditPmiItClcFollowups").addClass('is-invalid');
                    $("#txtEditPmiItClcFollowups").attr('title', response['error']['follow_ups']);
                }
                if(response['error']['status_last'] === undefined){
                    $("#txtEditPmiItClcStatusLast").removeClass('is-invalid');
                    $("#txtEditPmiItClcStatusLast").attr('title', '');
                }
                else{
                    $("#txtEditPmiItClcStatusLast").addClass('is-invalid');
                    $("#txtEditPmiItClcStatusLast").attr('title', response['error']['status_last']);
                }
                // if(response['error']['uploaded_file'] === undefined){
                //     $("#txtEditPmiItClcFile").removeClass('is-invalid');
                //     $("#txtEditPmiItClcFile").attr('title', '');
                // }
                // else{
                //     $("#txtEditPmiItClcFile").addClass('is-invalid');
                //     $("#txtEditPmiItClcFile").attr('title', response['error']['uploaded_file']);
                // }
            }
            else if(response['result'] == 1){
                $("#modalEditPmiItClcCategory").modal('hide');
                $("#formEditPmiItClcCategory")[0].reset();
                toastr.success('Succesfully saved!');
                dataTableClcCategoryPmiItClc.draw(); // reload the tables after insertion
            }

            $("#iBtnEditPmiItClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiItClcCategory").removeAttr('disabled');
            $("#iBtnEditPmiItClcCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnEditPmiItClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditPmiItClcCategory").removeAttr('disabled');
            $("#iBtnEditPmiItClcCategoryIcon").addClass('fa fa-check');
        }
    });
}

//============================== CHANGE PMI CLC CATEGORY STATUS ==============================
function ChangeClcCategoryPmiItClcStatus(){
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
        url: "change_clc_category_pmi_it_clc_stat",
        method: "post",
        data: $('#formChangeClcCategoryPmiItClcStat').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnChangeClcCategoryPmiItClcStatIcon").addClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiItClcStat").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validation'] == 'hasError'){
                toastr.error('User activation failed!');
            }else{
                if(response['result'] == 1){
                    if($("#txtChangeClcCategoryPmiItClcStat").val() == 1){
                        toastr.success('User activation success!');
                        $("#txtChangeClcCategoryPmiItClcStat").val() == 2;
                    }
                    else{
                        toastr.success('User deactivation success!');
                        $("#txtChangeClcCategoryPmiItClcStat").val() == 1;
                    }
                }
                $("#modalChangeClcCategoryPmiItClcStat").modal('hide');
                $("#formChangeClcCategoryPmiItClcStat")[0].reset();
                dataTableClcCategoryPmiItClc.draw();
            }

            $("#iBtnChangeClcCategoryPmiItClcStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiItClcStat").removeAttr('disabled');
            $("#iBtnChangeClcCategoryPmiItClcStatIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnChangeClcCategoryPmiItClcStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryPmiItClcStat").removeAttr('disabled');
            $("#iBtnChangeClcCategoryPmiItClcStatIcon").addClass('fa fa-check');
        }
    });
}
