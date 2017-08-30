
       <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/crimeanalysis.css">
       <script src="//cdnjs.cloudflare.com/ajax/libs/d3/4.7.2/d3.min.js"></script>
       <script type = 'text/javascript' src = "<?php echo base_url();?>js/d3pie.min.js"></script>
        <div class="main-section" data-section-name="analysis">
            <h1>Crime Analysis</h1>
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div id="myPie" class="reveal1000">
                </div>
                <div id="tabular-view" class="col-xs-12">
                    <h2>Tabular View</h2>        
                    <table id="tbl-tabular-view" class="table table-striped">
                        <thead>
                          <tr>
                            <th>Crime</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <span class="no-data-found">No data found...</span>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5">
                <div class="sub-header-text reveal1200">
                    <div class="no-gutter form-group-lg col-xs-12">
                        <label>Sort by</label>
                        <select class="form-control" id="sort_selector">
                            <option value="1">Per Day</option>
                            <option value="2">Per Week</option>
                            <option value="3" selected>Per Month</option>
                            <option value="4">Per Year</option>
                        </select>
                    </div>
                    <div class="no-gutter form-group-lg col-xs-12 month-holder">
                        <label>Month</label>
                        <select class="form-control" id="month_selector">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="no-gutter form-group-lg col-xs-12 year-holder">
                        <label>Year</label>
                        <select class="form-control" id="year_selector">
                            <?php echo $years; ?>
                        </select>
                    </div>
                    <div class="no-gutter form-group-lg col-xs-12 day-holder">
                        <label>Day</label>
                        <input type="date" class="form-control" id="day_selector">
                    </div>
                    <div class="no-gutter form-group-lg col-xs-12 week-holder">
                        <label>Week</label>
                        <input type="week" class="form-control" id="week_selector">
                    </div>
                    <div class="no-gutter form-group-lg col-xs-12">
                        <button type="button" class="form-control" id="show_results">SHOW RESULTS</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.pie = null;
            var current_month = parseInt("<?php echo $current_month; ?>");
            $("#month_selector").val(current_month);
            $(".day-holder").fadeOut();
            $(".week-holder").fadeOut();
            $(".month-holder").fadeIn();
            $(".year-holder").fadeIn();
            
            $(document).ready(function(){
                $.ajax({
                    url : '/welcome/GetCrimeAnalysisByMonth',
                    method : 'POST',
                    data : {
                        month : $("#month_selector").val(),
                        year : $("#year_selector").val()
                    },
                    dataType : "json",
                    beforeSend : function(){
                    },
                    success : function(data){
                        if(data.success)
                        {
                            var valid_pie = false;
                            $.each(data.content,function(key,value){
                                var int_value = parseInt(value['value'])
                                data.content[key]['value'] = int_value;
                                if(int_value > 0)
                                {
                                    valid_pie = true;
                                }
                            });

                            if(valid_pie)
                            {
                                pie = new d3pie("myPie", {
                                        header: {
                                        },
                                        data: {
                                                content: data.content
                                        }
                                });
                                
                                RenderTabularView(data.content);
                            }
                            else
                            {
                                $("#tabular-view").fadeOut();
                                $(".no-data-found").css("display","block");
                            }
                        }
                        else
                        {
                            swal("Error", "Error connecting to server.", "error");
                        }
                    },
                    error : function(){
                        swal("Error", "Error connecting to server.", "error");
                    }
                });

                //sorting
                $("#sort_selector").change(function(){
                    var sorter = $(this).val();
                    if(sorter == 1)
                    {
                        $(".day-holder").fadeIn();
                        $(".week-holder").fadeOut();
                        $(".month-holder").fadeOut();
                        $(".year-holder").fadeOut();
                    }
                    else if(sorter == 2)
                    {
                        $(".week-holder").fadeIn();
                        $(".day-holder").fadeOut();
                        $(".month-holder").fadeOut();
                        $(".year-holder").fadeOut();
                    }
                    else if(sorter == 3)
                    {
                        $(".day-holder").fadeOut();
                        $(".week-holder").fadeOut();
                        $(".month-holder").fadeIn();
                        $(".year-holder").fadeIn();
                    }
                    else if(sorter == 4)
                    {
                        $(".day-holder").fadeOut();
                        $(".week-holder").fadeOut();
                        $(".month-holder").fadeOut();
                        $(".year-holder").fadeIn();
                    }
                });

                $("#show_results").click(function(){
                    var sorter = $("#sort_selector").val();
                    if(sorter == 1)
                    {
                        //day
                        RenderPieByDay();
                    }
                    else if(sorter == 2)
                    {
                        //week
                        RenderPieByWeek();
                    }
                    else if(sorter == 3)
                    {
                        //month
                        RenderPieByMonth();
                    }
                    else if(sorter == 4)
                    {
                        //year
                        RenderPieByYear();
                    }
                });
            });
            
            var RenderPieByMonth = function()
            {
                $.ajax({
                    url : '/welcome/GetCrimeAnalysisByMonth',
                    method : 'POST',
                    data : {
                        month : $("#month_selector").val(),
                        year : $("#year_selector").val()
                    },
                    dataType : "json",
                    beforeSend : function(){
                    },
                    success : function(data){
                        if(data.success)
                        {
                            var valid_pie = false;
                            $.each(data.content,function(key,value){
                                var int_value = parseInt(value['value']);
                                data.content[key]['value'] = int_value;
                                if(int_value > 0)
                                {
                                    valid_pie = true;
                                }
                            });

                            if(valid_pie)
                            {
                                $("#tabular-view").fadeIn();
                                $(".no-data-found").css("display","none");
                                $("#myPie").fadeIn();
                                if(pie == null)
                                {
                                    window.pie = new d3pie("myPie", {
                                            header: {
                                            },
                                            data: {
                                                    content: data.content
                                            }
                                    });
                                }
                                else
                                {
                                    pie.updateProp("data.content", data.content);
                                }
                                
                                RenderTabularView(data.content);
                            }
                            else
                            {
                               $(".no-data-found").css("display","block");
                               $("#myPie").fadeOut();
                               $("#tabular-view").fadeOut();
                            }
                        }
                        else
                        {
                            swal("Error", "Error connecting to server.", "error");
                        }
                    },
                    error : function(){
                        swal("Error", "Error connecting to server.", "error");
                    }
                });
            };

            var RenderPieByYear = function()
            {
                $.ajax({
                    url : '/welcome/GetCrimeAnalysisByYear',
                    method : 'POST',
                    data : {
                        year : $("#year_selector").val()
                    },
                    dataType : "json",
                    beforeSend : function(){
                    },
                    success : function(data){
                        if(data.success)
                        {
                            var valid_pie = false;
                            $.each(data.content,function(key,value){
                                var int_value = parseInt(value['value']);
                                data.content[key]['value'] = int_value;
                                if(int_value > 0)
                                {
                                    valid_pie = true;
                                }
                            });

                            if(valid_pie)
                            {
                                $("#tabular-view").fadeIn();
                                $(".no-data-found").css("display","none");
                                $("#myPie").fadeIn();
                                if(pie == null)
                                {
                                    window.pie = new d3pie("myPie", {
                                            header: {
                                            },
                                            data: {
                                                    content: data.content
                                            }
                                    });
                                }
                                else
                                {
                                    pie.updateProp("data.content", data.content);
                                }
                                
                                RenderTabularView(data.content);
                            }
                            else
                            {
                               $(".no-data-found").css("display","block");
                               $("#myPie").fadeOut();
                               $("#tabular-view").fadeOut();
                            }
                        }
                        else
                        {
                            swal("Error", "Error connecting to server.", "error");
                        }
                    },
                    error : function(){
                        swal("Error", "Error connecting to server.", "error");
                    }
                });
            };

            var RenderPieByWeek = function()
            {
                $.ajax({
                    url : '/welcome/GetCrimeAnalysisByWeek',
                    method : 'POST',
                    data : {
                        week : $("#week_selector").val()
                    },
                    dataType : "json",
                    beforeSend : function(){
                    },
                    success : function(data){
                        if(data.success)
                        {
                            var valid_pie = false;
                            $.each(data.content,function(key,value){
                                var int_value = parseInt(value['value']);
                                data.content[key]['value'] = int_value;
                                if(int_value > 0)
                                {
                                    valid_pie = true;
                                }
                            });

                            if(valid_pie)
                            {
                                $("#tabular-view").fadeIn();
                                $(".no-data-found").css("display","none");
                                $("#myPie").fadeIn();
                                if(pie == null)
                                {
                                    window.pie = new d3pie("myPie", {
                                            header: {
                                            },
                                            data: {
                                                    content: data.content
                                            }
                                    });
                                }
                                else
                                {
                                    pie.updateProp("data.content", data.content);
                                }
                                
                                RenderTabularView(data.content);
                            }
                            else
                            {
                               $(".no-data-found").css("display","block");
                               $("#myPie").fadeOut();
                               $("#tabular-view").fadeOut();
                            }
                        }
                        else
                        {
                            swal("Error", "Error connecting to server.", "error");
                        }
                    },
                    error : function(){
                        swal("Error", "Error connecting to server.", "error");
                    }
                });
            };

            var RenderPieByDay = function()
            {
                $.ajax({
                    url : '/welcome/GetCrimeAnalysisByDay',
                    method : 'POST',
                    data : {
                        day : $("#day_selector").val()
                    },
                    dataType : "json",
                    beforeSend : function(){
                    },
                    success : function(data){
                        if(data.success)
                        {
                            var valid_pie = false;
                            $.each(data.content,function(key,value){
                                var int_value = parseInt(value['value'])
                                data.content[key]['value'] = int_value;
                                if(int_value > 0)
                                {
                                    valid_pie = true;
                                }
                            });

                            if(valid_pie)
                            {
                                $("#tabular-view").fadeIn();
                                $(".no-data-found").css("display","none");
                                $("#myPie").fadeIn();
                                if(pie == null)
                                {
                                    window.pie = new d3pie("myPie", {
                                            header: {
                                            },
                                            data: {
                                                    content: data.content
                                            }
                                    });
                                }
                                else
                                {
                                    pie.updateProp("data.content", data.content);
                                }
                                
                                RenderTabularView(data.content);
                            }
                            else
                            {
                               $(".no-data-found").css("display","block");
                               $("#myPie").fadeOut();
                               $("#tabular-view").fadeOut();
                            }
                        }
                        else
                        {
                            swal("Error", "Error connecting to server.", "error");
                        }
                    },
                    error : function(){
                        swal("Error", "Error connecting to server.", "error");
                    }
                });
            };
            
            var RenderTabularView = function(data)
            {
                $("#tabular-view").css("display","block");
                $("#tbl-tabular-view tbody").html();
                var TabularView = '';
                $.each(data,function(key,value){
                    TabularView += "<tr>\n\
                                        <td>"+ value.label +"</td>\n\
                                        <td>"+ value.value +"</td>\n\
                                    </tr>";
                });
                $("#tbl-tabular-view tbody").html(TabularView);
            };
        </script>