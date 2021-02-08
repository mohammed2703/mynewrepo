<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        if(isset($_GET['product_id']))
        {
            $product_id = intval($_GET['product_id']);
            
            $result_product = mysqli_query($con,"SELECT * FROM product WHERE product_id=$product_id");
            if($result_product)
            {
                if(mysqli_num_rows($result_product)>0)
                {
                    $row_product = mysqli_fetch_array($result_product);
                    
                    $result = mysqli_query($con,"DELETE FROM product WHERE product_id = $product_id");
                    if($result)
                    {
                        unlink("../imgs/$row_product[product_image]");
                        output_msg("s","Product Deleted");
                        redirect(2,"viewproduct.php");
                    }
                    else
                    {
                        output_msg("f","SQL Error!");
                        redirect(2,"viewproduct.php");
                    }
                }
            }
        }
        else
        {
            output_msg("f","unexpected Error!");
            redirect(2,"viewproduct.php");
        }
        
        include_once("footer.php");
    }
    else
    {
        // display login form
        include_once("login.php");
    }
?>