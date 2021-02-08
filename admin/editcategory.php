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
            
            $result = mysqli_query($con,"SELECT * FROM category WHERE category_id=$category_id");
            if($result)
            {
                if(mysqli_num_rows($result)>0)
                {
                   $row_old_data = mysqli_fetch_array($result);
                   
                   if(isset($_POST['submit']))
                   {
                        // php action
                        $category_name = validate($_POST['categoryname']);
                        
                        if($category_name == NULL)
                        {
                            output_msg("f","Please fill all data");
                            redirect(2,"editcategory.php?category_id=$category_id");
                        }
                        else
                        {
                            $result = mysqli_query($con , "UPDATE category SET category_name='$category_name' WHERE category_id=$category_id");
                            if($result)
                            {
                                output_msg("s","Category Updated");
                                redirect(2,"viewcategory.php");
                            }
                            else
                            {
                                //echo mysqli_error($con);
                                output_msg("f","SQL Error!");
                                redirect(2,"editcategory.php?category_id=$category_id");
                            }
                        }
                   }
                   else
                   {
                        // html form
                        ?>
                            <form class="form-signin" method="post" action="<?php echo validate($_SERVER['PHP_SELF'])."?category_id=$category_id"; ?>">
                                <h4 class="form-signin-heading">Edit Category</h4>
                                <label for="inputcategoryName">Category Name</label>
                                <input value="<?php echo $row_old_data['category_name'];?>" name="categoryname" type="text" id="inputcategoryName" class="form-control" placeholder="Category Name" autofocus>
                                <br>
                                <button class="btn btn-primary" type="submit" name="submit">Edit</button>
                            </form>
                        <?php
                   }
                }
                else
                {
                    output_msg("f","Unexpected Error!");
                    redirect(2,"editcategory.php?category_id=$category_id");
                }
            }
            else
            {
                output_msg("f","SQL Error!");
                redirect(2,"editcategory.php?category_id=$category_id");
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