<?php
    session_start();
    include_once("../framework/site_func.php");
    include_once("../framework/config.php");
    
    if(isset($_SESSION['final_project_login']))
    {
        // logged in
        include_once("header.php");
        
        if(isset($_GET['product_id']))
        {
            $product_id = intval($_GET['product_id']);
            
            $result_old = mysqli_query($con,"SELECT * FROM product WHERE product_id=$product_id");
            if($result_old)
            {
                if(mysqli_num_rows($result_old)>0)
                {
                    $row_old = mysqli_fetch_array($result_old);
                    
                    if(isset($_POST['submit']))
                    {
                        //php action
                        $product_name = validate($_POST['product_name']);
                        $product_category_id = intval($_POST['category_id']);
                        $product_price = intval($_POST['product_price']);
                        $product_desc  = validate($_POST['product_desc']);
                        
                        $product_image_name = time().$_FILES['product_image']['name'];
                        $product_image_old_path = $_FILES['product_image']['tmp_name'];
                        
                        if($product_name!=NULL and $product_category_id!=NULL and
                           $product_price!=NULL and $product_desc!=NULL and
                           $product_image_old_path!=NULL)
                        {
                            // update image
                            $result = mysqli_query($con,"UPDATE product SET
                                                         product_name = '$product_name',
                                                         product_price= $product_price,
                                                         product_desc='$product_desc',
                                                         product_category_id=$product_category_id,
                                                         product_image = '$product_image_name'
                                                         WHERE product_id = $product_id");
                            if($result)
                            {
                                if(move_uploaded_file($product_image_old_path,"../imgs/$product_image_name"))
                                {
                                    unlink("../imgs/$row_old[product_image]");
                                    output_msg("s","Product updated");
                                    redirect(2,"viewproduct.php");
                                }
                                else
                                {
                                    output_msg("f","Unexpected Error!");
                                    redirect(2,"editproduct.php?product_id=$product_id");
                                }
                            }
                            else
                            {
                                output_msg("f","SQL Error!");
                                redirect(2,"editproduct.php?product_id=$product_id");
                            }
                        }
                        elseif($product_name!=NULL and $product_category_id!=NULL and
                               $product_price!=NULL and $product_desc!=NULL)
                        {
                            // update without image
                            $result = mysqli_query($con,"UPDATE product SET
                                                         product_name = '$product_name',
                                                         product_price= $product_price,
                                                         product_desc='$product_desc',
                                                         product_category_id=$product_category_id
                                                         WHERE product_id = $product_id");
                            if($result)
                            {
                                output_msg("s","Product updated");
                                redirect(2,"viewproduct.php");
                            }
                            else
                            {
                                output_msg("f","SQL Error!");
                                redirect(2,"editproduct.php?product_id=$product_id");
                            }
                            
                        }
                        else
                        {
                            // can not update     fill data
                            output_msg("f","Please fill all data");
                            redirect(2,"editproduct.php?product_id=$product_id");
                        }
                        
                        
                    }
                    else
                    {
                        // html form
                        ?>
                            <form class="form-signin" method="post" action="<?php echo validate($_SERVER['PHP_SELF'])."?product_id=$product_id"; ?>" enctype="multipart/form-data">
                                <h4 class="form-signin-heading">Edit Product</h4>
                                <label for="inputproductname">Product Name</label>
                                <input value="<?php echo $row_old['product_name']; ?>" name="product_name" type="text" id="inputproductname" class="form-control" placeholder="Product Name" autofocus>
                                <br>
                                <label>Category Name</label>
                                <?php
                                    
                                    $result_category = mysqli_query($con,"SELECT * FROM category");
                                    if($result_category)
                                    {
                                        if(mysqli_num_rows($result_category)>0)
                                        {
                                            ?>
                                            <select name="category_id" class="form-control">
                                            <?php
                                            //////// product category id old  = 3
                                                while($row_category = mysqli_fetch_array($result_category))
                                                {
                                                   ?>
                                                        <option <?php if($row_old['product_category_id']== $row_category['category_id']) echo "SELECTED"; ?> value="<?php echo $row_category['category_id']; ?>"><?php echo $row_category['category_name']; ?></option>
                                                   <?php
                                                }
                                            ?>
                                            </select>
                                            <?php
                                        }
                                    }
                                ?>
                                <br>
                                <label for="inputprice">Price</label>
                                <input value="<?php echo $row_old['product_price']; ?>" name="product_price" type="number" id="inputprice" class="form-control" placeholder="Price">
                                <br>
                                <label for="inputemail">Desc</label>
                                <textarea class="form-control" name="product_desc"><?php echo $row_old['product_desc']; ?></textarea>
                                <br>
                                <label>Image</label>
                                <input type="file" name="product_image"  class="form-control">
                                <br>
                                <img src="../imgs/<?php echo $row_old['product_image']; ?>" style="width: 100px;">
                                <br><br>
                                <button class="btn btn-primary" type="submit" name="submit">Edit</button>
                            </form>
                        <?php
                    }
                }
                else
                {
                    output_msg("f","Unexpected Error!");
                    redirect(2,"editproduct.php?product_id=$product_id");
                }
            }
            else
            {
                output_msg("f","SQL Error!");
                redirect(2,"editproduct.php?product_id=$product_id");
            }
        }
        else
        {
            output_msg("f","Unexpected Error!");
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