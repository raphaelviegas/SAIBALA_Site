<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>
<div id="minicart">
<?php if ( ! WC()->cart->is_empty() ) : ?>

	<table class="table shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item border-bottom  <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<td class="product-thumbnail border-0">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
						</td>

						<td class="product-detail border-0" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
						<?php
						echo  $_product->get_name();

						?>

								
							<div class='priceBox'>
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
								?>
							</div>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr class='d-none'>
				<td colspan="6" class="actions">

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>


	<table cellspacing="0" class="shop_table shop_table_responsive">

<tr class="cart-subtotal">
	<th><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
	<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
</tr>

<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
	<tr class="fee">
		<th><?php echo esc_html( $fee->name ); ?></th>
		<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
	</tr>
<?php endforeach; ?>

<?php
if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
	$taxable_address = WC()->customer->get_taxable_address();
	$estimated_text  = '';

	if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
		/* translators: %s location. */
		$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
	}

	if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
		foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
			?>
			<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
				<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
			</tr>
			<?php
		}
	} else {
		?>
		<tr class="tax-total">
			<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>
			<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
		</tr>
		<?php
	}
}
?>

<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

<tr class="order-total">
	<?php
	
	$tax_string_array = array(); 

	if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) { 
		foreach ( WC()->cart->get_tax_totals() as $code => $tax ) 
			$tax_string_array[] = sprintf( '%s', $tax->formatted_amount ); 
	} else { 
		$tax_string_array[] = sprintf( '%s', wc_price( WC()->cart->get_taxes_total( true, true ) ) ); 
	} 
	?>
</tr>

<tr class="order-total hideIva">
	<?php esc_html_e( 'Total', 'woocommerce' ); ?>
	<?php wc_cart_totals_order_total_html(); ?>
</tr>

<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

</table>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_after_buttons' ); ?>

<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>
</div>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>
