<?php
include_once("header.php");

?>
    <!-- Start of slider -->
    <div class="row">
       <div class="col-md-8 col-md-offset-2">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
             <!-- Indicators -->
             <ol class="carousel-indicators">
               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
               <li data-target="#carousel-example-generic" data-slide-to="2"></li>
               <li data-target="#carousel-example-generic" data-slide-to="3"></li>
               <li data-target="#carousel-example-generic" data-slide-to="4"></li>
             </ol>
           
             <!-- Wrapper for slides -->
             <div class="carousel-inner" role="listbox">
                <?php
                    $result = mysqli_query($con,"SELECT * FROM product ORDER BY product_id DESC limit 3");
                    if($result)
                    {
                        if(mysqli_num_rows($result)>0)
                        {
                            $index = 1;
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                    <div class="item <?php if($index == 1) { echo "active"; $index++; } ?>">
                                        <img src="imgs/<?php echo $row['product_image']; ?>" style="width: 60%; height: 400px;margin:auto;">
                                        <div class="carousel-caption" style="background: #000;width: 40%;margin:auto;opacity: 0.7;">
                                          <?php
                                            echo $row['product_name'];
                                          ?>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    }
                ?>
             </div>
             <!-- Controls -->
             <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
               <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
             </a>
             <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
               <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
             </a>
          </div>
       </div>
       <div class="col-md-2"></div>
    </div>
    
    <!-- End of slider -->
    
    
    <!-- Start of latest products -->
    <div class="row">
       <br><br>
       <h3><span class="glyphicon glyphicon-thumbs-up"></span> <span style="margin-left: 1%;text-decoration: underline;">Latest products</span></h3>
       
       <?php
            
            $result = mysqli_query($con,"SELECT * FROM product ORDER BY product_id DESC limit 12");
            if($result)
            {
                if(mysqli_num_rows($result)>0)
                {
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
                }
            }
       ?>
    </div>
    <!-- End latest products -->
    
    
    
    <!-- Start our partners -->
    <div class="text-center" style="margin: 15% 0px;">
       <h3>
          <i class="fa fa-handshake-o" aria-hidden="true"></i>
          <span style="text-decoration: underline;">Our Partners</span>
          <i class="fa fa-handshake-o" aria-hidden="true"></i>
       </h3>
       <br>
       <div class="row">
          <div class="col-sm-2">
             <img src="imgs/partners/1.png" class="img-responsive" style="width:100%" alt="Image">
             <p>Partner 1</p>
          </div>
          <div class="col-sm-2">
             <img src="imgs/partners/2.png" class="img-responsive" style="width:100%" alt="Image">
             <p>Partner 2</p>
          </div>
          <div class="col-sm-2">
             <img src="imgs/partners/3.png" class="img-responsive" style="width:100%" alt="Image">
             <p>Partner 3</p>
          </div>
          <div class="col-sm-2">
             <img src="imgs/partners/4.png" class="img-responsive" style="width:100%" alt="Image">
             <p>Partner 4</p>
          </div>
          <div class="col-sm-2">
             <img src="imgs/partners/5.png" class="img-responsive" style="width:100%" alt="Image">
             <p>Partner 5</p>
          </div>
          <div class="col-sm-2">
             <img src="imgs/partners/1.png" class="img-responsive" style="width:100%" alt="Image">
             <p>Partner 6</p>
          </div>
       </div>
    </div>
    <!-- End our partners-->
    

<?php
include_once("footer.php");
?>