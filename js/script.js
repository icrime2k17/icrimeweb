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
                    $("#add-app-user-modal").modal('hide');
                    swal("Good job!", "User successfully added!", "success")
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

var loading = function()
{
    $('.loader').slideDown();
};

var dismissLoading = function()
{
    $('.loader').slideUp();
};
