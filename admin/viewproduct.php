<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        $result = mysqli_query($con,"SELECT * FROM product");
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = mysqli_fetch_array($result))
                                {
                                    $result_category = mysqli_query($con,"SELECT * FROM category WHERE category_id= $row[product_category_id]");
                                    if($result_category)
                                    {
                                        if(mysqli_num_rows($result_category)>0)
                                        {
                                            $row_category = mysqli_fetch_array($result_category);
                                        }
                                    }
                                    ?>
                                        <tr>
                                            <td><?php echo $row['product_id']; ?></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row_category['category_name']; ?></td>
                                            <td><?php echo $row['product_price']; ?></td>
                                            <td><?php echo $row['product_desc']; ?></td>
                                            <td><img src="../imgs/<?php echo $row['product_image']; ?>" style="width: 200px;"></td>
                                            <td><a href="editproduct.php?product_id=<?php echo $row['product_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                            <td><a href="deleteproduct.php?product_id=<?php echo $row['product_id']; ?>"><span style="color:red;" class="glyphicon glyphicon-trash"></span></a></td>
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
                redirect(2,"addproduct.php");
            }
        }
        else
        {
            output_msg("f","SQL Error!");
            redirect(2,"viewproduct.php");
        }
        
        include_once("footer.php");
    }
    else
    {
        // display login form
        include_once("login.php");
    }
?>