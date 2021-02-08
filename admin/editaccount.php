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
            $username = validate($_POST['username']);
            $email    = validate($_POST['email']);
            
            if($username == NULL || $email == NULL)
            {
                output_msg("f","Please fill all data");
                redirect(2,"editaccount.php");
            }
            else
            {
                $result = mysqli_query($con,"UPDATE admin SET admin_username = '$username', admin_email = '$email' WHERE admin_id = $_SESSION[admin_id]");     
                if($result)
                {
                    $_SESSION['admin_username'] = $username;
                    $_SESSION['admin_email']    = $email;
                    
                    output_msg("s","Account information updated");
                    redirect(2,"index.php");
                }
                else
                {
                    output_msg("f","SQL Error!");
                    redirect(2,"editaccount.php");
                }
            }
            
        }
        else
        {
            // html form
            ?>
            <form class="form-signin" method="post" action="<?php echo validate($_SERVER['PHP_SELF']); ?>">
              <h4 class="form-signin-heading">Edit Account</h4>
              <label for="inputusername">Username</label>
              <input value="<?php echo $_SESSION['admin_username']; ?>" name="username" type="Username" id="inputusername" class="form-control" placeholder="Username" autofocus>
              <br>
              <label for="inputemail">E-mail</label>
              <input value="<?php echo $_SESSION['admin_email']; ?>" name="email" type="email" id="inputemail" class="form-control" placeholder="Email">
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