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
        AddAppUser(data);
        return false;
    });
    
    $('#update_app_user_form').submit(function(){
        var data = $(this).serialize();
        UpdateUser(data);
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
            text: "You will not be able to recover this record!",
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
            $('.police-form').html('Add Police Station');
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
    
    $('.add-wanted').click(function(){
        if(!$(this).hasClass('toggled'))
        {
            $(this).addClass('toggled');
            $('.wanted-list-form').hide();
            $('.wanted-form-holder').fadeIn();
        }
        else
        {
            $(this).removeClass('toggled');
            $('.wanted-form-holder').hide();
            $('.wanted-list-form').fadeIn();
            $("#wantedform")[0].reset();
            $('.btn-submit').val("Submit");
        }
    });
    
    $('.add-blotter').click(function(){
        if(!$(this).hasClass('toggled'))
        {
            $(this).addClass('toggled');
            $('.blotters').hide();
            $('.blotter-form-map').addClass('show');
            $('.blotter-form').html('Add Blotter');
        }
        else
        {
            $(this).removeClass('toggled');
            $('.blotters').show();
            $('.blotter-form-map').removeClass('show');
            $("#blotterform")[0].reset();
            $('.btn-submit').val("Submit");
        }
        
    });
    
    $(".main-container").on("click", ".add-suspect",function()
    {
        $(".suspect-data-container").append($("#suspect-form-template").html());
        var ctr = 1;
        $(".suspect-data-container").find(".form-caption").each(function(){
            $(this).html("<div class='col-xs-12 caption-holder'><span class='caption'>SUSPECT "+ctr+"</span><span class='clear'>x</span></div>");
            ctr++;
        });
    });
    
    $(".main-container").on("click", ".add-victim",function()
    {
        $(".victim-data-container").append($("#victim-form-template").html());
        var ctr = 1;
        $(".victim-data-container").find(".form-caption").each(function(){
            $(this).html("<div class='col-xs-12 caption-holder'><span class='caption'>VICTIM "+ctr+"</span><span class='clear'>x</span>");
            ctr++;
        });
    });
    
    $(".main-container").on("click", ".add-child",function()
    {
        $(".child-data-container").append($("#child-form-template").html());
        var ctr = 1;
        $(".child-data-container").find(".form-caption").each(function(){
            $(this).html("<div class='col-xs-12 caption-holder'><span class='caption'>CHILD IN CONFLICT WITH THE LAW "+ctr+"</span><span class='clear'>x</span>");
            ctr++;
        });
    });
    
    $(".main-container").on("click", ".clear",function()
    {
        var element = $(this);
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
          },
          function(){
                $(element).parents(".data-form").remove();

                var ctr = 1;
                $(".suspect-data-container").find(".form-caption").each(function(){
                    $(this).html("<div class='col-xs-12 caption-holder'><span class='caption'>SUSPECT "+ctr+"</span><span class='clear'>x</span></div>");
                    ctr++;
                });

                var ctr = 1;
                $(".victim-data-container").find(".form-caption").each(function(){
                    $(this).html("<div class='col-xs-12 caption-holder'><span class='caption'>VICTIM "+ctr+"</span><span class='clear'>x</span>");
                    ctr++;
                });
                
                var ctr = 1;
                $(".child-data-container").find(".form-caption").each(function(){
                    $(this).html("<div class='col-xs-12 caption-holder'><span class='caption'>CHILD IN CONFLICT WITH THE LAW "+ctr+"</span><span class='clear'>x</span>");
                    ctr++;
                });
                
                swal("Deleted!", "Record successfully removed.", "success");
          });
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
    
    $('.stations-list').on("click",'.delete_record',function(){
        var id = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
          },
          function(){
                DeleteStation(id);
          });
    });
    
    $("#wantedform").submit(function(){
       loading(); 
    });

    $('.wanted-list').on("click",".edit_record",function(){
        var id = $(this).attr("data-id");
        LoadWantedEditMode(id);
    });
    
    $('.wanted-list').on("click",'.delete_record',function(){
        var id = $(this).attr('data-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
            showLoaderOnConfirm: true
          },
          function(){
                DeleteWanted(id);
          });
    });
    
    $("#blotterform").submit(function(){
        var data = $("#blotterform").serialize();
        var lat = map.getCenter().lat();
        var long = map.getCenter().lng();
        data += '&lat='+lat;
        data += '&long='+long;
        
        $.ajax({
            url : '/admin/AddBlotter',
            method : 'POST',
            data : data,
            dataType : "json",
            beforeSend : function(){
                loading();
            },
            success : function(data){
                if(data.success)
                {
                    $("#blotterform")[0].reset();
                    $(".suspect-data-container").html();
                    $(".child-data-container").html();
                    $(".victim-data-container").html();
                    LoadBlotters();
                    $('.add-blotter').trigger("click");
                    swal("Good job!", "Blotter successfully added!", "success");
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
});

var UpdateUser = function(data)
{
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
};

var AddAppUser = function(data)
{    
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
};

var LoadWantedList = function()
{
    $.ajax({
        url : '/admin/WantedListAjax',
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

var DeleteWanted = function(id)
{
    $.ajax({
            url : '/admin/DeleteWanted',
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
                    LoadWantedList();
                    swal("Deleted!", "Wanted has been deleted.", "success");
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

var LoadWantedEditMode = function(id)
{
    var frm = $("#wantedform");
    $.ajax({
            url : '/admin/GetWantedById',
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
                    
                    $('.add-wanted').trigger("click");
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

var DeleteStation = function(id)
{
    $.ajax({
            url : '/admin/DeleteStation',
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
                    LoadPoliceStations();
                    swal("Deleted!", "Station has been deleted.", "success");
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
                    $('.police-form').html('Update Police Station');
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
                    swal("Deleted!", "User has been deleted.", "success");
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
                    if(data.info.is_admin == 1)
                    {
                        $("#is-admin-update").prop("checked",true);
                    }
                    else
                    {
                        $("#is-admin-update").prop("checked",false);
                    }
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

var LoadBlotters = function()
{
    $.ajax({
            url : '/admin/blottersAjax',
            method : 'POST',
            data : null,
            dataType : "json",
            beforeSend : function(){
                //loading();
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
                
                //dismissLoading();
            },
            error : function(){
                //dismissLoading();
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
