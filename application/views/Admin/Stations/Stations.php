<h1>Police Stations</h1>
<div class="col-xs-12 police-stations">
    <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Police Station</th>
        <th>District</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="tableBody">
      <?php echo $list; ?>
    </tbody>
  </table>
</div>
<div class="col-xs-12 map">
    <div class="col-xs-3 stationformholder">
        <form id="stationform">
            <div class="form-group">
                <label for="usr">Police Station:</label>
                <input type="text" class="form-control input-sm" id="station" name="station" required>
            </div>
            <div class="form-group">
                <label for="usr">District:</label>
                <input type="text" list="district_list" class="form-control input-sm" id="district" name="district" required>
                <datalist id="district_list">
                    <?php echo $district_list ?>
                </datalist>
            </div>
            <div class="form-group">
                <label for="usr">Address:</label>
                <input type="text" class="form-control input-sm" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="pwd">Phone Number:</label>
                <input type="tel" class="form-control input-sm" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="pwd">Chief of Police:</label>
                <input type="text" class="form-control input-sm" id="chief" name="chief" required>
            </div>
            <div class="form-group">
                <label for="pwd">Chief of Police phone number:</label>
                <input type="tel" class="form-control input-sm" id="chief_phone" name="chief_phone" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-submit pull-right">
            </div>
        </form>
    </div>
    <div class="col-xs-9 map-holder">
        <div id="map" class="col-xs-12"></div>
        <input type="text" id="search" class="form-control">
    </div>
</div>
<span class="floating-button add-station">
    <i class="fa fa-plus" aria-hidden="true"></i>
</span>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBt7c-kXucRO6GyORCLgGT2_GNzDuiZ4mk&callback=initMap">
</script>

<script>
function initMap() {
    
    var qc = {lat: 14.676041, lng: 121.043700};
    window.map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: qc,
      disableDefaultUI: true
    });
    window.gmgeocoder = new google.maps.Geocoder();
    var infoWindow = new google.maps.InfoWindow({map: map});
    infoWindow.close();
    //AutoComplete Code
    var inputSearch = document.getElementById('search');
    var autocomplete = new google.maps.places.Autocomplete(inputSearch);
    autocomplete.bindTo('bounds', map);
    var searchMarker = new google.maps.Marker({
      map: map,
      anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
      infoWindow.close();
      searchMarker.setVisible(false);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("Please refer to the suggested places on dropdown.");
        return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);  // Why 17? Because it looks good.
      }
      searchMarker.setIcon(/** @type {google.maps.Icon} */({
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(35, 35)
      }));
      searchMarker.setPosition(place.geometry.location);
      searchMarker.setVisible(true);

      var address = '';
      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

      infoWindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
      infoWindow.open(map, searchMarker);
    });

    //End of AutoComplete Code

  // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        CURRENT_POSITION = pos;
        var BLUE_MARKER = {
            url: 'img/police.svg', // url
            scaledSize: new google.maps.Size(50, 50), // scaled size
            origin: new google.maps.Point(0,0), // origin
        };
        addMarker(0,pos,false,BLUE_MARKER);

//          infoWindow.setPosition(pos);
//          infoWindow.setContent('Location found.');
        map.setCenter(pos);
        map.setZoom(16);
      }, function() {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
//      infoWindow.setPosition(pos);
//      infoWindow.setContent(browserHasGeolocation ?
//                            'Error: The Geolocation service failed.' :
//                            'Error: Your browser doesn\'t support geolocation.');
}

</script>