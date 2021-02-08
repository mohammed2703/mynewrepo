<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        include_once("footer.php");
    }
    else
    {
        // display login form
        include_once("login.php");
    }
?>