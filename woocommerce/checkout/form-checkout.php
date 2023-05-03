<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="container">
<div id="checkout">
	<div class="row">
		<div class="col-md-12">
			<h2 class='secure'><span><i class='fal fa-lock'></i> Pagamento seguro</span><?php esc_attr_e( 'Checkout', 'woocommerce' ); ?></h2>
		</div>
		<div class="col-md-8">
			

				<form name="checkout" method="post" class="mt-0 pt-0 checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
					<div class="cadastro__form">
						<?php if ( $checkout->get_checkout_fields() ) : ?>

							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

							<div class="row" id="customer_details">
								<div class="col-12">
									<?php do_action( 'woocommerce_checkout_billing' ); ?>							

								</div>

								<div class="col-12">
									<?php do_action( 'woocommerce_checkout_shipping' ); ?>
								</div>
							</div>

							<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>


						<?php endif; ?>

					
						<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
						
						<!--<h3 id="order_review_heading"><?php esc_html_e( 'Shipping Method', 'woocommerce' ); ?></h3>-->
						
						<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

						<div id="order_review" class="woocommerce-checkout-review-order">
							<?php do_action( 'woocommerce_checkout_order_review' ); ?>
						</div>

						<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
											
						
					</div>
					
					<div style="display:none">
						<input type="hidden" name="billing_country" id="billing_country" value="BR">
						<input type="hidden" name="billing_postcode" id="billing_postcode" value="17067-410">
						<input type="hidden" name="billing_address_1" id="billing_address_1" value="Avenida Engenheiro Paulo Frontin">
						<input type="hidden" name="billing_number" id="billing_number" value="1004">
						<input type="hidden" name="billing_number" id="billing_number" value="1004">
						<input type="hidden" name="billing_neighborhood" id="billing_neighborhood" value="Parque Santa Edwiges">
						<input type="hidden" name="billing_city" id="billing_city" value="Bauru">
						<input type="hidden" name="billing_state" id="billing_state" value="SP">
						<input type="hidden" name="billing_state" id="billing_state" value="SP">
						<input type="hidden" name="billing_phone" id="billing_phone" value="(14) 99693-1327">
					</div>

					<div style="display:none">
						<input type="hidden" name="shipping_country" id="shipping_country" value="BR">
						<input type="hidden" name="shipping_postcode" id="shipping_postcode" value="17067-410">
						<input type="hidden" name="shipping_address_1" id="shipping_address_1" value="Avenida Engenheiro Paulo Frontin">
						<input type="hidden" name="shipping_number" id="shipping_number" value="1004">
						<input type="hidden" name="shipping_number" id="shipping_number" value="1004">
						<input type="hidden" name="shipping_neighborhood" id="shipping_neighborhood" value="Parque Santa Edwiges">
						<input type="hidden" name="shipping_city" id="shipping_city" value="Bauru">
						<input type="hidden" name="shipping_state" id="shipping_state" value="SP">
						<input type="hidden" name="shipping_state" id="shipping_state" value="SP">
						<input type="hidden" name="shipping_phone" id="shipping_phone" value="(14) 99693-1327">
					</div>

					<div class="forma__pagamento">
						<h3 id="order_review_heading"><?php esc_html_e( 'Payment', 'woocommerce' ); ?></h3>
						<?php do_action( 'woocommerce_new_local_pay' ); ?>
					</div>

				</form>

		</div>
		<div class="col-md-4 cart-collaterals">
			<a href="#" class='expandCart mt-5 d-block d-md-none mb-2'><h2 class='d-inline-block'>Resumo da compra</h2> <i class='fal fa-plus mt-4 pt-3 float-right'></i></a>
			<div class='exp'>
				<h2 class='pt-0 mt-0 d-none d-md-block'>Resumo da compra</h2>
				<div class='minicartBox'>
					<?php woocommerce_mini_cart(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
