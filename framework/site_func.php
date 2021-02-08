<?php
    
    function enc_pass($password)
    {
        $password = md5($password);
        $password = substr($password,0,5);
        $password = sha1($password);
        $password = substr($password,0,5);
        
        return $password;
    }
    ###########################################
    
    function validate($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

    ###########################################
    
    function output_msg($status , $msg)
    {
        if($status == "f")
        {
            ?>
                <div class="alert alert-danger">
                    <?php echo $msg; ?>
                </div>
            <?php
        }
        elseif($status=="s")
        {
            ?>
                <div class="alert alert-success">
                    <?php echo $msg; ?>
                </div>
            <?php
        }
    }
    
    ###########################################
    
    function redirect($sec , $url)
    {
        header("refresh:$sec;url=$url");
    }

?>