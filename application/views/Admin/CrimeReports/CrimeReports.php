<div class="col-xs-12 blotters">
    <h1 class="inline-header">Crime Reports</h1>
    <div class="pull-right">
        <input type="text" class="form-control" placeholder="Search" id="search-crime-report" style="width: 250px;">
    </div>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Crime</th>
            <th>Type</th>
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