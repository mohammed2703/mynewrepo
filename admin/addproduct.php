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
            $product_name = validate($_POST['product_name']);
            $product_category_id = intval($_POST['category_id']);
            $product_price = intval($_POST['product_price']);
            $product_desc  = validate($_POST['product_desc']);
            
            $product_image_name = time().$_FILES['product_image']['name'];
            $product_image_old_path = $_FILES['product_image']['tmp_name'];
            
            
            
            if($product_name == NULL || $product_category_id == NULL ||
               $product_price == NULL || $product_desc == NULL ||
               $product_image_old_path == NULL)
            {
                output_msg("f","Please fill all data");
                redirect(2,"addproduct.php");
            }
            else
            {
                $result = mysqli_query($con,"INSERT INTO product VALUES (NULL,'$product_name',$product_category_id,$product_price,'$product_desc','$product_image_name')");
                
                if($result)
                {
                    if(move_uploaded_file($product_image_old_path,"../imgs/$product_image_name"))
                    {
                        output_msg("s","Product Added");
                        redirect(2,"viewproduct.php");
                    }
                    else
                    {
                        output_msg("f","Unexpected Error!");
                        redirect(2,"addproduct.php");
                    }
                }
                else
                {
                    output_msg("f","SQL Error!");
                    redirect(2,"addproduct.php");
                }
                
            }
            
        }
        else
        {
            // html form
            ?>
                 <form class="form-signin" method="post" action="<?php echo validate($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                    <h4 class="form-signin-heading">Add Product</h4>
                    <label for="inputproductname">Product Name</label>
                    <input name="product_name" type="text" id="inputproductname" class="form-control" placeholder="Product Name" autofocus>
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
                                    while($row_category = mysqli_fetch_array($result_category))
                                    {
                                       ?>
                                            <option value="<?php echo $row_category['category_id']; ?>"><?php echo $row_category['category_name']; ?></option>
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
                    <input name="product_price" type="number" id="inputprice" class="form-control" placeholder="Price">
                    <br>
                    <label for="inputemail">Desc</label>
                    <textarea class="form-control" name="product_desc"></textarea>
                    <br>
                    <label>Image</label>
                    <input type="file" name="product_image"  class="form-control">
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