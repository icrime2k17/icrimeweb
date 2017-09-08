<div class="col-xs-12 blotters">
    <h1>Crime Reports</h1>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Crime</th>
            <th>Address</th>
            <th>Date/Time Reported</th>
    <!--        <th>Status</th>-->
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="tableBody" class="crime-reports-list">
          <?php echo $list; ?>
        </tbody>
    </table>
    <div class="col-xs-12">
        <?php echo $pagination ?>
    </div>
</div>