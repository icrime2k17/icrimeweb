<div class="col-xs-12 no-gutter suspect-data-form data-form inDb" data-id="<?php echo $id; ?>" data-table='suspect'>
    <input type="hidden" name="s_edit_id[]" value="<?php echo $id; ?>">
    <div class="col-xs-12 form-caption no-gutter">
        <div class='col-xs-12 caption-holder'><span class='caption'>SUSPECT <?php echo $ctr; ?></span><span class='clear'>x</span></div>
    </div>
    <div class="form-group col-sm-3">
        <label>Last name:</label>
        <input type="text" class="form-control input-sm" name="s_lname[]" value="<?php echo $lname; ?>" required>
    </div>
    <div class="form-group col-sm-3">
        <label>First name:</label>
        <input type="text" class="form-control input-sm" name="s_fname[]" value="<?php echo $fname; ?>" required>
    </div>
    <div class="form-group col-sm-3">
        <label>Middle name:</label>
        <input type="text" class="form-control input-sm" name="s_mname[]" value="<?php echo $mname; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Qualifier:</label>
        <input type="text" class="form-control input-sm" name="s_qualifier[]" value="<?php echo $qualifier; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Nickname:</label>
        <input type="text" class="form-control input-sm" name="s_nickname[]" value="<?php echo $nickname; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Citizenship:</label>
        <input type="text" class="form-control input-sm" name="s_citizenship[]" value="<?php echo $citizenship; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Sex:</label>
        <select class="form-control input-sm" name="s_sex[]" required>
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
        <select class="form-control input-sm" name="s_status[]">
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
        <input type="number" class="form-control input-sm" name="s_age[]" value="<?php echo $age; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Date of birth:</label>
        <input type="date" class="form-control input-sm" name="s_birth_date[]" value="<?php echo $birth_date; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Place of birth:</label>
        <input type="text" class="form-control input-sm" name="s_birth_place[]" value="<?php echo $birth_place; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Home phone:</label>
        <input type="text" class="form-control input-sm" name="s_phone[]" value="<?php echo $phone; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Mobile number:</label>
        <input type="text" class="form-control input-sm" name="s_mobile[]" value="<?php echo $mobile; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Current address:</label>
        <input type="text" class="form-control input-sm" name="s_c_address[]" value="<?php echo $c_address; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Current village:</label>
        <input type="text" class="form-control input-sm" name="s_c_village[]" value="<?php echo $c_village; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Current barangay:</label>
        <input type="text" class="form-control input-sm" name="s_c_brgy[]" value="<?php echo $c_brgy; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Current town/city:</label>
        <input type="text" class="form-control input-sm" name="s_c_city[]" value="<?php echo $c_city; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Current Province:</label>
        <input type="text" class="form-control input-sm" name="s_c_province[]" value="<?php echo $c_province; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Other address:</label>
        <input type="text" class="form-control input-sm" name="s_o_address[]" value="<?php echo $o_address; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Other village:</label>
        <input type="text" class="form-control input-sm" name="s_o_village[]" value="<?php echo $o_village; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Other barangay:</label>
        <input type="text" class="form-control input-sm" name="s_o_brgy[]" value="<?php echo $o_brgy; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Other town/city:</label>
        <input type="text" class="form-control input-sm" name="s_o_city[]" value="<?php echo $o_city; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Other Province:</label>
        <input type="text" class="form-control input-sm" name="s_o_province[]" value="<?php echo $o_province; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Highest educational attainment:</label>
        <input type="text" class="form-control input-sm" name="s_hea[]" value="<?php echo $hea; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Occupation:</label>
        <input type="text" class="form-control input-sm" name="s_occupation[]" value="<?php echo $occupation; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Work address:</label>
        <input type="text" class="form-control input-sm" name="s_work_address[]" value="<?php echo $work_address; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Relation to victim:</label>
        <input type="text" class="form-control input-sm" name="s_rtv[]" value="<?php echo $rtv; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Email:</label>
        <input type="email" class="form-control input-sm" name="s_email[]" value="<?php echo $email; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Is AFP/PNP personnel?</label>
        <label class="switch">
            <input id="s_is_officer" type="checkbox" name="s_is_officer[]" <?php echo $officer_checked; ?>>
            <span class="slider round"></span>
        </label>
    </div>
    <div class="form-group col-sm-3">
        <label>Rank:</label>
        <input type="text" class="form-control input-sm" name="s_rank[]" value="<?php echo $rank; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Unit assigned:</label>
        <input type="text" class="form-control input-sm" name="s_unit_assigned[]" value="<?php echo $unit_assigned; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Group Affiliation:</label>
        <input type="text" class="form-control input-sm" name="s_group[]" value="<?php echo $group_affiliation; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>With previous criminal record?</label>
        <label class="switch">
            <input id="s_is_wpcr" type="checkbox" name="s_is_wpcr[]" <?php echo $wpcr_checked; ?>>
            <span class="slider round"></span>
        </label>
    </div>
    <div class="form-group col-sm-3">
        <label>Criminal records:</label>
        <input type="text" class="form-control input-sm" name="s_criminal_records[]" value="<?php echo $criminal_records; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Status of prev. case:</label>
        <input type="text" class="form-control input-sm" name="s_sopc[]" value="<?php echo $sopc; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Height:</label>
        <input type="text" class="form-control input-sm" name="s_height[]" value="<?php echo $height; ?>">
    </div>
    <div class="form-group col-sm-2">
        <label>Weight:</label>
        <input type="text" class="form-control input-sm" name="s_weight[]" value="<?php echo $weight; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Eye color:</label>
        <input type="text" class="form-control input-sm" name="s_eye_color[]" value="<?php echo $eye_color; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Eye description:</label>
        <input type="text" class="form-control input-sm" name="s_eye_desc[]" value="<?php echo $eye_desc; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Hair color:</label>
        <input type="text" class="form-control input-sm" name="s_hair_color[]" value="<?php echo $hair_color; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Hair description:</label>
        <input type="text" class="form-control input-sm" name="s_hair_desc[]" value="<?php echo $hair_desc; ?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Under the influence?</label>
        <label class="switch">
            <input id="s_is_uti" type="checkbox" name="s_is_uti[]" <?php echo $influence_checked; ?> >
            <span class="slider round"></span>
        </label>
    </div>
    <div class="form-group col-sm-3">
        <label>Under the influence of:</label>
        <input type="text" class="form-control input-sm" name="s_influence[]" value="<?php echo $influence; ?>">
    </div>

</div>