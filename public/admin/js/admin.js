function addEditServices(operation,serviceId) {  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var title = '';
    var params = '';
    if (operation == 'add') {
        title = 'Add Service Details';
        params = '';
    }else if (operation == 'edit') {
        title = 'Edit Service Details';
        params = 'service_id=' + serviceId;
    }
    var url = base_path+"services/addEditServices";
    //alert(base_path);
    $.ajax({
        type: "POST",
        url: url,
        data: params,
        
        success: function(response) {
            
            $('.modal-title').html(title);
            $('.modal-body').html(response);
            $('#myModal').modal('show');
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
}


function validateServices(operation, id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = "";
        var message = '';
        if (operation == 'edit') {
            url = base_path+"services/updateService";
            message = 'Service details updated successfully.';
        } else if (operation == 'create') {
            url = base_path+"services/createService";
            message = 'New Service successfully added.';
        }
        var params = $('#frmAddEditServices').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            
            success: function(result) {
                
                //alert(result);
                if (result == 'success') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").html(message);
                    $('#myModal').modal('hide');
                    window.location.reload();
                } else if (result == 'service_name_exist') {
                    $("#alertService").addClass('alert alert-danger');
                    $("#alertService").css('display', 'block');
                    $("#alertService").html('New Service Name is already exist');
                } else if (result == 'input_required') {
                    $("#alertService").addClass('alert alert-danger');
                    $("#alertService").css('display', 'block');
                    $("#alertService").html('Please fill all the fields');
                }

            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
}

function addEditAnimals(operation,animalTypeId) {  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var title = '';
    var params = '';
    if (operation == 'add') {
        title = 'Add Animal Details';
        params = '';
    }else if (operation == 'edit') {
        title = 'Edit Animal Details';
        params = 'animal_type_id=' + animalTypeId;
    }
    var url = base_path+"animals/addEdit";
    //alert(base_path);
    $.ajax({
        type: "POST",
        url: url,
        data: params,
        
        success: function(response) {
            
            $('.modal-title').html(title);
            $('.modal-body').html(response);
            $('#myModal').modal('show');
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
}


function validateAnimals(operation, id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = "";
        var message = '';
        if (operation == 'edit') {
            url = base_path+"animals/update";
            message = 'Animal details updated successfully.';
        } else if (operation == 'create') {
            url = base_path+"animals/create";
            message = 'New Animal successfully added.';
        }
        var params = $('#frmAddEditAnimals').serialize();
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            
            success: function(result) {
                
                //alert(result);
                if (result == 'success') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").html(message);
                    $('#myModal').modal('hide');
                    window.location.reload();
                } else if (result == 'animal_name_exist') {
                    $("#alertService").addClass('alert alert-danger');
                    $("#alertService").css('display', 'block');
                    $("#alertService").html('New Animal Name is already exist');
                } else if (result == 'input_required') {
                    $("#alertService").addClass('alert alert-danger');
                    $("#alertService").css('display', 'block');
                    $("#alertService").html('Please fill all the fields');
                }
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
}

 function confirmDeleteService(){
    var confirmMessage="Are you sure you want to delete this record?";
    $('.modal-title').html(confirmMessage);
    $('.modal-body').html("<div class='form-horizontal'><div class='form-group'><div class='col-md-6'><button type='submit' class='btn btn-primary' id='btnDeleteService'style='margin-right:10px;' >Yes</button><button type='submit' class='btn btn-default' id='btnNo' >No</button></div></div></div>");
    $('#myModal').modal('show');
    return false;           
}

function deleteService(serviceId){
    confirmDeleteService();
    $('#btnNo').click(function(){
         $('#myModal').modal('hide');     
         return false;
    });
    $('#btnDeleteService').click(function(){
        var url = "";
        var message = '';
        url = base_path + "services/deleteService";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        params = 'serviceId=' + serviceId;
        $.ajax({
            url: url,
            type: 'POST',
            data: params,
            success: function(result) {
                $('#myModal').modal('hide');
                if (result == 'success') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").html('Record deleted successfully');
                    window.location.reload();
                }else if (result == 'failed') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").addClass('alert alert-danger');
                    $("#alertMessage").html('Something went wrong');
                 }
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    });

}

 function confirmDeleteAnimals(){
    var confirmMessage="Are you sure you want to delete this record?";
    $('.modal-title').html(confirmMessage);
    $('.modal-body').html("<div class='form-horizontal'><div class='form-group'><div class='col-md-6'><button type='submit' class='btn btn-primary' id='btnDeleteAnimal'style='margin-right:10px;' >Yes</button><button type='submit' class='btn btn-default' id='btnNo' >No</button></div></div></div>");
    $('#myModal').modal('show');
    return false;           
}

function deleteAnimal(animalTypeId){
    confirmDeleteAnimals();
    $('#btnNo').click(function(){
         $('#myModal').modal('hide');     
         return false;
    });
    $('#btnDeleteAnimal').click(function(){
        var url = "";
        var message = '';
        url = base_path + "animals/deleteAnimal";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        params = 'animalTypeId=' + animalTypeId;
        $.ajax({
            url: url,
            type: 'POST',
            data: params,
            success: function(result) {
                $('#myModal').modal('hide');
                if (result == 'success') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").html('Record deleted successfully');
                    window.location.reload();
                }else if (result == 'failed') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").addClass('alert alert-danger');
                    $("#alertMessage").html('Something went wrong');
                 }
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    });

}

function addEditServiceAnimals(operation,serviceId) {  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var title = '';
    var params = '';
    if (operation == 'add') {
        title = 'Add Service Details';
        params = '';
    }else if (operation == 'edit') {
        title = 'Edit Service Details';
        params = 'service_id=' + serviceId;
    }
    var url = base_path+"services/addEditServiceAnimals";
    $.ajax({
        type: "POST",
        url: url,
        data: params,
        
        success: function(response) {
            
            $('.modal-title').html(title);
            $('.modal-body').html(response);
               $('#animals').multiselect();
            $('#myModal').modal('show');
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
}


function validateServiceAnimals(roleOperation) {
    var frmName = 'frmAddEditServicesAnimals';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = "";
        var message = 'Service Assigned successfully';
        if (roleOperation == 'edit') {
            url = base_path+"services/updateServiceAnimals";
          } else if (roleOperation == 'create') {
            url = base_path+"services/updateServiceAnimals";
        }
        var url = url;
        var params = $('#' + frmName).serialize();
        $.ajax({
            url: url,
            type: 'POST',
            data: params,
            
            success: function(result) {
                
                if (result == 'success') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").html(message);
                    $('#myModal').modal('hide');
                    window.location.reload();
                } 
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
}


function confirmDeleteServiceAnimal(){
    var confirmMessage="Are you sure you want to delete this record?";
    $('.modal-title').html(confirmMessage);
    $('.modal-body').html("<div class='form-horizontal'><div class='form-group'><div class='col-md-6'><button type='submit' class='btn btn-primary' id='btnDeleteService'style='margin-right:10px;' >Yes</button><button type='submit' class='btn btn-default' id='btnNo' >No</button></div></div></div>");
    $('#myModal').modal('show');
    return false;           
}

function deleteServiceAnimal(serviceId){
    confirmDeleteServiceAnimal();
    $('#btnNo').click(function(){
         $('#myModal').modal('hide');     
         return false;
    });
    // alert(2);
    $('#btnDeleteService').click(function(){
        var url = "";
        var message = '';
        url = base_path + "services/deleteServiceAnimal";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        params = 'serviceId=' + serviceId;
        $.ajax({
            url: url,
            type: 'POST',
            data: params,
            success: function(result) {
                $('#myModal').modal('hide');
                if (result == 'success') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").html('Record deleted successfully');
                    window.location.reload();
                }else if (result == 'failed') {
                    $("#alertMessage").css('display', 'block');
                    $("#alertMessage").addClass('alert alert-danger');
                    $("#alertMessage").html('Something went wrong');
                 }
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    });

}




