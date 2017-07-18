<!DOCTYPE html> 
<html lang = "en"> 

   <head> 
      <meta charset = "utf-8"> 
      <title>CodeIgniter View Example</title> 
      <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.min.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
      <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/sweetalert.css">
      <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/loader.css">
      <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Condensed" rel="stylesheet">
      <script type = 'text/javascript' src = "<?php echo base_url();?>js/jquery-1.11.3.js"></script>
      <script type = 'text/javascript' src = "<?php echo base_url();?>js/bootstrap.min.js"></script>
      <script type = 'text/javascript' src = "<?php echo base_url();?>js/sweetalert.min.js"></script>
      <script type = 'text/javascript' src = "<?php echo base_url();?>js/script.js"></script>
      
   </head>
	
       <body>
        <div class="loader">
            <div class="loader-graphic">
                <svg class="circle-loader progress" width="40" height="40" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="20" cy="20" r="15">
                </svg>
            </div>
        </div>
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <button class="menu-icon">
                </button>
                <a class="navbar-brand" href="#">iCrime</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav modules">
                  <li class="active"><a href="admin/crimeAnalysis">Crime Analysis</a></li>
                  <li><a href="admin/blotters">Blotters</a></li>
                  <li><a href="admin/wantedList">Wanted List</a></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="admin/adminUsers">Admin Users</a></li>
                      <li><a href="admin/appUsers">App Users</a></li>
                    </ul>
                  </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </ul>
              </div>
            </div>
        </nav>
<!--        <div class="left-nav col-xs-2">
            <ul class="list-group">
                <li class="list-group-item">New <span class="badge">12</span></li>
                <li class="list-group-item">Deleted <span class="badge">5</span></li> 
                <li class="list-group-item">Warnings <span class="badge">3</span></li> 
            </ul>
        </div>-->
        <div class="col-xs-12">
            <div class="container">
                <div class="main-container">