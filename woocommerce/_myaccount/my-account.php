<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>
<!-- Page Content-->
<div class="container" id="myaccount">
	<div class="row">
	<!-- Main content-->
	<div class="col-lg-3 col-md-4 side-account mt-4">
		<aside class="user-info-wrapper" style="padding-top: 10px;">
            <div class="user-info">
              <div class="user-data">
                <h5><?php echo $current_user->display_name ?></h5><span><?php echo $current_user->user_email ?></span>
              </div>
            </div>
          </aside>
          <?php

			do_action( 'woocommerce_account_navigation' );
          ?>
	</div>
	<div class="col-lg-9 col-md-8">
		<div class="woocommerce-MyAccount-content">
			<?php
				/**
				 * My Account content.
				 *
				 * @since 2.6.0
				 */
				//do_action( 'woocommerce_account_content' );
				echo do_shortcode('[ld_profile]');
			?>
		</div>

		</div>
	</div>
</div>