
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin Template for Bootstrap</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <?php
        
        if(isset($_POST['submit']))
        {
          //php action
          $username = validate($_POST['username']);
          $password = validate($_POST['password']);
          
          if($username == NULL || $password == NULL)
          {
              output_msg("f","Please fill all data");
              redirect(2,"index.php");
          }
          else
          {
              // username    password
              $password = enc_pass($password);
              
              $result = mysqli_query($con,"SELECT * FROM admin WHERE admin_username = '$username' and admin_password = '$password' ");
              if($result)
              {
                if(mysqli_num_rows($result)>0)
                {
                  $_SESSION['final_project_login'] = "yes";
                  
                  $row = mysqli_fetch_array($result);
                  
                  $_SESSION['admin_username'] = $row['admin_username'];
                  $_SESSION['admin_email']    = $row['admin_email'];
                  $_SESSION['admin_id']       = $row['admin_id'];
                  
                  
                  output_msg("s","Welcome $username");
                  redirect(2,"index.php");
                }
                else
                {
                  output_msg("f","Wrong Username/Password");
                  redirect(2,"index.php");
                }
              }
              else
              {
                output_msg("f","SQL Error!");
                redirect(2,"index.php");
              }
          }
          
        }
        else
        {
          ?>
            <form class="form-signin" method="post" action="<?php echo validate($_SERVER['PHP_SELF']); ?>">
              <h2 class="form-signin-heading">Please sign in</h2>
              <label for="inputusername" class="sr-only">Username</label>
              <input name="username" type="text" id="inputusername" class="form-control" placeholder="Username" autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password">
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
            </form>
          <?php
        }
      
      ?>
    </div>
  </body>
</html>
