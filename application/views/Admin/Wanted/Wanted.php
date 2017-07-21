<div class="col-xs-12 wanted-list-form">
    <h1>Wanted List</h1>
    <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Alias</th>
        <th>Region</th>
        <th>Offenses</th>
        <th>Reward</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="tableBody" class="wanted-list">
      <?php echo $list; ?>
    </tbody>
  </table>
</div>
<div class="col-xs-12 wanted-form-holder">
    <h1>Wanted Form</h1>
    <form id="wantedform" action="/admin/processWanted" method="post" enctype="multipart/form-data">
        <div class="form-group col-sm-4">
            <label for="">Last name:</label>
            <input type="text" class="form-control input-sm" id="lastname" name="lastname" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="">First name:</label>
            <input type="text" class="form-control input-sm" id="firstname" name="firstname" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="">Middle name:</label>
            <input type="text" class="form-control input-sm" id="middlename" name="middlename">
        </div>
        <div class="form-group col-sm-4">
            <label for="">Alias:</label>
            <input type="text" class="form-control input-sm" id="alias" name="alias">
        </div>
        <div class="form-group col-sm-4">
            <label for="">Region:</label>
            <select class="form-control input-sm" id="region" name="region" required>
                <option value="">...</option>
                <option value="NIR - Negros Island Region">NIR - Negros Island Region</option>
                <option value="NCR - National Capital Region">NCR - National Capital Region</option>
                <option value="CAR - Cordillera Administrative Region">CAR - Cordillera Administrative Region</option>
                <option value="REGION I (Ilocos Region)">REGION I (Ilocos Region)</option>
                <option value="REGION II (Cagayan Valley)">REGION II (Cagayan Valley)</option>
                <option value="REGION III (Central Luzon)">REGION III (Central Luzon)</option>
                <option value="REGION IV-A (CALABARZON)">REGION IV-A (CALABARZON)</option>
                <option value="REGION IV-B MIMAROPA Region">REGION IV-B MIMAROPA Region</option>
                <option value="REGION V (Bicol Region)REGION V (Bicol Region)">REGION V (Bicol Region)</option>
                <option value="REGION VI (Western Visayas)">REGION VI (Western Visayas)</option>
                <option value="REGION VII (Central Visayas)">REGION VII (Central Visayas)</option>
                <option value="REGION VIII (Eastern Visayas)">REGION VIII (Eastern Visayas)</option>
                <option value="REGION IX (Zamboanga Peninsula)">REGION IX (Zamboanga Peninsula)</option>
                <option value="REGION X (Northern Mindanao)">REGION X (Northern Mindanao)</option>
                <option value="REGION XI (Davao Region)">REGION XI (Davao Region)</option>
                <option value="REGION XII (Soccsksargen)">REGION XII (Soccsksargen)</option>
                <option value="REGION XIII (Caraga)">REGION XIII (Caraga)</option>
                <option value="ARMM - Autonomous Region in Muslim Mindanao">ARMM - Autonomous Region in Muslim Mindanao</option>
            </select>
        </div>
        <div class="form-group col-sm-4">
            <label for="">Reward:</label>
            <input type="text" class="form-control input-sm" id="reward" name="reward" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="">Memorandum Circular number:</label>
            <input type="text" class="form-control input-sm" id="mcn" name="mcn">
        </div>
        <div class="form-group col-sm-4">
            <label for="">Date of Memorandum Circular:</label>
            <input type="date" class="form-control input-sm" id="mcdate" name="mcdate">
        </div>
        <div class="form-group col-sm-4">
            <label for="">Criminal Case number:</label>
            <input type="text" class="form-control input-sm" id="ccn" name="ccn">
        </div>
        <div class="form-group col-sm-4">
            <label for="">Offenses:</label>
            <input type="" class="form-control input-sm" id="offenses" name="offenses" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="">Issuing Court:</label>
            <input type="text" class="form-control input-sm" id="court" name="court" required>
        </div>
        <div class="form-group col-sm-4">
            <label for="">Synopsis of Criminal Offense:</label>
            <input type="text" class="form-control input-sm" id="synopsis" name="synopsis">
        </div>
        <div class="col-sm-12">
            <h3>Physical Description</h3>
        </div>
        <div class="form-group col-sm-3">
            <label for="">Sex:</label>
            <select class="form-control input-sm" id="sex" name="sex">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group col-sm-3">
            <label for="">Height:</label>
            <input type="text" class="form-control input-sm" id="height" name="height">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Weight:</label>
            <input type="text" class="form-control input-sm" id="weight" name="weight">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Eyes:</label>
            <input type="text" class="form-control input-sm" id="eyes" name="eyes">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Hair:</label>
            <input type="text" class="form-control input-sm" id="hair" name="hair">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Complexion:</label>
            <input type="text" class="form-control input-sm" id="complexion" name="complexion">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Other (Identifying marks):</label>
            <input type="text" class="form-control input-sm" id="other" name="other">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Photo:</label>
            <input type="file" class="form-control input-sm" id="upload_image" name="upload_image">
        </div>
        <div class="col-sm-12">
            <h3>Personal Data</h3>
        </div>
        <div class="form-group col-sm-3">
            <label for="">Age:</label>
            <input type="number" class="form-control input-sm" id="age" name="age">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Date of Birth:</label>
            <input type="date" class="form-control input-sm" id="birthdate" name="birthdate">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Place of Birth:</label>
            <input type="text" class="form-control input-sm" id="birthplace" name="birthplace">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Citizenship:</label>
            <input type="text" class="form-control input-sm" id="citizenship" name="citizenship">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Father:</label>
            <input type="text" class="form-control input-sm" id="father" name="father">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Mother:</label>
            <input type="text" class="form-control input-sm" id="mother" name="mother">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Address:</label>
            <input type="text" class="form-control input-sm" id="address" name="address">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Civil Status:</label>
            <select class="form-control input-sm" id="civilstatus" name="civilstatus">
                <option value="">...</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Separated">Separated</option>
                <option value="Widow">Widow</option>
            </select>
        </div>
        <div class="col-sm-12">
            <h3>Educational Background</h3>
        </div>
        <div class="form-group col-sm-3">
            <label for="">Elementary:</label>
            <input type="text" class="form-control input-sm" id="elementary" name="elementary">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Secondary:</label>
            <input type="text" class="form-control input-sm" id="secondary" name="secondary">
        </div>
        <div class="form-group col-sm-3">
            <label for="">College:</label>
            <input type="text" class="form-control input-sm" id="college" name="college">
        </div>
        <div class="form-group col-sm-3">
            <label for="">Sort: <i>Position in Web and App view</i></label>
            <input type="text" class="form-control input-sm" id="sort" name="sort">
        </div>
        <div class="form-group col-sm-12">
            <input type="hidden" name="edit_id" id="edit_id">
            <input name="submit" type="submit" class="btn btn-submit pull-left">
        </div>
    </form>
</div>
<span class="floating-button add-wanted">
    <i class="fa fa-plus" aria-hidden="true"></i>
</span>

<script>
    var showMessage = <?php echo $showMessage; ?>;
    if(showMessage)
    {
        swal("<?php echo $title; ?>", "<?php echo $message; ?>", "<?php echo $type; ?>");
    }
</script>