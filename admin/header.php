<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
            background-image:url("wasser_tropfen_unsplash_600.jpg");background-repeat:no-repeat;background-attachment:fixed;background-size:cover;
        
           }
    </style>
  </head>
  <body>
    
    <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo strtoupper($_SESSION['admin_username']); ?></a>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="editpassword.php">Edit Password</a></li>
              <li><a href="editaccount.php">Edit Account</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul class="nav nav-pills nav-stacked">
                  <?php
                    
                    if($_SESSION['admin_id']==1)
                    {
                      ?>
                        <li class="active"><a href="#">Admin</a></li>
                        <li><a href="addadmin.php">Add</a></li>
                        <li><a href="viewadmin.php">View</a></li>
                      <?php
                    }
                  
                  ?>
                    
                    
                    <li class="active"><a href="#">Category</a></li>
                    <li><a href="addcategory.php">Add</a></li>
                    <li><a href="viewcategory.php">View</a></li>
                    
                    <li class="active"><a href="#">Product</a></li>
                    <li><a href="addproduct.php">Add</a></li>
                    <li><a href="viewproduct.php">View</a></li>
                </ul>
            </div>
            
            
            <div class="col-md-9">