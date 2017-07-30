<div class="col-xs-12 no-gutter child-data-form data-form inDb" data-id="<?php echo $id; ?>" data-table='child_in_conflict'>
    <input type="hidden" name="c_edit_id[]" value="<?php echo $id; ?>">
    <div class="col-xs-12 form-caption no-gutter">
        <div class='col-xs-12 caption-holder'><span class='caption'>CHILD IN CONFLICT WITH THE LAW <?php echo $ctr; ?></span><span class='clear'>x</span></div>
    </div>
    <div class="form-group col-sm-3">
        <label>Name of guardian:</label>
        <input type="text" class="form-control input-sm" name="c_g_name[]" value="<?php echo $g_name;?>" required>
    </div>
    <div class="form-group col-sm-3">
        <label>Guradian Address:</label>
        <input type="text" class="form-control input-sm" name="c_g_address[]" value="<?php echo $g_address;?>" required>
    </div>
    <div class="form-group col-sm-3">
        <label>Home phone:</label>
        <input type="text" class="form-control input-sm" name="c_phone[]" value="<?php echo $g_phone;?>">
    </div>
    <div class="form-group col-sm-3">
        <label>Mobile number:</label>
        <input type="text" class="form-control input-sm" name="c_mobile[]" value="<?php echo $g_mobile;?>">
    </div>
    <div class="form-group col-sm-12">
        <label>Diversion mechanism:</label>
        <textarea class="form-control input-sm" rows="5" name="c_diversion_mechanism[]"><?php echo $diversion_mechanism;?></textarea>
    </div>
    <div class="form-group col-sm-12">
        <label>Distinguishing features:</label>
        <textarea class="form-control input-sm" rows="10" name="c_distinguishing_features[]" required><?php echo $distinguishing_features;?></textarea>
    </div>

</div>