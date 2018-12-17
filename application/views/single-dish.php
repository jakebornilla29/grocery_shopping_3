<?php include "include/head2.php";?>
<?php include "include/head.php";?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="product-content-right">

                    <!--Main Product Area-->

                    <?php
                    if(isset($dish)){
                        foreach ($dish as $row){
                            ?>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img style="height: 350px; width: 350px" src="<?php echo base_url('/uploads/'.$row->file_name) ?>" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="product-inner">
                                        <h2 class="product-name"><?php echo $row->dish_name ?></h2>
                                        <div class="product-inner-price">
                                            <ins>PHP <?php echo $row->product_price ?></ins>
                                        </div>


                                        <br/><br/>

                                        <div role="tabpanel">
                                            <ul class="product-tab" role="tablist">
                                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>

                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                    <h2>Product Description</h2>
                                                    <p>
                                                        <?php echo $row->product_des ?>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <!--End Main Product Area-->

                    <br/><br/><br/><br/><br/>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include "include/footer.php";?>
<?php include "include/footer2.php";?>