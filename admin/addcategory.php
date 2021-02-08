<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        if(isset($_POST['submit']))
        {
            // php action
            $category_name = validate($_POST['categoryname']);
            
            if($category_name == NULL)
            {
                output_msg("f","Please fill all data");
                redirect(2,"addcategory.php");
            }
            else
            {
                $result = mysqli_query($con,"INSERT INTO category VALUES(NULL,'$category_name')");
                if($result)
                {
                    output_msg("s","Category Added");
                    redirect(2,"viewcategory.php");
                }
                else
                {
                    echo mysqli_error($con);
                    output_msg("f","SQL Error!");
                    redirect(2,"addcategory.php");
                }
            }
        }
        else
        {
            // html form
            ?>
                <form class="form-signin" method="post" action="<?php echo validate($_SERVER['PHP_SELF']); ?>">
                    <h4 class="form-signin-heading">Add Category</h4>
                    <label for="inputcategoryName">Category Name</label>
                    <input name="categoryname" type="text" id="inputcategoryName" class="form-control" placeholder="Category Name" autofocus>
                    <br>
                    <button class="btn btn-primary" type="submit" name="submit">Add</button>
                </form>
            <?php
        }
        
        include_once("footer.php");
    }
    else
    {
        // display login form
        include_once("login.php");
    }
?>