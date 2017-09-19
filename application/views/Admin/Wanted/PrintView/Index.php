<html>
    <head>
        <title>
            <?php echo $lastname.'_'.$firstname; ?>
        </title>
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
            
            img
            {
                max-width: 250px;
                margin: 20px 0;
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
        <div class="txt-centered">
            <?php echo $image; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Last name:</label>
            <?php echo $lastname; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">First name:</label>
            <?php echo $firstname; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Middle name:</label>
            <?php echo $middlename; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Alias:</label>
            <?php echo $alias; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Region:</label>
            <?php echo $region_caption; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Reward:</label>
            <?php echo $reward; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Memorandum Circular number:</label>
            <?php echo $mcn; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Date of Memorandum Circular:</label>
            <?php echo $mcdate; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Criminal Case number:</label>
            <?php echo $ccn; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Offenses:</label>
            <?php echo $offenses; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Issuing Court:</label>
            <?php echo $court; ?>
        </div>
        <div class="form-group col-xs-4">
            <label for="">Synopsis of Criminal Offense:</label>
            <?php echo $synopsis; ?>
        </div>
        <div class="col-xs-12 no-gutter">
            <h3>Physical Description</h3>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Sex:</label>
            <?php echo $sex; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Height:</label>
            <?php echo $height; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Weight:</label>
            <?php echo $weight; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Eyes:</label>
            <?php echo $eyes; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Hair:</label>
            <?php echo $hair; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Complexion:</label>
            <?php echo $complexion; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Other (Identifying marks):</label>
            <?php echo $other; ?>
        </div>
        <div class="col-xs-12 no-gutter">
            <h3>Personal Data</h3>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Age:</label>
            <?php echo $age; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Date of Birth:</label>
            <?php echo $birthdate; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Place of Birth:</label>
            <?php echo $birthplace; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Citizenship:</label>
            <?php echo $citizenship; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Father:</label>
            <?php echo $father; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Mother:</label>
            <?php echo $mother; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Address:</label>
            <?php echo $address; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Civil Status:</label>
            <?php echo $civilstatus; ?>
        </div>
        <div class="col-xs-12 no-gutter">
            <h3>Educational Background</h3>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Elementary:</label>
            <?php echo $elementary; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">Secondary:</label>
            <?php echo $secondary; ?>
        </div>
        <div class="form-group col-xs-3">
            <label for="">College:</label>
            <?php echo $college; ?>
        </div>
    </body>
</html>