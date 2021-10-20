<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="../public/assets/css/style.css" media="all" />

<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="invoice-title">
				<div id="logo">
					<a href="/soft/home"><img class="logo" src="../public/assets/img/logo.png">Soft Website</a>

				</div>
				<h1 class="invoiceHead">INVOICE</h1>
				<h3>Thank you for shopping</h3><br>
				<h3 class="pull-right">Order #
					<?php echo $Payment['order_id']; ?>
				</h3>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<address>
						<strong>Billed To:</strong><br><br>
						<strong>Customer Name:</strong><br>
						<?php echo $customer['customer_name']; ?> <br>
						<strong>Phone Number:</strong><br>
						<?php echo $customer['customer_phone']; ?><br>
						<strong>Address:</strong><br>
						<?php echo $customer['customer_address']; ?><br>
						<?php echo $customer['customer_city']; ?><br>
						<?php echo $customer['customer_country']; ?>
					</address>
				</div>
				<div class="col-xs-6 text-right">
					<address>
						<strong>Payment Method:</strong><br>
						Visa ending **** 4242<br>
						<?php echo $Payment['payer_email']; ?><br><br>
						<strong>Payment status:</strong><br>
						<?php echo $Payment['payment_status']; ?>
					</address>
				</div>
			</div>
			<div class="row">

				<div class="col-xs-12 text-right">
					<address>
						<strong>Order Date:</strong><br>
						<?php echo $Payment['created_at']; ?><br><br>
					</address>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Order summary</strong></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-condensed">
							<thead>
								<tr>
									<td><strong>Item</strong></td>
									<td class="text-center"><strong>Price</strong></td>
									<td class="text-center"><strong>Quantity</strong></td>
									<td class="text-right"><strong>Totals</strong></td>
								</tr>
							</thead>
							<tbody>
								<!-- foreach ($order->lineItems as $line) or some such thing here -->

								<?php if ($items) :?>
								<?php foreach ($items as $item) :?>
								<?php $ord_id=$item['order_id']; ?>
								<?php if ($ord_id == $Payment['order_id']) :?>
								<tr>
									<?php if ($products) :?>
									<?php foreach ($products as $product) :?>
									<?php $pro_id=$product['product_id']; ?>
									<?php if ($pro_id == $item['product_id']) :?>

									<td>
										<?php echo $product['product_title']; ?>
									</td>

									<?php endif; ?>
									<?php endforeach; ?>
									<?php endif; ?>

									<td class="text-center">$
										<?php echo $item['price']; ?>
									</td>
									<td class="text-center">
										<?php echo $item['Qty']; ?>
									</td>
									<td class="text-right">$
										<?php echo $item['sub_total']; ?>
									</td>
								</tr>
								<?php endif; ?>
								<?php endforeach; ?>
								<?php endif; ?>
								<tr>
									<td class="thick-line"></td>
									<td class="thick-line"></td>
									<td class="thick-line text-center"><strong>Subtotal</strong></td>
									<td class="thick-line text-right">$
										<?php echo $Payment['payment_gross']; ?>
									</td>
								</tr>
								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Shipping</strong></td>
									<td class="no-line text-right">$0</td>
								</tr>
								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Total</strong></td>
									<td class="no-line text-right">$
										<?php echo $Payment['payment_gross']; ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>