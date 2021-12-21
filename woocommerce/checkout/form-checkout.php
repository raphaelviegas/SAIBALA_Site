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
			<div class='steps'>
				<div class="row">
					<?php
						if ( is_user_logged_in() ) {
							?>
							<div class='col-4' data-step='1'>1. Dados</div>
							<div class='col-4 active' data-step='2'>2. Entrega</div>
							<div class='col-4' data-step='3'>3. Pagamento</div>
							<?php
						} else {
							?>							
							<div class='col-4 active' data-step='1'>1. Dados</div>
							<div class='col-4' data-step='2'>2. Entrega</div>
							<div class='col-4' data-step='3'>3. Pagamento</div>
							<?php
						}
					?>
				</div>
			</div>
			<?php
				$class = 'act';
				if ( !is_user_logged_in() ) {
					$class ='';
					?>
					<div class='register step step1'>
						<div class="row">
							<div class='col-md-7 col-lg-6'>
								<?php
								do_action( 'woocommerce_before_checkout_form', $checkout );
								?>
							</div>
							<div class='col-md-5 col-lg-5 offset-lg-1'>
								<hr class='d-block d-md-none'/>
								<div class="convidado">
									<h2>Comprar como convidado</h2>
									<p>Continue seu pedido sem precisar criar uma conta.</p>
									<a href="#" class='btn btn-neutral px-5'>Continuar</a>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			?>

				<form name="checkout" method="post" class="mt-0 pt-0 checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
					<div class='step step2 <?php echo $class;?>'>
						<?php if ( $checkout->get_checkout_fields() ) : ?>

							<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

							<div class="row" id="customer_details">
								<div class="col-12">
									<?php do_action( 'woocommerce_checkout_billing' ); ?>
									
									<div class="woocommerce-additional-fields">
										<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

										<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

											<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

												<h3><?php esc_html_e( 'Additional information', 'woocommerce' ); ?></h3>

											<?php endif; ?>

											<div class="woocommerce-additional-fields__field-wrapper row">
												<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
													<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
												<?php endforeach; ?>
											</div>

										<?php endif; ?>

										<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
									</div>

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
						
						<div class="row">
							<div class="col-md-6">
								<div class="text-left">
									<a href="#" class='btn-prev btn btn-neutral px-5 mb-3'><?php esc_attr_e( 'Previous', 'woocommerce' ); ?></a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="text-right">
									<a href="#" class='btn-next btn btn-warning px-5'><?php esc_attr_e( 'Next', 'woocommerce' ); ?></a>
								</div>
							</div>
						</div>
						
						
					</div>

					<div class="step step3">
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
