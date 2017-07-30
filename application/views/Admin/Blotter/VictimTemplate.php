<div class="col-xs-12 no-gutter victim-data-form data-form inDb" data-id="<?php echo $id; ?>" data-table='victim'>
    <input type="hidden" name="v_edit_id[]" value="<?php echo $id; ?>">
    <div class="col-xs-12 form-caption no-gutter">
        <div class='col-xs-12 caption-holder'><span class='caption'>VICTIM <?php echo $ctr; ?></span><span class='clear'>x</span></div>
    </div>
    <div class="form-group col-sm-3">
        <label>Last name:</label>
        <input type="text" class="form-control input-sm" name="v_lname[]" value="<?php echo $lname; ?>" required>
    </div>
    <div class="form-group col-sm-3">
        <label>First name:</label>
        <input type="text" class="form-control input-sm" name="v_fname[]" value="<?php echo $fname; ?>" required>
    </div>
    <div class="form-group col-sm-3">
        <label>Middle name:</label>
        <input type="text" class="form-control input-sm" name="v_mname[]" value="<?php echo $mname; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Qualifier:</label>
        <input type="text" class="form-control input-sm" name="v_qualifier[]" value="<?php echo $qualifier; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Nickname:</label>
        <input type="text" class="form-control input-sm" name="v_nickname[]" value="<?php echo $nickname; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Citizenship:</label>
        <input type="text" class="form-control input-sm" name="v_citizenship[]" value="<?php echo $citizenship; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Sex:</label>
        <select class="form-control input-sm" name="v_sex[]" required>
            <?php 
                $male_selected = '';
                $female_selected = '';
                switch ($sex)
                {
                    case 1: 
                        $male_selected = 'selected';
                        break;
                    case 2:
                        $female_selected = 'selected';
                        break;
                }
                
                echo "
                        <option value='1' $male_selected>Male</option>
                        <option value='2' $female_selected>Female</option>
                    ";
            ?>
        </select>
    </div>
    <div class="form-group col-sm-2">
        <label>Civil status:</label>
        <select class="form-control input-sm" name="v_status[]">
            <?php 
                $single_selected = '';
                $married_selected = '';
                $separated_selected = '';
                $widow_selected = '';
                switch ($status)
                {
                    case 1: 
                        $single_selected = 'selected';
                        break;
                    case 2:
                        $married_selected = 'selected';
                        break;
                    case 3:
                        $separated_selected = 'selected';
                        break;
                    case 4:
                        $widow_selected = 'selected';
                        break;
                }
                
                echo "
                        <option value='1' $single_selected>Single</option>
                        <option value='2' $married_selected>Married</option>
                        <option value='3' $separated_selected>Separated</option>
                        <option value='4' $widow_selected>Widow</option>
                    ";
            ?>
        </select>
    </div>
    <div class="form-group col-sm-2">
        <label>Age:</label>
        <input type="number" class="form-control input-sm" name="v_age[]" value="<?php echo $age; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Date of birth:</label>
        <input type="date" class="form-control input-sm" name="v_birth_date[]" value="<?php echo $birth_date; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Place of birth:</label>
        <input type="text" class="form-control input-sm" name="v_birth_place[]" value="<?php echo $birth_place; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Home phone:</label>
        <input type="text" class="form-control input-sm" name="v_phone[]" value="<?php echo $phone; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Mobile number:</label>
        <input type="text" class="form-control input-sm" name="v_mobile[]" value="<?php echo $mobile; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Current address:</label>
        <input type="text" class="form-control input-sm" name="v_c_address[]" value="<?php echo $c_address; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Current village:</label>
        <input type="text" class="form-control input-sm" name="v_c_village[]" value="<?php echo $c_village; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Current barangay:</label>
        <input type="text" class="form-control input-sm" name="v_c_brgy[]" value="<?php echo $c_brgy; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Current town/city:</label>
        <input type="text" class="form-control input-sm" name="v_c_city[]" value="<?php echo $c_city; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Current Province:</label>
        <input type="text" class="form-control input-sm" name="v_c_province[]" value="<?php echo $c_province; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Other address:</label>
        <input type="text" class="form-control input-sm" name="v_o_address[]" value="<?php echo $o_address; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Other village:</label>
        <input type="text" class="form-control input-sm" name="v_o_village[]" value="<?php echo $o_village; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Other barangay:</label>
        <input type="text" class="form-control input-sm" name="v_o_brgy[]" value="<?php echo $o_brgy; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Other town/city:</label>
        <input type="text" class="form-control input-sm" name="v_o_city[]" value="<?php echo $o_city; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Other Province:</label>
        <input type="text" class="form-control input-sm" name="v_o_province[]" value="<?php echo $o_province; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Highest educational attainment:</label>
        <input type="text" class="form-control input-sm" name="v_hea[]" value="<?php echo $hea; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Occupation:</label>
        <input type="text" class="form-control input-sm" name="v_occupation[]" value="<?php echo $occupation; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Work address:</label>
        <input type="text" class="form-control input-sm" name="v_work_address[]" value="<?php echo $work_address; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Email:</label>
        <input type="email" class="form-control input-sm" name="v_email[]" value="<?php echo $email; ?>">
    </div>

</div>