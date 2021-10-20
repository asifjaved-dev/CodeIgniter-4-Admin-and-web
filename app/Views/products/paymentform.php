<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>


<div class="container">

    <h2 style="text-align: center;">Codeigniter Stripe Payment Integration</h2><br />

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
        <div class="col-md-6 Stripe_form box">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading">
                    <h3 class="panel-title">Charge
                        <?php echo '$'.$total; ?> with Stripe
                    </h3>

                    <!-- Product Info -->

                </div>
                <div class="panel-body">

                    <form role="form" action="<?php echo base_url('soft/payment/'.$user_id) ?>" method="post"
                        class="require-validation" data-cc-on-file="false"
                        data-stripe-publishable-key="<?= STRIPE_KEY ?>" id="payment-form">

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Email</label>
                                <input class='form-control StripeElement StripeElement--empty' size='4' type='email' name="payer_email">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' class='form-control card-number ' size='20' type='text'
                                    name="card_number">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'
                                    name="card_exp_month">
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label>
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'
                                    name="card_exp_year">
                            </div>
                        </div>

                        <!-- <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-xs-12 mt-3">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 id="order_review_heading">Your order (test customer Id = <?php echo $user_id; ?>)</h3>

            <div id="order_review" style="position: relative;">

             


                <div id="payment">
                    <ul class="payment_methods methods">
                        <li class="payment_method_bacs">
                            <input type="radio" data-order_button_text="" value="bacs"
                                name="payment_method" class="input-radio" id="payment_method_bacs">
                            <label for="payment_method_bacs">Direct Bank Transfer </label>
                            <div class="payment_box payment_method_bacs">
                                <p>Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order won’t be shipped until the funds have cleared in our
                                    account.</p>
                            </div>
                        </li>
                        <li class="payment_method_cheque">
                            <input type="radio" data-order_button_text="" value="Stripe_form" name="payment_method"
                                class="input-radio Stripe_payment" id="payment_method_cheque" checked="checked" >
                            <label for="payment_method_cheque">Stripe Payment </label>
                            <div style="display:none;" class="payment_box payment_method_cheque">
                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State /
                                    County, Store Postcode.</p>
                            </div>
                        </li>
                        <li class="payment_method_paypal">
                            <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal"
                                name="payment_method" class="input-radio" id="payment_method_paypal">
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



<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function () {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=text]'].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
<!-- <script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script> -->