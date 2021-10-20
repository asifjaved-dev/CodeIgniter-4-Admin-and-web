<!--   product  -->

<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?=" ../public/uploads/products/".$product['product_image']; ?>" alt="product"
                class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <a class="btn btn-danger form-control my-2"
                            href="<?php echo base_url('soft/products/buynow/'.$product['product_id']); ?>">Buy Now</a>
                    </div>
                    <div class="col">
                        <a class="btn btn-warning form-control"
                            href="<?php echo base_url('soft/products/addToCart/'.$product['product_id']); ?>">Add to
                            Cart</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20">
                    <?php echo $product['product_title']; ?>
                </h5>
                <small>by

                    <?php foreach($all_published_brand as $single_brand){?>
                    <?php $brand_id=$single_brand->brand_id; ?>
                    <?php if ($brand_id==$product['product_brand'] ){?>
                    <?php echo $single_brand->brand_name ?? "Brand"; ?>
                </small>
                <?php }?>
                <?php }?>
                <!---    Product Rating      -->
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings | 1000+ answered questions</a>
                </div>
                <!---    Product Rating       -->
                <hr class="m-0">

                <!---    Product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>$ :&nbsp;
                                <?php echo $product['product_price'] + 20 ?? 0; ?>
                            </strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger">USD :&nbsp;$<span class="product_price"
                                data-id="<?php echo $product['0']->id ?? '0'; ?>">
                                <?php echo $product['product_price'] ?? 0; ?>
                            </span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger">PKR :&nbsp;$20</span></td>
                    </tr>
                </table>
                <!---    !Product price       -->

                <!--    #policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 Days <br> Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck  border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Airomob<br>Deliverd</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Year <br>Warranty</a>
                        </div>
                    </div>
                </div>
                <!--    !policy -->
                <hr>

                <!-- order-details -->
                <div id="order-details" class="font-rale d-flex flex-column text-dark">
                    <small>Delivery by : Mar 29 - Apr 1</small>
                    <small class="text-danger">Sold by <a href="#">Mani Mobile</a>&nbsp;&nbsp;(4.5 out of 5 | 18,198
                        ratings)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer -
                        424201</small>
                </div>
                <!-- !order-details -->

                <div class="row">
                    <!-- color -->
                    <div class="col-6">
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-baloo">Color:</h6>
                                <div class="p-2 color-yellow-bg rounded-circle"><button
                                        class="btn font-size-14"></button></div>
                                <div class="p-2 color-primary-bg rounded-circle"><button
                                        class="btn font-size-14"></button></div>
                                <div class="p-2 color-second-bg rounded-circle"><button
                                        class="btn font-size-14"></button></div>
                            </div>
                        </div>
                    </div>
                    <!-- !color -->

                    <!-- Product qty section -->
                    <div class="col-6">
                        <div class="qty d-flex">
                            <h6 class="font-baloo">Qty</h6>
                            <div class="px-4 d-flex font-rale">
                                <button class="qty-up border bg-light"
                                    data-id="<?php echo $product['product_id']; ?>"><i
                                        class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $product['product_id']; ?>"
                                    class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $product['product_id']; ?>"
                                    class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- !Product qty section -->
                </div>

                <!-- size -->
                <div class="size my-3">
                    <h6 class="font-baloo">Size :</h6>
                    <div class="d-flex justify-content-between w-75">
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">4GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">6GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">8GB RAM</button>
                        </div>
                    </div>
                </div>
                <!-- !size -->


            </div>

            <!-- Product Desscription -->
            <div class="col-12">
                <h6 class="font-rubik font-size-20">Product Description</h6>
                <hr>
                <b class="font-rubik font-size-16">
                    <?php echo $product['product_title']; ?>
                </b>
                <p class="font-rale font-size-14 mt-3">
                    <?php echo $product['product_short_description']; ?>
                </p>
                <p class="font-rale font-size-14 mt-3">
                    <?php echo $product['product_long_description']; ?>
                </p>
            </div>
            <!-- !Product Desscription -->
        </div>
    </div>
</section>
<!--   !Product  -->