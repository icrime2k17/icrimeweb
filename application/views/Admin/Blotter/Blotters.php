<div class="col-xs-12 blotters">
    <h1>Blotters</h1>
    <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Entry Number</th>
        <th>Incident</th>
        <th>Place of Incident</th>
        <th>Date Reported</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="tableBody" class="blotters-list">
      <?php echo $list; ?>
    </tbody>
  </table>
    <div class="col-xs-12">
        <?php echo $pagination ?>
    </div>
</div>

<datalist id="crimes">
  <?php echo $crimes_list ?>
</datalist>

<div class="col-xs-12 blotter-form-map">
    <h1 class="blotter-form">Add Blotter</h1>
    <div class="col-xs-12 blotterformholder">
        <form id="blotterform" method="post">
            <div class="form-group col-sm-4">
                <label>Type of incident:</label>
                <input type="text" class="form-control input-sm" id="type_of_incident" name="type_of_incident" list="crimes" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Date reported:</label>
                <input type="date" class="form-control input-sm" id="date_reported" name="date_reported" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Time reported:</label>
                <input type="time" class="form-control input-sm" id="time_reported" name="time_reported" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Date of incident:</label>
                <input type="date" class="form-control input-sm" id="date_of_incident" name="date_of_incident" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Time of incident:</label>
                <input type="time" class="form-control input-sm" id="time_of_incident" name="time_of_incident" required>
            </div>
            <div class="form-group col-sm-4">
                <label>Place of incident:</label>
                <input type="text" class="form-control input-sm" id="place_of_incident" name="place_of_incident" required>
            </div>
            <div class="col-sm-12">
                <h3>ITEM "A" REPORTING PERSON</h3>
            </div>
            <div class="form-group col-sm-3">
                <label>Last name:</label>
                <input type="text" class="form-control input-sm" id="r_lname" name="r_lname" required>
            </div>
            <div class="form-group col-sm-3">
                <label>First name:</label>
                <input type="text" class="form-control input-sm" id="r_fname" name="r_fname" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Middle name:</label>
                <input type="text" class="form-control input-sm" id="r_mname" name="r_mname">
            </div>
            <div class="form-group col-sm-3">
                <label>Qualifier:</label>
                <input type="text" class="form-control input-sm" id="r_qualifier" name="r_qualifier">
            </div>
            <div class="form-group col-sm-3">
                <label>Nickname:</label>
                <input type="text" class="form-control input-sm" id="r_nickname" name="r_nickname">
            </div>
            <div class="form-group col-sm-3">
                <label>Citizenship:</label>
                <input type="text" class="form-control input-sm" id="r_citizenship" name="r_citizenship" required>
            </div>
            <div class="form-group col-sm-2">
                <label>Sex:</label>
                <select class="form-control input-sm" id="r_sex" name="r_sex" required>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <div class="form-group col-sm-2">
                <label>Civil status:</label>
                <select class="form-control input-sm" id="r_status" name="r_status" required>
                    <option value="1">Single</option>
                    <option value="2">Married</option>
                    <option value="3">Separated</option>
                    <option value="4">Widow</option>
                </select>
            </div>
            <div class="form-group col-sm-2">
                <label>Age:</label>
                <input type="number" class="form-control input-sm" id="r_age" name="r_age" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Date of birth:</label>
                <input type="date" class="form-control input-sm" id="r_birth_date" name="r_birth_date" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Place of birth:</label>
                <input type="text" class="form-control input-sm" id="r_birth_place" name="r_birth_place" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Home phone:</label>
                <input type="text" class="form-control input-sm" id="r_phone" name="r_phone">
            </div>
            <div class="form-group col-sm-3">
                <label>Mobile number:</label>
                <input type="text" class="form-control input-sm" id="r_mobile" name="r_mobile">
            </div>
            <div class="form-group col-sm-3">
                <label>Current address:</label>
                <input type="text" class="form-control input-sm" id="r_c_address" name="r_c_address" required>
            </div>
            <div class="form-group col-sm-2">
                <label>Current village:</label>
                <input type="text" class="form-control input-sm" id="r_c_village" name="r_c_village" required>
            </div>
            <div class="form-group col-sm-2">
                <label>Current barangay:</label>
                <input type="text" class="form-control input-sm" id="r_c_brgy" name="r_c_brgy" required>
            </div>
            <div class="form-group col-sm-2">
                <label>Current town/city:</label>
                <input type="text" class="form-control input-sm" id="r_c_city" name="r_c_city" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Current Province:</label>
                <input type="text" class="form-control input-sm" id="r_c_province" name="r_c_province" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Other address:</label>
                <input type="text" class="form-control input-sm" id="r_o_address" name="r_o_address"  >
            </div>
            <div class="form-group col-sm-2">
                <label>Other village:</label>
                <input type="text" class="form-control input-sm" id="r_o_village" name="r_o_village"  >
            </div>
            <div class="form-group col-sm-2">
                <label>Other barangay:</label>
                <input type="text" class="form-control input-sm" id="r_o_brgy" name="r_o_brgy"  >
            </div>
            <div class="form-group col-sm-2">
                <label>Other town/city:</label>
                <input type="text" class="form-control input-sm" id="r_o_city" name="r_o_city"  >
            </div>
            <div class="form-group col-sm-3">
                <label>Other Province:</label>
                <input type="text" class="form-control input-sm" id="r_o_province" name="r_o_province"  >
            </div>
            <div class="form-group col-sm-3">
                <label>Highest educational attainment:</label>
                <input type="text" class="form-control input-sm" id="r_hea" name="r_hea">
            </div>
            <div class="form-group col-sm-2">
                <label>Occupation:</label>
                <input type="text" class="form-control input-sm" id="r_occupation" name="r_occupation">
            </div>
            <div class="form-group col-sm-2">
                <label>Ids presented:</label>
                <input type="text" class="form-control input-sm" id="r_id_presented" name="r_id_presented" required>
            </div>
            <div class="form-group col-sm-3">
                <label>Email:</label>
                <input type="email" class="form-control input-sm" id="r_email" name="r_email">
            </div>
            <div class="form-group col-sm-2">
                <label>Is victim?</label>
                <label class="switch">
                    <input id="r_is_victim" type="checkbox" name="r_is_victim">
                    <span class="slider round"></span>
                </label>
            </div>
<!--            Suspect Form-->
            <div class="col-sm-12">
                <h3>ITEM "B" SUSPECT DATA</h3>
            </div>
            <div class="col-xs-12 no-gutter suspect-data-container data-container">
            </div>
            <div class="col-xs-12">
                <button type="button" class="btn form-btn add-suspect">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add suspect
                </button>
            </div>
            <!--Child in conflict-->
            <div class="col-xs-12 no-gutter child-data-container data-container">
            </div>
            <div class="col-xs-12">
                <button type="button" class="btn form-btn add-child">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add child in conflict with the law
                </button>
            </div>
<!--            Victim Form-->
            <div class="col-sm-12">
                <h3>ITEM "C" VICTIM DATA</h3>
            </div>
            <div class="col-xs-12 no-gutter victim-data-container data-container">
            </div>
            <div class="col-xs-12">
                <button type="button" class="btn form-btn add-victim">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add victim
                </button>
            </div>

            <div class="col-sm-12">
                <h3>ITEM "D" NARRATIVE OF THE INCIDENT</h3>
            </div>
            <div class="form-group col-sm-12">
                <label>ENTER IN DETAIL THE NARRATIVE OF THE INCIDENT OR EVENT, ANSWERING THE WHO, WHAT, WHEN, WHERE, WHY AND HOW OF REPORTING:</label>
                <textarea class="form-control input-sm" rows="15" name="narrative" required></textarea>
            </div>
            
            <div class="col-sm-12">
                <h3>PIN TO MAP</h3>
            </div>
            <div class="col-xs-12 map-holder">
                <div id="map" class="col-xs-12"></div>
                <input type="text" id="search" class="form-control">
            </div>
            
            <div class="form-group col-sm-12">
                <input type="hidden" name="edit_id" id="edit_id">
                <input name="submit" type="submit" value="Submit Blotter" class="btn btn-submit pull-left">
            </div>
            <br>
            <br>
        </form>
    </div>
</div>
<span class="floating-button add-blotter">
    <i class="fa fa-plus" aria-hidden="true"></i>
</span>

<form-template id="suspect-form-template">
    <div class="col-xs-12 no-gutter suspect-data-form data-form">
        <div class="col-xs-12 form-caption no-gutter">
        </div>
        <input type="hidden" name="s_edit_id[]" value="0">
        <div class="form-group col-sm-3">
            <label>Last name:</label>
            <input type="text" class="form-control input-sm" name="s_lname[]" required>
        </div>
        <div class="form-group col-sm-3">
            <label>First name:</label>
            <input type="text" class="form-control input-sm" name="s_fname[]" required>
        </div>
        <div class="form-group col-sm-3">
            <label>Middle name:</label>
            <input type="text" class="form-control input-sm" name="s_mname[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Qualifier:</label>
            <input type="text" class="form-control input-sm" name="s_qualifier[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Nickname:</label>
            <input type="text" class="form-control input-sm" name="s_nickname[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Citizenship:</label>
            <input type="text" class="form-control input-sm" name="s_citizenship[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Sex:</label>
            <select class="form-control input-sm" name="s_sex[]" required>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </div>
        <div class="form-group col-sm-2">
            <label>Civil status:</label>
            <select class="form-control input-sm" name="s_status[]">
                <option value="1">Single</option>
                <option value="2">Married</option>
                <option value="3">Separated</option>
                <option value="4">Widow</option>
            </select>
        </div>
        <div class="form-group col-sm-2">
            <label>Age:</label>
            <input type="number" class="form-control input-sm" name="s_age[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Date of birth:</label>
            <input type="date" class="form-control input-sm" name="s_birth_date[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Place of birth:</label>
            <input type="text" class="form-control input-sm" name="s_birth_place[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Home phone:</label>
            <input type="text" class="form-control input-sm" name="s_phone[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Mobile number:</label>
            <input type="text" class="form-control input-sm" name="s_mobile[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Current address:</label>
            <input type="text" class="form-control input-sm" name="s_c_address[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Current village:</label>
            <input type="text" class="form-control input-sm" name="s_c_village[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Current barangay:</label>
            <input type="text" class="form-control input-sm" name="s_c_brgy[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Current town/city:</label>
            <input type="text" class="form-control input-sm" name="s_c_city[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Current Province:</label>
            <input type="text" class="form-control input-sm" name="s_c_province[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Other address:</label>
            <input type="text" class="form-control input-sm" name="s_o_address[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Other village:</label>
            <input type="text" class="form-control input-sm" name="s_o_village[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Other barangay:</label>
            <input type="text" class="form-control input-sm" name="s_o_brgy[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Other town/city:</label>
            <input type="text" class="form-control input-sm" name="s_o_city[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Other Province:</label>
            <input type="text" class="form-control input-sm" name="s_o_province[]"  >
        </div>
        <div class="form-group col-sm-3">
            <label>Highest educational attainment:</label>
            <input type="text" class="form-control input-sm" name="s_hea[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Occupation:</label>
            <input type="text" class="form-control input-sm" name="s_occupation[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Work address:</label>
            <input type="text" class="form-control input-sm" name="s_work_address[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Relation to victim:</label>
            <input type="text" class="form-control input-sm" name="s_rtv[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Email:</label>
            <input type="email" class="form-control input-sm" name="s_email[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Is AFP/PNP personnel?</label>
            <label class="switch">
                <input id="s_is_officer" type="checkbox" name="s_is_officer[]">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="form-group col-sm-3">
            <label>Rank:</label>
            <input type="text" class="form-control input-sm" name="s_rank[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Unit assigned:</label>
            <input type="text" class="form-control input-sm" name="s_unit_assigned[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Group Affiliation:</label>
            <input type="text" class="form-control input-sm" name="s_group[]">
        </div>
        <div class="form-group col-sm-3">
            <label>With previous criminal record?</label>
            <label class="switch">
                <input id="s_is_wpcr" type="checkbox" name="s_is_wpcr[]">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="form-group col-sm-3">
            <label>Criminal records:</label>
            <input type="text" class="form-control input-sm" name="s_criminal_records[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Status of prev. case:</label>
            <input type="text" class="form-control input-sm" name="s_sopc[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Height:</label>
            <input type="text" class="form-control input-sm" name="s_height[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Weight:</label>
            <input type="text" class="form-control input-sm" name="s_weight[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Eye color:</label>
            <input type="text" class="form-control input-sm" name="s_eye_color[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Eye description:</label>
            <input type="text" class="form-control input-sm" name="s_eye_desc[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Hair color:</label>
            <input type="text" class="form-control input-sm" name="s_hair_color[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Hair description:</label>
            <input type="text" class="form-control input-sm" name="s_hair_desc[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Under the influence?</label>
            <label class="switch">
                <input id="s_is_uti" type="checkbox" name="s_is_uti[]">
                <span class="slider round"></span>
            </label>
        </div>
        <div class="form-group col-sm-3">
            <label>Under the influence of:</label>
            <input type="text" class="form-control input-sm" name="s_influence[]">
        </div>
        
    </div>
</form-template>

<form-template id="victim-form-template">
    <div class="col-xs-12 no-gutter victim-data-form data-form">
        <div class="col-xs-12 form-caption no-gutter">
        </div>
        <input type="hidden" name="v_edit_id[]" value="0">
        <div class="form-group col-sm-3">
            <label>Last name:</label>
            <input type="text" class="form-control input-sm" name="v_lname[]" required>
        </div>
        <div class="form-group col-sm-3">
            <label>First name:</label>
            <input type="text" class="form-control input-sm" name="v_fname[]" required>
        </div>
        <div class="form-group col-sm-3">
            <label>Middle name:</label>
            <input type="text" class="form-control input-sm" name="v_mname[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Qualifier:</label>
            <input type="text" class="form-control input-sm" name="v_qualifier[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Nickname:</label>
            <input type="text" class="form-control input-sm" name="v_nickname[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Citizenship:</label>
            <input type="text" class="form-control input-sm" name="v_citizenship[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Sex:</label>
            <select class="form-control input-sm" name="v_sex[]" required>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </div>
        <div class="form-group col-sm-2">
            <label>Civil status:</label>
            <select class="form-control input-sm" name="v_status[]">
                <option value="1">Single</option>
                <option value="2">Married</option>
                <option value="3">Separated</option>
                <option value="4">Widow</option>
            </select>
        </div>
        <div class="form-group col-sm-2">
            <label>Age:</label>
            <input type="number" class="form-control input-sm" name="v_age[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Date of birth:</label>
            <input type="date" class="form-control input-sm" name="v_birth_date[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Place of birth:</label>
            <input type="text" class="form-control input-sm" name="v_birth_place[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Home phone:</label>
            <input type="text" class="form-control input-sm" name="v_phone[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Mobile number:</label>
            <input type="text" class="form-control input-sm" name="v_mobile[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Current address:</label>
            <input type="text" class="form-control input-sm" name="v_c_address[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Current village:</label>
            <input type="text" class="form-control input-sm" name="v_c_village[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Current barangay:</label>
            <input type="text" class="form-control input-sm" name="v_c_brgy[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Current town/city:</label>
            <input type="text" class="form-control input-sm" name="v_c_city[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Current Province:</label>
            <input type="text" class="form-control input-sm" name="v_c_province[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Other address:</label>
            <input type="text" class="form-control input-sm" name="v_o_address[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Other village:</label>
            <input type="text" class="form-control input-sm" name="v_o_village[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Other barangay:</label>
            <input type="text" class="form-control input-sm" name="v_o_brgy[]">
        </div>
        <div class="form-group col-sm-2">
            <label>Other town/city:</label>
            <input type="text" class="form-control input-sm" name="v_o_city[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Other Province:</label>
            <input type="text" class="form-control input-sm" name="v_o_province[]"  >
        </div>
        <div class="form-group col-sm-3">
            <label>Highest educational attainment:</label>
            <input type="text" class="form-control input-sm" name="v_hea[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Occupation:</label>
            <input type="text" class="form-control input-sm" name="v_occupation[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Work address:</label>
            <input type="text" class="form-control input-sm" name="v_work_address[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Email:</label>
            <input type="email" class="form-control input-sm" name="v_email[]">
        </div>
    </div>
</form-template>

<form-template id="child-form-template">
    <div class="col-xs-12 no-gutter child-data-form data-form">
        <div class="col-xs-12 form-caption no-gutter">
        </div>
        <input type="hidden" name="c_edit_id[]" value="0">
        <div class="form-group col-sm-3">
            <label>Name of guardian:</label>
            <input type="text" class="form-control input-sm" name="c_g_name[]" required>
        </div>
        <div class="form-group col-sm-3">
            <label>Guradian Address:</label>
            <input type="text" class="form-control input-sm" name="c_g_address[]" required>
        </div>
        <div class="form-group col-sm-3">
            <label>Home phone:</label>
            <input type="text" class="form-control input-sm" name="c_phone[]">
        </div>
        <div class="form-group col-sm-3">
            <label>Mobile number:</label>
            <input type="text" class="form-control input-sm" name="c_mobile[]">
        </div>
        <div class="form-group col-sm-12">
            <label>Diversion mechanism:</label>
            <textarea class="form-control input-sm" rows="5" name="c_diversion_mechanism[]"></textarea>
        </div>
        <div class="form-group col-sm-12">
            <label>Distinguishing features:</label>
            <textarea class="form-control input-sm" rows="10" name="c_distinguishing_features[]" required></textarea>
        </div>
    </div>
</form-template>


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
            url: 'img/blotter.svg', // url
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