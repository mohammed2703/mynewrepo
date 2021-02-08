<?php
    session_start();
    include_once("../framework/site_func.php");
    
   
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        session_destroy();
        output_msg("s","Logged out successfully");
        redirect(2,"index.php");
        
        include_once("footer.php");
    }
    else
    {
        // display login form
        include_once("login.php");
    }
    
?>