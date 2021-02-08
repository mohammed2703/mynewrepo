<?php
    include_once("header.php");
        if(isset($_POST['submit']))
        {
            $search =  validate($_POST['search']);
            
            $result = mysqli_query($con,"SELECT * FROM product WHERE product_name like '%$search%'");
            if($result)
            {
                if(mysqli_num_rows($result)>0)
                {
                    $result_num = mysqli_num_rows($result);
                    output_msg("s","Found [ $result_num ] results");
                    ?>
                    <div class="row">
                    <?php
                    while($row = mysqli_fetch_array($result))
                    {
                        ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                              <img src="imgs/<?php echo $row['product_image']; ?>" style="width: 60%; height: 250px;">
                              <div class="caption">
                                <h3><?php echo $row['product_name']; ?></h3>
                                <p>
                                    <?php
                                        echo substr($row['product_desc'],0,150)." ....";
                                    ?>
                                </p>
                                <p><a href="product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary" role="button">Details</a></p>
                              </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
                }
                else
                {
                    output_msg("f","Found [ 0 ] results");
                }
            }
        }
        else
        {
            output_msg("f","Unexpected Error");
        }
    include_once("footer.php");
?>