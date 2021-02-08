<?php
include_once("header.php");
?>
    <div class="container-contact100">
        <div class="wrap-contact100">
            <?php
                if(isset($_POST['submit']))
                {
                    //php action
                    $name = validate($_POST['username']);
                    $email = validate($_POST['email']);
                    $phone = validate($_POST['phone']);
                    $message = validate($_POST['message']);
                    
                    if($name==NULL || $email==NULL || $phone==NULL || $message==NULL)
                    {
                        output_msg("f","Please fill all data");
                        redirect(2,"contactus.php");
                    }
                    else
                    {
                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        
                        
                        $to = "admin@itgate.com";
                        $subject = "You have a message";
                        $message = "
                                    <b>Name  :</b>  $name <br>
                                    <b>E-mail : </b> $email <br>
                                    <b>Phone : </b> $phone <br>
                                    <b> Message : </b> $message
                                    ";
                                    
                        if(@mail($to,$subject,$message,$headers))
                        {
                            output_msg("s","Message Sent");
                            redirect(2,"contactus.php");
                        }
                        else
                        {
                            output_msg("f","Message not sent");
                            redirect(2,"contactus.php");
                        }
                    }
                }
                else
                {
                    // html form
                    ?>
                        
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <span class="contact100-form-title">
                               Get in Touch
                            </span>
                            <div class="wrap-input100">
                               <input class="input100" id="name" type="text" name="username" placeholder="Name">
                               <label class="label-input100" for="name">
                                  <span class="lnr lnr-user"></span>
                               </label>
                            </div>
                            <div class="wrap-input100">
                               <input class="input100" id="email" type="text" name="email" placeholder="Email">
                               <label class="label-input100" for="email">
                                  <span class="lnr lnr-envelope"></span>
                               </label>
                            </div>
                            <div class="wrap-input100">
                               <input class="input100" id="phone" type="text" name="phone" placeholder="Phone">
                               <label class="label-input100" for="phone">
                                  <span class="lnr lnr-phone-handset"></span>
                               </label>
                            </div>
                            <div class="wrap-input100">
                               <textarea class="input100" name="message" placeholder="Your message..."></textarea>
                            </div>
                            <div class="text-center">
                               <button class="btn btn-danger" type="submit" name="submit">
                               <span class="glyphicon glyphicon-send"></span>
                               </button>
                            </div>
                         </form>
                    <?php
                }
            
            ?>
        </div>
     </div>
<?php
include_once("footer.php");
?>