<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <style>
            body
            {
                padding: 10px;
            }
            
            .form-group 
            {
                margin-bottom: 0;
                border: 1px solid;
                display: table-cell;
                min-height: 65px;
            }
            
            div
            {
                margin-top:-1px;
                margin-left: -1px;
            }
            
            label
            {
                display: block;
            }
            
            h3
            {
                margin: 15px 0;
            }
            
            .sub-txt
            {
                font-weight: 20px;
            }
            
            .no-gutter
            {
                padding-left: 0;
                padding-right: 0;
            }
            
            .txt-centered
            {
                text-align: center;
            }
            
            .header-text span
            {
                display: block;
                margin: 0 20px;
            }
            
            .pnp
            {
                font-size: 20px;
            }
            
            .pnp-header
            {
                font-size: 36px;
                font-weight: bold;
            }
            
            @media print {
                html, 
                body {
                    width: 1000px !important;
                }

                .hidden{display:none;visibility:hidden}
                .visible-phone{display:none!important}
                .visible-tablet{display:none!important}
                .hidden-desktop{display:none!important}
                .visible-desktop{display:inherit!important}
            }
        </style>
    </head>
    <body onload="window.print()">
        <div class="col-xs-12 txt-centered" style="margin-bottom:50px;">
            <div class="col-xs-3">
                <img src="/images/pnplogo.png" style="width: 70px;float: right;">
            </div>
            <div class="col-xs-7 header-text">
                <span class="pnp">
                    PHILIPPINE NATIONAL POLICE
                </span>
                <span class="pnp-header">
                    INCIDENT RECORD FORM
                </span>
            </div>
        </div>
        <div class="form-group col-xs-3">
            <label>Blotter Entry Number</label>
            <?php echo $info['entry_number']; ?>
        </div>
        <div class="form-group col-xs-3">
            <label>Type Of Incident</label>
            <?php echo $info['type_of_incident']; ?>
            <?php echo ' - '.$info['type']; ?>
        </div>
        <div class="form-group col-xs-3">
            <label>Date and Time Reported</label>
            <?php echo $info['date_reported'].' '.$info['time_reported']; ?>
        </div>
        <div class="form-group col-xs-3">
            <label>Date and Time of Incident</label>
            <?php echo $info['date_of_incident'].' '.$info['time_of_incident']; ?>
        </div>
        <div class="col-xs-12 no-gutter">
            <h3>Reporting Person </h3>
        </div>
            <?php echo $reporting_view; ?>
        <div class="col-xs-12 no-gutter">
            <h3>List Of Suspects</h3>
        </div>
            <?php echo $suspect_data_list; ?>
        <div class="col-xs-12 no-gutter">
            <h3>Child in conflict with the law</h3>
        </div>
        <?php echo $child_data_list; ?>
        <div class="col-xs-12 no-gutter">
            <h3>List Of Victims</h3>
        </div>
            <?php echo $victim_data_list; ?>
        
        <div class="col-xs-12 no-gutter">
            <h3>Narrative of incident</h3>
        </div>
        <div class="col-xs-12 form-group">
            <?php echo $info['narrative']; ?>
        </div>
    </body>
</html>