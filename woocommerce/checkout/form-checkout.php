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
			<h2 class='secure'>Finalize sua compra</h2>
			<?php if (is_user_logged_in()): ?>
				<p class="form__intro">Preencha seus dados:</p>
			<?php endif; ?>
			<?php if (!is_user_logged_in()): ?>
				<p class="form__intro">Já possui cadastro: <a href="#" class="openLoginModal">Faça login</a>
				<br>Se não tem cadastro, preencha os dados abaixo:</p>
			<?php endif; ?>
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
					

					<div class="forma__pagamento">
						<h3 id="order_review_heading">Escolha seu método de pagamento</h3>
						<?php do_action( 'woocommerce_new_local_pay' ); ?>
					</div>

				</form>

		</div>
		<div class="col-md-4 cart-collaterals">
			<a href="#" class='expandCart mt-5 d-block d-md-none mb-2'><h2 class='d-inline-block'>Resumo da compra</h2> <i class='fal fa-plus mt-4 pt-3 float-right'></i></a>
			<div class='exp'>
				<h2 class='pt-0 mt-0 d-none d-md-block'>Produtos</h2>
				<div class='minicartBox'>
					<?php woocommerce_mini_cart(); ?>
				</div>
			</div>

		
			<?php 		
				$code = WC()->cart->get_applied_coupons();		
				if ($code) {
					echo '<p class="cupom__aplicado"><i class="fa-solid fa-ticket"></i> Cupom aplicado: <strong>'.$code[0].'</strong></p>';
				}
				if (!$code) {
			?>

				<form class="checkout_coupon woocommerce-form-coupon" method="post">
					<h3>Cupom de Desconto</h3>
					<p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'woocommerce' ); ?></p>

					<p class="form-row form-row-first">
						<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
						<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
					</p>

					<p class="form-row form-row-last">
						<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
					</p>

					<div class="clear"></div>
				</form>
			<?php } ?>
		</div>
	</div>
</div>
</div>


<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
