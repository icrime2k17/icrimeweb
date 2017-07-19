/* 
 * @Author: Jethro A. Acosta
 * June 21, 2017
 */

$(document).ready(function()
{
    $('.add-app-user').click(function(){
        $("#add-app-user-modal").modal();
    });
    
    $('#app_user_form').submit(function(){
        var data = $(this).serialize();
        $.ajax({
            url : '/admin/AddAppUser',
            method : 'POST',
            data : data,
            dataType : "json",
            beforeSend : function(){
                loading();
            },
            success : function(data){
                if(data.success)
                {
                    $('#app_user_form')[0].reset();
                    $("#add-app-user-modal").modal('hide');
                    LoadAppUsers();
                    swal("Good job!", "User successfully added!", "success");
                }
                else
                {
                    swal("Error", "Error connecting to server.", "error");
                }
                
                dismissLoading();
            },
            error : function(){
                dismissLoading();
                swal("Error", "Error connecting to server.", "error");
            }
        });
        
        return false;
    });
    
    $('#update_app_user_form').submit(function(){
        var data = $(this).serialize();
        $.ajax({
            url : '/admin/UpdateAppUser',
            method : 'POST',
            data : data,
            dataType : "json",
            beforeSend : function(){
                loading();
            },
            success : function(data){
                if(data.success)
                {
                    $('#update_app_user_form')[0].reset();
                    $("#update-app-user-modal").modal('hide');
                    LoadAppUsers();
                    swal("Good job!", "User successfully updated!", "success");
                }
                else
                {
                    swal("Error", "Error connecting to server.", "error");
                }
                
                dismissLoading();
            },
            error : function(){
                dismissLoading();
                swal("Error", "Error connecting to server.", "error");
            }
        });
        
        return false;
    });
    
    $('#appUsersBody').on("click",'.edit_app_user',function(){
        var id = $(this).attr('data-id');
        LoadAppUserEditMode(id);
    });
    
    $('#appUsersBody').on("click",'.delete_app_user',function(){
        var id = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
          },
          function(){
                DeleteAppUser(id);
          });
    });
    
    $('.add-station').click(function(){
        if(!$(this).hasClass('toggled'))
        {
            $(this).addClass('toggled');
            $('.police-stations').hide();
            $('.map').addClass('show');
        }
        else
        {
            $(this).removeClass('toggled');
            $('.police-stations').show();
            $('.map').removeClass('show');
            $("#stationform")[0].reset();
            $('.btn-submit').val("Submit");
        }
        
    });
    
    $("#stationform").submit(function(){
        var data = $(this).serialize();
        var lat = map.getCenter().lat();
        var long = map.getCenter().lng();
        data += '&lat='+lat;
        data += '&long='+long;
        
        var mode = $('.btn-submit').val();
        
        if(mode == 'Submit')
        {
            SaveStation(data);
        }
        else
        {
            UpdateStation(data);
        }

        return false;
    });
    
    $('.stations-list').on("click",".edit_record",function(){
        var id = $(this).attr("data-id");
        LoadPoliceStationsEditMode(id);
    });

});

var SaveStation = function(data)
{
    $.ajax({
        url : '/admin/AddStation',
        method : 'POST',
        data : data,
        dataType : "json",
        beforeSend : function(){
            loading();
        },
        success : function(data){
            if(data.success)
            {
                $('#stationform')[0].reset();
                LoadPoliceStations();
                swal("Good job!", "Police station successfully saved!", "success");
            }
            else
            {
                swal("Error", "Error connecting to server.", "error");
            }

            dismissLoading();
        },
        error : function(){
            dismissLoading();
            swal("Error", "Error connecting to server.", "error");
        }
    });
};

var UpdateStation = function(data)
{
    $.ajax({
        url : '/admin/UpdateStation',
        method : 'POST',
        data : data,
        dataType : "json",
        beforeSend : function(){
            loading();
        },
        success : function(data){
            if(data.success)
            {
                LoadPoliceStations();
                swal("Good job!", "Police station successfully updated!", "success");
            }
            else
            {
                swal("Error", "Error connecting to server.", "error");
            }

            dismissLoading();
        },
        error : function(){
            dismissLoading();
            swal("Error", "Error connecting to server.", "error");
        }
    });
};

var LoadPoliceStationsEditMode = function(id)
{
    var frm = $("#stationform");
    $.ajax({
            url : '/admin/GetStationById',
            method : 'POST',
            data : {
                id :id
            },
            dataType : "json",
            beforeSend : function(){
                loading();
            },
            success : function(data){
                if(data.success)
                {
                    $.each(data.info, function(key, value){
                        $('[name='+key+']', frm).val(value);
                    });
                    
                    map.setCenter({
                        lat:parseFloat(data.info.g_lat),
                        lng:parseFloat(data.info.g_long)
                    });
                    
                    map.setZoom(17);
                    
                    $('.add-station').trigger("click");
                }
                else
                {
                    swal("Error", "Error connecting to server.", "error");
                }
                
                dismissLoading();
            },
            error : function(){
                dismissLoading();
                swal("Error", "Error connecting to server.", "error");
            }
        });
}

var LoadPoliceStations = function()
{
    $.ajax({
        url : '/admin/StationsAjax',
        method : 'POST',
        data : null,
        dataType : "json",
        beforeSend : function(){
            loading();
        },
        success : function(data){
            if(data.success)
            {
                $("#tableBody").html(data.list);
            }
            else
            {
                swal("Error", "Error connecting to server.", "error");
            }

            dismissLoading();
        },
        error : function(){
            dismissLoading();
            swal("Error", "Error connecting to server.", "error");
        }
    });
};

var DeleteAppUser = function(id)
{
    $.ajax({
            url : '/admin/DeleteAppUser',
            method : 'POST',
            data : {
                id :id
            },
            dataType : "json",
            beforeSend : function(){
                loading();
            },
            success : function(data){
                if(data.success)
                {
                    LoadAppUsers();
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                }
                else
                {
                    swal("Error", "Error connecting to server.", "error");
                }
                
                dismissLoading();
            },
            error : function(){
                dismissLoading();
                swal("Error", "Error connecting to server.", "error");
            }
        });
};

var LoadAppUserEditMode = function(id)
{
    $.ajax({
            url : '/admin/GetAppUserById',
            method : 'POST',
            data : {
                id :id
            },
            dataType : "json",
            beforeSend : function(){
                loading();
            },
            success : function(data){
                if(data.success)
                {
                    $("#edit_id").val(data.info.id);
                    $("#edit_firstname").val(data.info.firstname);
                    $("#edit_lastname").val(data.info.lastname);
                    $("#edit_username").val(data.info.username);
                    $("#edit_position").val(data.info.position);
                    $("#update-app-user-modal").modal();
                }
                else
                {
                    swal("Error", "Error connecting to server.", "error");
                }
                
                dismissLoading();
            },
            error : function(){
                dismissLoading();
                swal("Error", "Error connecting to server.", "error");
            }
        });
};

var LoadAppUsers = function()
{
    $.ajax({
            url : '/admin/AppUsersAjax',
            method : 'POST',
            data : null,
            dataType : "json",
            beforeSend : function(){
                loading();
            },
            success : function(data){
                if(data.success)
                {
                    $("#add-app-user-modal").modal('hide');
                    $("#appUsersBody").html(data.list);
                }
                else
                {
                    swal("Error", "Error connecting to server.", "error");
                }
                
                dismissLoading();
            },
            error : function(){
                dismissLoading();
                swal("Error", "Error connecting to server.", "error");
            }
        });
};

var loading = function()
{
    $('.loader').slideDown();
};

var dismissLoading = function()
{
    $('.loader').slideUp();
};
