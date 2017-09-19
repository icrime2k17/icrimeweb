<script>
    var crime_report_id = <?php echo $report_id; ?>;
    $(document).ready(function(){
        $(".add-blotter").trigger("click");
        $.ajax({
            url : '/admin/GetCrimeReportById',
            method : 'POST',
            data : {
                id :crime_report_id
            },
            dataType : "json",
            beforeSend : function(){
                loading();
            },
            success : function(data){
                if(data.success)
                {
                    console.log(data);
                    $("#type_of_incident").val(data.info.crime);
                    $("#date_reported").val(data.info.date);
                    $("#time_reported").val(data.info.time);
                    $("#date_of_incident").val(data.info.date);
                    $("#time_of_incident").val(data.info.time);
                    $("#place_of_incident").val(data.info.address);
                    $("#narrative").val(data.info.details);

                    map.setCenter({
                        lat:parseFloat(data.info.g_lat),
                        lng:parseFloat(data.info.g_long)
                    });
                    
                    map.setZoom(17);
                    
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
    });
</script>