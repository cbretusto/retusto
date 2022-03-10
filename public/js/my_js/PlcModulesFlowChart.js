//============================== ADD FLOW CHART==============================
function AddFlowChart(){
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

    let formData = new FormData($('#formAddFlowChart')[0]);

	$.ajax({
        url: "add_flow_chart",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#BtnAddFlowChartIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnAddFlowChart").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving Failed!');

                if(response['error']['name_of_process_owner'] === undefined){
                    $("#txtAddNameofProcessOwner").removeClass('is-invalid');
                    $("#txtAddNameofProcessOwner").attr('title', '');
                }
                else{
                    $("#txtAddNameofProcessOwner").addClass('is-invalid');
                    $("#txtAddNameofProcessOwner").attr('title', response['error']['name_of_process_owner']);
                }

                if(response['error']['uploaded_flow_chart'] === undefined){
                    $("#txtAddUploadedFlowChart").removeClass('is-invalid');
                    $("#txtAddUploadedFlowChart").attr('title', '');
                }
                else{
                    $("#txtAddUploadedFlowChart").addClass('is-invalid');
                    $("#txtAddUploadedFlowChart").attr('title', response['error']['uploaded_flow_chart']);
                }


                if(response['error']['flow_chart_uploaded_date'] === undefined){
                    $("#txtAddFlowChartUploadedDate").removeClass('is-invalid');
                    $("#txtAddFlowChartUploadedDate").attr('title', '');
                }
                else{
                    $("#txtAddFlowChartUploadedDate").addClass('is-invalid');
                    $("#txtAddFlowChartUploadedDate").attr('title', response['error']['flow_chart_uploaded_date']);
                }

                if(response['error']['name_of_uploader_flow_chart'] === undefined){
                    $("#txtAddNameofUploaderFlowChart").removeClass('is-invalid');
                    $("#txtAddNameofUploaderFlowChart").attr('title', '');
                }
                else{
                    $("#txtAddNameofUploaderFlowChart").addClass('is-invalid');
                    $("#txtAddNameofUploaderFlowChart").attr('title', response['error']['name_of_uploader_flow_chart']);
                }
            }
            else if(response['result'] == 1){
                $("#modalAddFlowChart").modal('hide');
                $("#formAddFlowChart")[0].reset();
                toastr.success('Succesfully Saved!');
                dataTablePlcModuleFlowChart.draw(); // reload the tables after insertion
            }
            else if(response['result'] == 0){
                $("#modalAddFlowChart").modal('hide');
                $("#formAddFlowChart")[0].reset();
                toastr.success("Succesfully Saved!" + ' ' + "<span class='text-warning'>Upload your file to finish your report</span>");
                dataTablePlcModuleFlowChart.draw(); // reload the tables after insertion
            }
            else if(response['result'] == 2){
                $("#modalAddFlowChart").modal('hide');
                $("#formAddFlowChart")[0].reset();
                toastr.error("Invalid File type. Please upload excel file only.");
                dataTablePlcEvidences.draw(); // reload the tables after insertion
            }

            $("#BtnAddFlowChartIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddFlowChart").removeAttr('disabled');
            $("#BtnAddFlowChartIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#BtnAddFlowChartIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddFlowChart").removeAttr('disabled');
            $("#BtnAddFlowChartIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT USER BY ID TO EDIT ==============================
function GetFlowChart(flowChartID){
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
        url: "get_flow_chart_id",
        method: "get",
        data: {
            flow_chart_id: flowChartID,
            // plc_evidences_uploadedby: plcEvidencesUplodedBy
        },
        dataType: "json",
        beforeSend: function(){
        },
        success: function(response){
            let flowChart = response['flow_chart'];
            // console.log(flowChart);
            if(flowChart.length > 0){
                $("#txtEditProcessOwnerId").val(flowChart[0].process_owner);
                $("#txtEditReuploadedFlowChart").val(flowChart[0].flow_chart)
                $('#modalEditFlowChart').on('hide', function() {
                    window.location.reload();
                });
                $('#check_box').on('click', function() {
                    $('#check_box').attr('checked', 'checked');
                    if($(this).is(":checked")){
                        $("#txtEditReuploadedFlowChart").addClass('d-none');
                        $("#txtEditUploadedFlowChart").removeClass('d-none');
                        $("#btnEditFlowChart").removeClass('d-none');
                    }
                    else{
                        $("#txtEditReuploadedFlowChart").removeClass('d-none');
                        $("#txtEditUploadedFlowChart").addClass('d-none');
                        $("#btnEditFlowChart").addClass('d-none');
                    }
                    $(document).ready(function(){
                        $('#modalEditFlowChart').on('hide.bs.modal', function() {
                            $('#check_box').attr('checked', false);
                            window.location.reload();
                        });
                    });
                });

            }
            else{
                toastr.warning('No Flow Chart Record Found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

//============================== EDIT PLC EVIDENCES ==============================
function EditFlowChart(){
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

    let formData = new FormData($('#editFlowChartForm')[0]);

    $.ajax({
        url: "edit_flow_chart",
        method: "post",
        processData: false,
        contentType: false,
        data: formData,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnEditFlowChartIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnEditFlowChart").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Updating Flow Chart Failed!');

            }
            else if(response['result'] == 1){
                toastr.success('Flow Chart was succesfully updated!');
                $("#modalEditFlowChart").modal('hide');
                $("#editFlowChartForm")[0].reset();
                dataTablePlcModuleFlowChart.draw(); // reload the tables after insertion
                // dataTableRevisedPlcEvidences.draw();
            }
            else if(response['result'] == 2){
                // $("#modalAddPlcEvidences").modal('hide');
                // $("#formAddPlcEvidences")[0].reset();
                toastr.error("Invalid File type. Please upload PDF file only.");
                dataTablePlcModuleFlowChart.draw(); // reload the tables after insertion
            }

            $("#iBtnEditFlowChartIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditFlowChart").removeAttr('disabled');
            $("#iBtnEditFlowChartIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnEditFlowChartIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditFlowChart").removeAttr('disabled');
            $("#iBtnEditFlowChartIcon").addClass('fa fa-check');
        }
    });
}