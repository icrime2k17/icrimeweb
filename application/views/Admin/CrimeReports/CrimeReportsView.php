<div class="col-xs-12">
    <h1 class="inline-header">Crime Report</h1>
    <div class="pull-right">
        <a href="/admin/blotters/?report_id=<?php echo $id; ?>">
            <button class="btn btn-info">
                CREATE BLOTTER
            </button>
        </a>
    </div>
    <table class="table table-striped table-hover" style="margin-top: 10px;">
      <tr>
        <td>Crime</td>
        <td><?php echo $crime; ?></td>
      </tr>
      <tr>
        <td>Type</td>
        <td><?php echo $type; ?></td>
      </tr>
      <tr>
        <td>Date/Time Reported</td>
        <td><?php echo $date_reported; ?></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><?php echo $address; ?></td>
      </tr>
      <tr>
        <td>Details</td>
        <td><?php echo $details; ?></td>
      </tr>
      <tr>
        <td>Reported By</td>
        <td><?php echo $user_name; ?></td>
      </tr>
      <tr>
        <td>User Mobile Number</td>
        <td><?php echo $user_mobile; ?></td>
      </tr>
      <tr>
        <td>User Address</td>
        <td><?php echo $user_address; ?></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><?php echo $image; ?></td>
      </tr>
<!--      <tr>
        <td>Status</td>
        <td><?php //echo $status; ?></td>
      </tr>-->
  </table>
</div>
<div id="mapView" class="col-xs-12" style="margin-bottom: 15px;"></div>
<div class="col-xs-12 no-gutter" style="margin-bottom: 30px;">
    <h2>Comments</h2>
    <div id="comments_list" class="col-xs-12 no-gutter">
    </div>
    <div class="col-xs-11 no-gutter">
        <textarea id="comment" class="form-control" placeholder="Comment" style="width: 100%; height: 50px"></textarea>
    </div>
    <div class="col-xs-1" style="padding-left: 5px; padding-right: 0;">
        <input type="hidden" id="crime_report_id" value="<?php echo $id; ?>">
        <button type="button" class="btn btn-info btn-block comment-submit" style="height: 50px">Submit</button>
    </div>
</div>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBt7c-kXucRO6GyORCLgGT2_GNzDuiZ4mk&callback=initMap">
</script>

<script>
function initMap() {
    
    var place = {lat: <?php echo $g_lat ?>, lng: <?php echo $g_long ?>};
    window.map = new google.maps.Map(document.getElementById('mapView'), {
      zoom: 17,
      center: place,
      disableDefaultUI: true
    });
    
    var marker = new google.maps.Marker({
          position: place,
          map: map
        });
}

$(document).ready(function(){
   RenderComments(); 
});
</script>