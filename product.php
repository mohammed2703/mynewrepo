<?php
include_once("header.php");

if(isset($_GET['product_id']))
{
    $product_id = intval($_GET['product_id']);
    
    $result = mysqli_query($con,"SELECT * FROM product WHERE product_id = $product_id");
    if($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            $row = mysqli_fetch_array($result);
            
            $result_category = mysqli_query($con,"SELECT * FROM category WHERE category_id = $row[product_category_id]");
            if($result_category)
            {
                if(mysqli_num_rows($result_category)>0)
                {
                    $row_category = mysqli_fetch_array($result_category);
                    ?>
                        <div class="container-fliud">
                            <div class="wrapper row"  style="margin: 5% 0px;">
                                <div class="preview col-md-4">
                                    <div class="preview-pic tab-content">
                                      <div class="tab-pane active" id="pic-1"><img src="imgs/<?php echo $row['product_image']; ?>" /></div>
                                    </div>
                                </div>
                                <div class="details col-md-8">
                                    <h3 class="product-title"><?php echo $row['product_name']; ?></h3>
                                    <h5 style="color: brown;">Category : <?php echo $row_category['category_name']; ?></h5>
                                    <p class="product-description">
                                        <?php
                                            echo $row['product_desc'];
                                        ?>
                                    </p>
                                    <p class="badge" style="font-size: 14px;padding: 1%;">price: $<?php echo $row['product_price']; ?></p>
                                    <div class="contacts-info__social">
                                        <br>
                                        <h4>
                                            <span>Find us here:</span>
                                        </h4>
                                        <h2>
                                            <ul class="social-icon">
                                                <a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                <a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                                <a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a> 
                                            </ul>
                                        </h2>
                                    </div>
                                    <br>
                                    <hr/>
                                    <div class="product-buttons">   
                                        <a href="#" class="btn btn-icon"><h2><i class="glyphicon glyphicon-shopping-cart"></i> cart</h2></a>
                                        <a href="#" class="btn btn-grey btn-icon"><h2><i class="glyphicon glyphicon-heart-empty"></i> wish</h2></a>     
                                    </div>
                                </div>
                                
                            </div>
                       </div>
                        
                        
                        <div class="row" style="margin: 10% 0px;">
                            <h3><i class="fa fa-star"></i> <span style="margin-left: 1%;text-decoration: underline;">Other products</span></h3>
                            
                            <?php
                                $result = mysqli_query($con,"SELECT * FROM product ORDER BY product_id DESC limit 6");
                                if($result)
                                {
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            ?>
                                                <div class="col-md-2">
                                                    <a href="product.php?product_id=<?php echo $row['product_id']; ?>" class="thumbnail">
                                                      <img src="imgs/<?php echo $row['product_image']; ?>" style="width:100%; height: 100px;">
                                                    </a>
                                                </div>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                       </div>
                    <?php
                }
            }
            ?>
            <?php
        }
    }
}
else
{
    output_msg("f","Unexpected Error!");
}


include_once("footer.php");
?>