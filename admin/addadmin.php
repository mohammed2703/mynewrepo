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
            //php action
            $username = validate($_POST['username']);
            $password = validate($_POST['password']);
            $email    = validate($_POST['email']);
            
            if($username == NULL || $password == NULL || $email == NULL)
            {
                output_msg("f","Please fill all data");
                redirect(2,"addadmin.php");
            }
            else
            {
                $password = enc_pass($password);
                
                $result = mysqli_query($con,"INSERT INTO admin VALUES(NULL,'$username','$password','$email')");
                if($result)
                {
                    output_msg("s","Admin Added");
                    redirect(2,"viewadmin.php");
                }
                else
                {
                    output_msg("f","SQL Error !");
                    redirect(2,"viewadmin.php");
                }
            }
            
        }
        else
        {
            //html Form
            ?>
                <form class="form-signin" method="post" action="<?php echo validate($_SERVER['PHP_SELF']); ?>">
                    <h4 class="form-signin-heading">Add admin</h4>
                    <label for="inputusername">Username</label>
                    <input name="username" type="text" id="inputusername" class="form-control" placeholder="Username" autofocus>
                    <br>
                    <label for="inputPassword">Password</label>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password">
                    <br>
                    <label for="inputemail">E-mail</label>
                    <input name="email" type="email" id="inputemail" class="form-control" placeholder="E-mail" autofocus>
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