<div class="col-xs-12">
    <h1>Crime Reports</h1>
    <table class="table table-striped table-hover">
      <tr>
        <td>Crime</td>
        <td><?php echo $crime; ?></td>
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
        <td>Image</td>
        <td><?php echo $image; ?></td>
      </tr>
<!--      <tr>
        <td>Status</td>
        <td><?php //echo $status; ?></td>
      </tr>-->
  </table>
</div>
<div id="mapView" class="col-xs-12" style="margin-bottom: 30px;"></div>

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
</script>