<div class="col-xs-12 offences">
    <h1>Offences</h1>
    <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Offense</th>
        <th>Type</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="tableBody" class="offences-list">
      <?php echo $list; ?>
    </tbody>
  </table>
    <div class="col-xs-12">
        <?php echo $pagination ?>
    </div>
</div>
<div class="col-xs-4 offense-form-section">
    <h1 class="offense-form">Add Offense</h1>
    <div class="col-xs-12 offenseformholder">
        <form id="offenseform">
            <div class="form-group">
                <label for="usr">Offense:</label>
                <input type="text" class="form-control input-sm" id="crime" name="crime" required>
            </div>
            <div class="form-group">
                <label for="usr">Type:</label>
                <select class="form-control input-sm" id="type" name="type" required>
                    <option value="1">Major</option>
                    <option value="2">Minor</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="edit_id" id="edit_id">
                <input name="submit" type="submit" value="Submit" class="btn btn-submit pull-right">
            </div>
        </form>
    </div>
</div>
<span class="floating-button add-offense">
    <i class="fa fa-plus" aria-hidden="true"></i>
</span>