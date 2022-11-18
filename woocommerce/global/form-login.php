<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>
<div class='form-login-box'>
<h2>Por favor, inicie sessão se
já tem uma conta</h2>
<form class="woocommerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>
	
	<?php
	if(!is_checkout()){
		if(isset($_POST['login'])){
			echo "<div class='alert woocommerce-notices-wrapper'>";
			$creds = array();
			$creds['user_login'] = $_POST['username'];
			$creds['user_password'] = $_POST['password'];
			$creds['remember'] = false;
			$user = wp_signon( $creds, false );
			if ( is_wp_error($user) )
				echo $user->get_error_message();
			echo "</div>";
		}
	}
	?>
	<p class="first">
		<label for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="text" required class="form-control" name="username" id="username" autocomplete="username" />
	</p>
	<p class="last">
		<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input class="form-control" required type="password" name="password" id="password" autocomplete="current-password" />
	</p>
	<div class="clear"></div>

	<p class="lost_password">
		<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
	</p>
	<?php do_action( 'woocommerce_login_form' ); ?>

	<p class="d-none">
		<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
		</label>
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />
	</p>
	<button type="submit" required class="px-5 btn btn-warning woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
	
	<?php
		if(is_checkout()){
			?>
				<a href="#" class='btn btn-neutral'><?php esc_attr_e( 'Sign Up', 'woocommerce' ); ?></a>
			<?php
		}
	?>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
</div>
<hr>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
<div class='form-register-box'>
<h2>Usufrua de um atendimento
personalizado ao criar a sua
conta online</h2>
<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

	<?php do_action( 'woocommerce_register_form_start' ); ?>

	<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

		<p class="woocommerce-woocommerce--wide wide">
			<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="text" required class="woocommerce-Input woocommerce-Input--text input-text form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
		</p>

	<?php endif; ?>

	<p class="woocommerce-woocommerce--wide wide">
		<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input type="email" required class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
	</p>

	<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

		<p class="woocommerce-woocommerce--wide wide">
			<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			<input type="password" required class="woocommerce-Input woocommerce-Input--text input-text form-control" name="password" id="reg_password" autocomplete="new-password" />
		</p>

	<?php else : ?>

		<div class="alert alert-info"><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></div>

	<?php endif; ?>

	<div class="text-small">
		<?php do_action( 'woocommerce_register_form' ); ?>
	</div>

	<label><input type="checkbox" required name="termos" value="aceite"/> Li e aceito os termos e condições *</label>
	
	<label><input type="checkbox" name="marketing" value="aceite"/> Aceito receber informação de marketing</label>

	<p class="woocommerce-FormRow ">
		<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
		<button type="submit" class="woocommerce-Button button btn btn-warning px-5" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
		
		<?php
			if(is_checkout()){
				?>
					<a href="#" class='btn btn-neutral'><?php esc_attr_e( 'Login', 'woocommerce' ); ?></a>
				<?php
			}
		?>
	</p>

	<?php do_action( 'woocommerce_register_form_end' ); ?>

</form>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>