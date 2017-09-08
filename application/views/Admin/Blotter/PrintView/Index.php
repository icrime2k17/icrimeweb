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
    <body>
        <div class="col-xs-12 no-gutter">
            <h3>Reporting Person </h3>
        </div>
            <?php echo $reporting_view; ?>
        <div class="col-xs-12 no-gutter">
            <h3>List Of Suspects</h3>
        </div>
            <?php echo $suspect_data_list; ?>
        <div class="col-xs-12 no-gutter">
            <h3>List Of Victims</h3>
        </div>
            <?php echo $victim_data_list; ?>
        <div class="col-xs-12 no-gutter">
            <h3>Child in conflict with the law</h3>
        </div>
        <?php echo $child_data_list; ?>
    </body>
</html>