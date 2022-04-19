//============================== ADD PMI CLC CATEGORY ==============================
function AddPlcEvidencesFile(){
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

    let formData = new FormData($('#formSelectPlcEvidences')[0]);

	$.ajax({
        url: "add_plc_evidences_file",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnSelectPlcEvidencesIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnChangeSelectPlcEvidences").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving User Failed!');
                if(response['error']['category_id'] === undefined){
                    $("#txtCategoryId").removeClass('is-invalid');
                    $("#txtCategoryId").attr('title', '');
                }
                else{
                    $("#txtCategoryId").addClass('is-invalid');
                    $("#txtCategoryId").attr('title', response['error']['category_id']);
                }
                if(response['error']['sa_id'] === undefined){
                    $("#txtSaId").removeClass('is-invalid');
                    $("#txtSaId").attr('title', '');
                }
                else{
                    $("#txtSaId").addClass('is-invalid');
                    $("#txtSaId").attr('title', response['error']['sa_id']);
                }
                if(response['error']['select_clc_evidences_id'] === undefined){
                    $("#selectPlcEvidencesId").removeClass('is-invalid');
                    $("#selectPlcEvidencesId").attr('title', '');
                }
                else{
                    $("#selectPlcEvidencesId").addClass('is-invalid');
                    $("#selectPlcEvidencesId").attr('title', response['error']['select_clc_evidences_id']);
                }
                if(response['error']['filter'] === undefined){
                    $("#selectPlcEvidencesFile").removeClass('is-invalid');
                    $("#selectPlcEvidencesFile").attr('title', '');
                }
                else{
                    $("#selectPlcEvidencesFile").addClass('is-invalid');
                    $("#selectPlcEvidencesFile").attr('title', response['error']['filter']);
                }
            }
            else if(response['result'] == 1){
                $("#modalSelectPlcEvidences").modal('hide');
                $("#formSelectPlcEvidences")[0].reset();
                toastr.success('Succesfully saved!');
                // dataTableClcCategoryPmiClc.draw(); // reload the tables after insertion
            }

            $("#iBtnSelectPlcEvidencesIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnChangeSelectPlcEvidences").removeAttr('disabled');
            $("#iBtnSelectPlcEvidencesIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnSelectPlcEvidencesIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnChangeSelectPlcEvidences").removeAttr('disabled');
            $("#iBtnSelectPlcEvidencesIcon").addClass('fa fa-check');
        }
    });
}

