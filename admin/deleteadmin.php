<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        if(isset($_GET['admin_id']))
        {
            $admin_id = intval($_GET['admin_id']);
            
            $result = mysqli_query($con,"DELETE FROM admin WHERE admin_id=$admin_id");
            if($result)
            {
                output_msg("s","Admin Deleted");
                redirect(2,"viewadmin.php");
            }
            else
            {
                outputmsg("f","SQL Error!");
                redirect(2,"viewadmin.php");
            }
            
        }
        else
        {
            output_msg("f","Unexpected Error!");
            redirect(2,"viewadmin.php");
        }
        
        
        include_once("footer.php");
    }
    else
    {
        // display login form
        include_once("login.php");
    }
?>