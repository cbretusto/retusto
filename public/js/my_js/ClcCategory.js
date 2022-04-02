//============================== ADD USER ==============================
function AddClcCategory(){
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
        url: "add_clc_category",
        method: "post",
        data: $('#formAddClcCategory').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnAddClcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnAddClcCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving Failed!');
                if(response['error']['category'] === undefined){
                    $("#txtAddClcCategory").removeClass('is-invalid');
                    $("#txtAddClcCategory").attr('title', '');
                }
                else{
                    $("#txtAddClcCategory").addClass('is-invalid');
                    $("#txtAddClcCategory").attr('title', response['error']['category']);
                }
            }
            else if(response['result'] == 1){
                $("#modalAddClcCategory").modal('hide');
                $("#formAddClcCategory")[0].reset();
                toastr.success('Succesfully saved!');
                dataTableClcCategory.draw(); // reload the tables after insertion
            }

            $("#iBtnAddClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddClcCategory").removeAttr('disabled');
            $("#iBtnAddClcCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnAddClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnAddClcCategory").removeAttr('disabled');
            $("#iBtnAddClcCategoryIcon").addClass('fa fa-check');
        }
    });
}

//============================== EDIT USER BY ID TO EDIT ==============================
function GetClcCategoryByIdToEdit(clc_categoryId){
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
        url: "get_clc_category_by_id",
        method: "get",
        data: {
            clc_categories_id: clc_categoryId
        },
        dataType: "json",
        beforeSend: function(){    
        },
        success: function(response){
            let clc_category_id = response['clc_category_id'];
            if(clc_category_id.length > 0){
                $("#txtEditClcCategory").val(clc_category_id[0].category);
                $('#modalEditClcCategory').on('hide', function() {
                    dataTableClcCategory.draw(); // reload the tables after insertion
                });
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

//============================== EDIT USER ==============================
function EditClcCategory(){
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
        url: "edit_clc_category",
        method: "post",
        data: $('#formEditClcCategory').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnEditClcCategoryIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnEditClcCategory").prop('disabled', 'disabled');
        },
        success: function(response){
            if(response['validation'] == 'hasError'){
                toastr.error('Saving Failed!');
                if(response['error']['category'] === undefined){
                    $("#txtEditClcCategory").removeClass('is-invalid');
                    $("#txtEditClcCategory").attr('title', '');
                }
                else{
                    $("#txtEditClcCategory").addClass('is-invalid');
                    $("#txtEditClcCategory").attr('title', response['error']['category']);
                }
            }
            else if(response['result'] == 1){
                $("#modalEditClcCategory").modal('hide');
                $("#formEditClcCategory")[0].reset();
                toastr.success('Succesfully saved!');
                dataTableClcCategory.draw(); // reload the tables after insertion
            }

            $("#iBtnEditClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditClcCategory").removeAttr('disabled');
            $("#iBtnEditClcCategoryIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnEditClcCategoryIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnEditClcCategory").removeAttr('disabled');
            $("#iBtnEditClcCategoryIcon").addClass('fa fa-check');
        }
    });
}


//============================== CHANGE USER STATUS ==============================
function ChangeClcCategoryStatus(){
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
        url: "change_clc_category_stat",
        method: "post",
        data: $('#formChangeClcCategoryStat').serialize(),
        dataType: "json",
        beforeSend: function(){
            $("#iBtnChangeClcCategoryStatIcon").addClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryStat").prop('disabled', 'disabled');
        },
        success: function(response){

            if(response['validation'] == 'hasError'){
                toastr.error('Category activation failed!');
            }else{
                if(response['result'] == 1){
                    if($("#txtChangeClcCategoryStat").val() == 1){
                        toastr.success('Activation success!');
                        $("#txtChangeClcCategoryStat").val() == 2;
                    }
                    else{
                        toastr.success('Deactivation success!');
                        $("#txtChangeClcCategoryStat").val() == 1;
                    }
                }
                $("#modalChangeClcCategoryStat").modal('hide');
                $("#formChangeClcCategoryStat")[0].reset();
                dataTableClcCategory.draw();
            }

            $("#iBtnChangeClcCategoryStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryStat").removeAttr('disabled');
            $("#iBtnChangeClcCategoryStatIcon").addClass('fa fa-check');
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
            $("#iBtnChangeClcCategoryStatIcon").removeClass('fa fa-spinner fa-pulse');
            $("#txtChangeClcCategoryStat").removeAttr('disabled');
            $("#iBtnChangeClcCategoryStatIcon").addClass('fa fa-check');
        }
    });
}

// ============================================= GET CLC CATEGORY =============================================
function GetClcCategory(cboElement){
    let result = '<option value="0" selected disabled> -- Select Categories -- </option>';
    $.ajax({
        url: 'get_clc_category',
        method: 'get',
        dataType: 'json',
        beforeSend: function(){
            result = '<option value="0" selected disabled> -- Loading -- </option>';
            cboElement.html(result);
        },
        success: function(response){
            result = '';
            
            if(response['clc_categories'].length > 0){
                result = '<option value="0" selected disabled> -- Select Categories -- </option>';
                for(let index = 0; index < response['clc_categories'].length; index++){
                    result += '<option value="' + response['clc_categories'][index].category + '">' + response['clc_categories'][index].category + '</option>';
                }
            }
            else{
                result = '<option value="0" selected disabled> No record found </option>';
            }
            cboElement.html(result);
        }
    });
}