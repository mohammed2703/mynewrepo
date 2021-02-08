<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        
        $result = mysqli_query($con,"SELECT * FROM category");
        
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row=mysqli_fetch_array($result))
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['category_id']; ?></td>
                                            <td><?php echo $row['category_name']; ?></td>
                                            <td><a href="editcategory.php?category_id=<?php echo $row['category_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td><a href="deletecategory.php?category_id=<?php echo $row['category_id']; ?>"><span style="color: red;" class="glyphicon glyphicon-trash"></span></a></td>
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
                redirect(2,"addcategory.php");
            }
        }
        else
        {
            output_msg("f","SQL Error!");
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