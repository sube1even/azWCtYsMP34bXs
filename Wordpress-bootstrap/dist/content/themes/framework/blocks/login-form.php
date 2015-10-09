<?php
/**
 * Custom login
 */


$args = array(
	'redirect' => admin_url(),
	'value_username' => isset( $_SESSION[ 'login-fail-username' ] ) ? $_SESSION[ 'login-fail-username' ] : false,
	'value_remember' => true
);

unset( $_SESSION[ 'login-fail-username' ] );



?>


	<div class="login-form-container">

		<?php wp_login_form( $args ); ?>

		<a href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a>

	</div>


