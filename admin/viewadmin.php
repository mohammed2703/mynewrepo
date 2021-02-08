<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        $result = mysqli_query($con,"SELECT * FROM admin");
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>E-mail</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['admin_id']; ?></td>
                                            <td><?php echo $row['admin_username']; ?></td>
                                            <td>********</td>
                                            <td><?php echo $row['admin_email']; ?></td>
                                            <td>
                                                <?php
                                                    if($row['admin_id']==1)
                                                    {
                                                        ?>
                                                            <span style="color: black;cursor: not-allowed;" class="glyphicon glyphicon-trash"></span>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                            <a href="deleteadmin.php?admin_id=<?php echo $row['admin_id']; ?>"><span style="color: red;" class="glyphicon glyphicon-trash"></span></a>
                                                        <?php
                                                    }
                                                ?>
                                                
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                <?php
            }
            else
            {
                output_msg("f","There is no data");
                redirect(2,"addadmin.php");
            }
        }
        else
        {
            output_msg("f","SQL Error!");
            redirect(2,"viewadmin.php");
        }
        
        
        include_once("footer.php");
    }
    else
    {
        // display login form
        include_once("login.php");
    }
?>