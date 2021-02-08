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
            $password = validate($_POST['password']);
            
            if($password == NULL)
            {
                output_msg("f","Please fill all data");
                redirect(2,"editpassword.php");
            }
            else
            {
                $password = enc_pass($password);
                
                $result = mysqli_query($con,"UPDATE admin SET admin_password = '$password' WHERE admin_id = $_SESSION[admin_id]");
                if($result)
                {
                    output_msg("s","Password Updated");
                    redirect(2,"index.php");
                }
                else
                {
                    output_msg("f","SQL Error!");
                    redirect(2,"editpassword.php");
                }
            }
        }
        else
        {
            // html form
            ?>
                <form class="form-signin" method="post" action="<?php echo validate($_SERVER['PHP_SELF']); ?>">
                  <h4 class="form-signin-heading">Edit Password</h4>
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password">
                  <br>
                  <button class="btn btn-primary" type="submit" name="submit">Edit</button>
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