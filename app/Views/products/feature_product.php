<!-- Feature Product -->
<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">Feature Product</h4>
        <hr>

        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">

            <?php if ($products) :?>
            <?php ?>
            <?php foreach ($products as $product) :?>
            <?php $status=$product->product_status; ?>
            <?php $feature=$product->product_feature; ?>
            <?php if ($status>0 && $feature>0) :?>

            <div class="item py-2 bg-light">
                <div class="product font-rale">
                    <a href="products/<?=$product->product_id; ?>"><img src="<?="
                            public/uploads/products/".$product->product_image; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6>
                            <?php echo $product->product_title; ?>
                        </h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>USD
                                <?php echo $product->product_price; ?>
                            </span>
                        </div>
                        <a class="btn btn-warning font-size-12" href="<?php echo base_url('soft/products/addToCart/'.$product->product_id); ?>">Add to Cart</a>
                        <a class="btn btn-danger font-size-12" href="<?php echo base_url('soft/products/buynow/'.$product->product_id); ?>">buy now</a>    
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="text-center">No Posts have been found!</p>
            <?php endif; ?>

        </div>
        <!-- !owl carousel -->

    </div>
</section>
<!-- !Feature Product -->