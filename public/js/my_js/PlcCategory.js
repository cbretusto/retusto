//============================== ADD USER ==============================
function AddPlcCategory(){
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
        url: "add_plc_category",
        method: "post",
        data: $('#formAddPlcCategory').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#BtnAddPlcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnAddPlcCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving User Failed!');

                if(response['error']['plc_category'] === undefined){
                    $("#txtAddPlcCategory").removeClass('is-invalid');
                    $("#txtAddPlcCategory").attr('title', '');
                }
                else{
                    $("#txtAddPlcCategory").addClass('is-invalid');
                    $("#txtAddPlcCategory").attr('title', response['error']['plc_category']);
                }
            }
            else if(response['result'] == 1){
                $("#modalAddPlcCategory").modal('hide');
                $("#formAddPlcCategory")[0].reset();
                toastr.success('PLC Category was succesfully saved!');
                dataTablePlcCategory.draw(); // reload the tables after insertion
            }

            $("#BtnAddPlcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddPlcCategory").removeAttr('disabled');
            $("#BtnAddPlcCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#BtnAddPlcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddPlcCategory").removeAttr('disabled');
            $("#BtnAddPlcCategoryIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT USER BY ID TO EDIT ==============================
function GetPlcCategoryID(plcCategoryID){
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
        url: "get_plc_category_by_id",
        method: "get",
        data: {
            plc_category_id: plcCategoryID
        },
        dataType: "json",
        beforeSend: function(){
        },
        success: function(response){
            let category = response['plc_category'];
            console.log(category);
            if(category.length > 0){
                $("#txtEditPLCCategory").val(category[0].plc_category);
            }
            else{
                toastr.warning('No PLC Category Record Found!');
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

//============================== EDIT PLC CATEGORY ==============================
function EditPlcCategory(){
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
        url: "edit_plc_category",
        method: "post",
        data: $('#editPlcCategoryForm').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnEditPlcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnEditPlcCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Updating PLC Category Failed!');

                if(response['error']['employee_no'] === undefined){
                    $("#txtEditPLCCategory").removeClass('is-invalid');
                    $("#txtEditPLCCategory").attr('title', '');
                }
                else{
                    $("#txtEditPLCCategory").addClass('is-invalid');
                    $("#txtEditPLCCategory").attr('title', response['error']['employee_no']);
                }

            }
            else if(response['result'] == 1){
                $("#modalEditPLCCategory").modal('hide');
                $("#editPlcCategoryForm")[0].reset();
                toastr.success('User was succesfully saved!');
                dataTablePlcCategory.draw(); // reload the tables after insertion
            }

            $("#iBtnEditPlcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditPlcCategory").removeAttr('disabled');
            $("#iBtnEditPlcCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnEditPlcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditPlcCategory").removeAttr('disabled');
            $("#iBtnEditPlcCategoryIcon").addClass('fa fa-check');
        }
    });
}

function GetPlcCategory(cboElement){
    let result = '<option value="0" selected disabled> -- PLC Categories-- </option>';
    $.ajax({
        url: 'get_plc_category',
        method: 'get',
        dataType: 'json',
        beforeSend: function(){
            result = '<option value="0" selected disabled> -- Loading -- </option>';
            cboElement.html(result);
        },
        success: function(response){
            result = '';

            if(response['plc_category'].length > 0){
                result = '<option value="0" selected disabled> -- PLC Categories -- </option>';
                for(let index = 0; index < response['plc_category'].length; index++){
                    result += '<option value="' + response['plc_category'][index].plc_category + '">' + response['plc_category'][index].plc_category + '</option>';
                }
            }
            else{
                result = '<option value="0" selected disabled> No record found </option>';
            }
            cboElement.html(result);
        }
    });
}

function DeactivatePlcCategory() {
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
        url: "deactivate_plc_category",
        method: "post",
        data: $('#deactivatePlcCategoryForm').serialize(),
        dataType: "json",
        beforeSend: function () {
            $("#deactivateplcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnDeactivatePlcCategory").prop('disabled', 'disabled');
        },
        success: function (response) {
            let result = response['result'];
            if (result == 1) {
                $("#modalDeactivatePlcCategory").modal('hide');
                $("#deactivatePlcCategoryForm")[0].reset();
                toastr.success('PLC Category successfully deactivated!');
                dataTablePlcCategory.draw();
            }
            else {
                toastr.warning('PLC Category already deactivated!');
            }

            $("#deactivateplcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnDeactivatePlcCategory").removeAttr('disabled');
            $("#deactivateplcCategoryIcon").addClass('fa fa-check');
        },
        error: function (data, xhr, status) {
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#deactivateplcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnDeactivatePlcCategory").removeAttr('disabled');
            $("#deactivateplcCategoryIcon").addClass('fa fa-check');
        }
    });
}

function ActivatePlcCategory() {
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
        url: "activate_plc_category",
        method: "post",
        data: $('#activatePlcCategoryForm').serialize(),
        dataType: "json",
        beforeSend: function () {
            $("#activatePlcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnActivatePlcCategory").prop('disabled', 'disabled');
        },
        success: function (response) {
            let result = response['result'];
            if (result == 1) {
                $("#modalActivatePlcCategory").modal('hide');
                $("#activatePlcCategoryForm")[0].reset();
                toastr.success('PLC Category successfully activated!');
                dataTablePlcCategory.draw();
            }
            else {
                toastr.warning('PLC Category already deactivated!');
            }

            $("#activatePlcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnActivatePlcCategory").removeAttr('disabled');
            $("#activatePlcCategoryIcon").addClass('fa fa-check');
        },
        error: function (data, xhr, status) {
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#activatePlcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnActivatePlcCategory").removeAttr('disabled');
            $("#activatePlcCategoryIcon").addClass('fa fa-check');
        }
    });
}

// ============================== DELETE USER ==============================
// function DeletePlcCategory(){
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
//         url: "delete_plc_category",
//         method: "post",
//         data: $('#deletePlcCategoryForm').serialize(),
//         dataType: "json",
//         beforeSend: function(){
//             $("#iBtnDeletePlcCategoryIcon").addClass('fa fa-spinner fa-pulse');
//             $("#btnDeletePlcCategory").prop('disabled', 'disabled');
//         },
//         success: function(response){
//             let result = response['result'];
//             if(result == 1){
//                 $("#modalDeletePlcCategory").modal('hide');
//                 $("#deletePlcCategoryForm")[0].reset();
//                 toastr.success('PLC Category successfully deleted');
//                 dataTablePlcCategory.draw();
//             }
//             else{
//                 toastr.warning('No PLC Category found!');
//             }

//             $("#iBtnDeletePlcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
//             $("#btnDeletePlcCategory").removeAttr('disabled');
//             $("#iBtnDeletePlcCategoryIcon").addClass('fa fa-check');
//         },
//         error: function(data, xhr, status){
//             toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
//             $("#iBtnDeletePlcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
//             $("#btnDeletePlcCategory").removeAttr('disabled');
//             $("#iBtnDeletePlcCategoryIcon").addClass('fa fa-check');
//         }
//     });
// }





