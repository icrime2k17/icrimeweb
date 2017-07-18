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

});

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
