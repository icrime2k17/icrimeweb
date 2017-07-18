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
