<?php

add_action( 'wp_login_failed', 'framework_login_failed' ); // hook failed login

function framework_login_failed( $user )
{
	$referrer = isset( $_SERVER[ 'HTTP_REFERER' ] ) ? $_SERVER[ 'HTTP_REFERER' ] : false;

	// check that were not on the default login page
	if ( ! empty( $referrer ) &&
		 ! strstr( $referrer, 'wp-login' ) &&
		 ! strstr( $referrer, 'wp-admin' ) &&
		 $user != null )
	{
		WP_Notices::error(  'Login Failed', 'You have entered an incorrect Username or password, please try again.' );

		// Remember the failed username username
		$_SESSION[ 'login-fail-username' ] = $_POST[ 'log' ];

		wp_redirect( $referrer );
		exit;
	}
}


add_action( 'authenticate', 'framework_blank_login'); // hook blank login

function framework_blank_login( $user )
{
	$referrer = isset( $_SERVER[ 'HTTP_REFERER' ] ) ? $_SERVER[ 'HTTP_REFERER' ] : false;

	// This hook seems to also be called on log out
	// So make sure we are processing a login attempt
	if ( isset( $_POST['log'] ) )
	{
		// Catch blank login
		if ( $_POST['log'] == '' || $_POST['pwd'] == '' )
		{
			// Check that were not on the default login page
			if ( ! empty( $referrer ) &&
				 ! strstr( $referrer, 'wp-login' ) &&
				 ! strstr( $referrer, 'wp-admin' ) )
			{
				// Remember the failed username username
				$_SESSION[ 'login-fail-username' ] = $_POST[ 'log' ];

				WP_Notices::error( 'Login Failed', 'You have entered an incorrect Username or password, please try again.' );

				wp_redirect( $referrer );
				exit;
			}
		}
	}
}


add_action('wp_logout','framework_logout');
function framework_logout()
{
	wp_redirect( home_url() );
	exit();
}