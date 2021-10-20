<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    // update item quantity
    function updateCartItem(obj,rowid){
        $.get("<?php echo base_url('soft/products/update_cart/'); ?>",{rowid:rowid, qty:obj.value},
        function(resp){
            if (resp == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, Please try again.');
            }
        });
    }
</script>

<!-- Shopping cart section  -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
            <?php if ($cartItems) :?>
            <?php foreach ($cartItems as $item) :?>
            
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo '/soft/public/uploads/products/'.$item['image'];  ?>" style="height:
                        120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-6">
                        <h5 class="font-baloo font-size-20">
                            <?php echo $item['name'] ?? "Unknown"; ?>
                        </h5>
                        <small>by
                        <?php foreach($all_published_brand as $single_brand){?>
                        <?php $brand = $single_brand->brand_id; ?>
                        <?php if ($brand == $item['brand']){ ?>
                            <?php echo $single_brand->brand_name ?? "Brand"; ?>

                        <?php }?>
                        <?php }?>
                        </small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="font-rale w-25">
                            <form action="<?php echo base_url('soft/products/update_cart'); ?>" method="post">
                                <input class="qty_input border px-2 w-100 bg-light" type="number" name="qty" value="<?php echo $item['qty'] ?>"/>
                                <input class="qty_input border px-2 w-100 bg-light" type="hidden" name="rowid" value="<?php echo $item['rowid'] ?>"/>
                            </div>
                            <input class="btn text-danger" type="submit" name="submit" value="Update"/>
                            <a class="btn text-danger" href="<?php echo base_url('soft/products/deleteFromCart/'.$item['rowid']); ?>">Delete</a>
                        </form>
                            
                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-4 text-right">
                        <div class="font-size-20 text-success font-baloo text-center">
                        Single Product : <small class="text-success">USD: $<?php echo $item['price']; ?></small>
                        </div>
                        <div class="font-size-20 text-danger font-baloo text-center">
                        Total Price : USD : $<span class="product_price" data-id="<?php echo $item['id'] ?? '0'; ?>">
                                <?php echo $item['subtotal'] ?? 0; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php endforeach; ?>
                <?php else: ?>
                <p class="text-center">No Product have been found!</p>
                <?php endif; ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is
                        eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal (
                            <?php echo $totalItems; ?> item):<br> <span
                                class="text-danger">USD :&nbsp;$<span class="text-danger" id="deal-price">
                                    <?php echo $total; ?>
                                </span> </span>
                        </h5>
                        <a href="<?php echo base_url('soft/checkout/'); ?>" type="submit" class="btn btn-warning mt-3">Proceed to Buy</a>
                        <a href="<?php echo base_url('soft/payment/create_payment'); ?>" type="submit" class="btn btn-warning mt-3">Buy with Paypal</a>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->
