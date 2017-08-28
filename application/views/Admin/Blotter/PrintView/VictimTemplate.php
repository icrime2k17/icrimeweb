<div class="col-xs-12 no-gutter victim-data-form data-form inDb" data-id="<?php echo $id; ?>" data-table='victim'>
    <div class="form-group col-sm-3">
        <label>Last name:</label>
        <?php echo $lname; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>First name:</label>
        <?php echo $fname; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Middle name:</label>
        <?php echo $mname; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Qualifier:</label>
        <?php echo $qualifier; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Nickname:</label>
        <?php echo $nickname; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Citizenship:</label>
        <?php echo $citizenship; ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Sex:</label>
        <?php 
            switch ($sex)
            {
                case 1: 
                    echo 'Male';
                    break;
                case 2:
                    echo 'Female';
                    break;
            }
        ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Civil status:</label>
        <?php
            switch ($status)
            {
                case 1: 
                    echo 'Single';
                    break;
                case 2:
                    echo 'Married';
                    break;
                case 3:
                    echo 'Separated';
                    break;
                case 4:
                    echo 'Widow';
                    break;
            }
        ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Age:</label>
        <?php echo $age; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Date of birth:</label>
        <?php echo $birth_date; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Place of birth:</label>
        <?php echo $birth_place; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Home phone:</label>
        <?php echo $phone; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Mobile number:</label>
        <?php echo $mobile; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Current address:</label>
        <?php echo $c_address; ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Current village:</label>
        <?php echo $c_village; ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Current barangay:</label>
        <?php echo $c_brgy; ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Current town/city:</label>
        <?php echo $c_city; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Current Province:</label>
        <?php echo $c_province; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Other address:</label>
        <?php echo $o_address; ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Other village:</label>
        <?php echo $o_village; ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Other barangay:</label>
        <?php echo $o_brgy; ?>
    </div>
    <div class="form-group col-sm-2">
        <label>Other town/city:</label>
        <?php echo $o_city; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Other Province:</label>
        <?php echo $o_province; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Highest educational attainment:</label>
        <?php echo $hea; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Occupation:</label>
        <?php echo $occupation; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Work address:</label>
        <?php echo $work_address; ?>
    </div>
    <div class="form-group col-sm-3">
        <label>Email:</label>
        <?php echo $email; ?>
    </div>
</div>