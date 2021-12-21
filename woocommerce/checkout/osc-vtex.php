<?php
$checkout = WC()->checkout;
do_action( 'woocommerce_before_checkout_form', $checkout );
?>
<form name="checkout" method="post" class="checkout woocommerce-checkout osc-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-4">
			<?php if ( $checkout->get_checkout_fields() ) : ?>

				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<div class="row" id="customer_details">
					<div class="col-lg-12">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</div>

					<div class="col-lg-12">
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>
				</div>

				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

			<?php endif; ?>
		</div>
		<div class="col-lg-4">
			<div class="shipping">
				<h3 id="order_review_heading"><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></h3>
				
				<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
				    <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
				        <ul id="shippingmethods">

						</ul>
				    <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
				<?php endif; ?>
			</div>
			<div class="pay">
				<h3 id="order_review_heading"><?php esc_html_e( 'Payment', 'woocommerce' ); ?></h3>
				<?php do_action('woocommerce_checkout_payment');?>				
			</div>
		</div>
		<div class="col-lg-4">
			
			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
			
			<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
			
			<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

					<div id="order_review" class="woocommerce-checkout-review-order">
						<?php do_action( 'woocommerce_checkout_order_review' ); ?>
					</div>

			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div>
	</div>

</form>