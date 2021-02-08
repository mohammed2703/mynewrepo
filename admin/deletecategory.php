<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        if(isset($_GET['category_id']))
        {
            $category_id = intval($_GET['category_id']);
            
            $result = mysqli_query($con,"DELETE FROM category WHERE category_id=$category_id");
            
            $result_delete_product = mysqli_query($con, "DELETE FROM product WHERE product_category_id = $category_id");
            
            if($result and $result_delete_product)
            {
                output_msg("s","Category Deleted");
                redirect(2,"viewcategory.php");
            }
            else
            {
                output_msg("f","SQL Error!");
                redirect(2,"viewcategory.php");
            }
        }
        else
        {
            output_msg("f","Unexpected Error!");
            redirect(2,"viewcategory.php");
        }
        
        include_once("footer.php");
    }
    else
    {
        // display login form
        include_once("login.php");
    }
?>