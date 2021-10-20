<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>


<div class="container">

  <div class="page-header align-items-start section-height-50 pt-5 pb-11  border-radius-lg"
    style="background-image: url('public/assets/img/curved-images/curved14.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Shipping Detail!</h1>
          <p class=" text-white">Total Payment
            <?php echo '$'.$total; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <br />

  <?php

        if (session()->get("message")) {
        ?>
  <div class="alert alert-success">
    <?= session()->get("message") ?>
  </div>
  <?php
        }
        ?>

  <div class="row">
    <div class="col-md-6 ">
      <div class="card z-index-0">
        <div class="card-header text-center py-4">
          <h5>Billing Detail</h5>
        </div>
        <div class="card-body">
          <form role="form text-left" action="/soft/checkout" method="POST">
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Enter Your Name" name="customer_name"
                id="customer_name" value="<?= set_value('customer_name') ?>">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Enter Your Phone Number" name="customer_phone"
                id="customer_phone" value="<?= set_value('customer_phone') ?>">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Enter Your Email" name="customer_email"
                id="customer_email" value="<?= set_value('customer_email') ?>">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Enter Your Address" name="customer_address"
                id="customer_address" value="<?= set_value('customer_address') ?>">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Enter Your City" name="customer_city"
                id="customer_city" value="<?= set_value('customer_city') ?>">
            </div>
            <div class="mb-3">
              <select id="country" name="customer_country" class="form-select">
                <option value="null">Select a Country</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Netherland">Netherland</option>
                <option value="Pakistan">Pakistan</option>
                <option value="USA">USA</option>
              </select>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Enter Your ZipCode" name="customer_zipcode"
                id="customer_zipcode" value="<?= set_value('customer_zipcode') ?>">
            </div>
            <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
            <?php endif; ?>
            <div class="form-check form-check-info text-left">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
              <label class="form-check-label" for="flexCheckDefault">
                I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
              </label>
            </div>
            <div class="text-center">
              <button type="submit" name="placeOrder" class="btn bg-warning  w-100 my-4 mb-2">Place Order</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h3 id="order_review_heading">Your order</h3>

      <div id="order_review" style="position: relative;">

        <table class="shop_table table">
          <thead>
            <tr>
              <th class="product-name">Product</th>
              <th class="product-qty">QTY</th>
              <th class="product-total">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr class="cart_item">
              <?php if ($cartItems) :?>
              <?php foreach ($cartItems as $item) :?>
              <td class="product-name">
                <?php echo $item['name'] ?? "Unknown"; ?> <strong class="product-quantity">

                </strong>
              </td>
              <td class="product-qty">
                <?php echo $item['qty'] ?>
              </td>
              <td class="product-total">
                <span class="amount">
                  <?php echo '$' .$item['subtotal'] ?? 0; ?>
                </span>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <p class="text-center">No Product have been found!</p>
            <?php endif; ?>
          </tbody>
          <tfoot>

            <tr class="cart-subtotal">
              <th>Cart Subtotal</th>
              <td></td>
              <td><span class="amount">
                  <?php echo '$'.$total; ?>
                </span>
              </td>
            </tr>

            <tr class="shipping">
              <th>Shipping and Handling</th>
              <td></td>
              <td>
                <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0"
                  name="shipping_method[0]">$0
              </td>
            </tr>


            <tr class="order-total">
              <th>Order Total</th>
              <td></td>
              <td><strong><span class="amount">
                    <?php echo '$'.$total; ?>
                  </span></strong> </td>
            </tr>

          </tfoot>
        </table>


        <div id="payment">
          <ul class="payment_methods methods">
            <li class="payment_method_bacs">
              <input type="radio" data-order_button_text="" value="bacs" checked="checked" name="payment_method"
                class="input-radio" id="payment_method_bacs">
              <label for="payment_method_bacs">Direct Bank Transfer </label>
              <div class="payment_box payment_method_bacs">
                <p>Make your payment directly into our bank account. Please use your Order ID as the
                  payment reference. Your order won’t be shipped until the funds have cleared in our
                  account.</p>
              </div>
            </li>
            <li class="payment_method_cheque">
              <input type="radio" data-order_button_text="" value="Stripe_form" name="payment_method"
                class="input-radio Stripe_payment" id="payment_method_cheque>
                            <label for=" payment_method_cheque">Stripe Payment </label>
              <div style="display:none;" class="payment_box payment_method_cheque">
                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State /
                  County, Store Postcode.</p>
              </div>
            </li>
            <li class="payment_method_paypal">
              <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method"
                class="input-radio" id="payment_method_paypal">
              <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark"
                  src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a
                  title="What is PayPal?"
                  onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"
                  class="about_paypal" href="https://www.paypal.com/gb/webapps/mpp/paypal-popup">What
                  is PayPal?</a>
              </label>
              <div style="display:none;" class="payment_box payment_method_paypal">
                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                </p>
              </div>
            </li>
          </ul>



          <div class="clear"></div>

        </div>
      </div>
    </div>
  </div>

</div>