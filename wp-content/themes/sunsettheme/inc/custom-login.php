<?php
/*
====================================
          Cusotom Login
====================================
 */
if ( ! is_user_logged_in() ) { // Display WordPress login form:
    $args = array(
        'redirect' => admin_url(),
        'form_id' => 'loginform-custom',
        'label_username' => __( 'Username custom text' ),
        'label_password' => __( 'Password custom text' ),
        'label_remember' => __( 'Remember Me custom text' ),
        'label_log_in' => __( 'Log In custom text' ),
        'remember' => true
    );
    wp_login_form( $args );
} else { // If logged in:
    wp_loginout( home_url() ); // Display "Log Out" link.
    echo " | ";
    wp_register('', ''); // Display "Site Admin" link.
}

/*
====================================
      Removing WordPress Logo
====================================
 */
/*
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/sunset-icon.png);
		height:65px;
		width:320px;
		background-size: 320px 65px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
*/
/*
====================================
            Login URL
====================================
 */
// https://codex.wordpress.org/Plugin_API/Filter_Reference/login_url#Examples
// add_filter( 'login_url', 'my_login_page', 10, 3 );
// function my_login_page( $login_url, $redirect, $force_reauth ) {
//     $login_page = home_url( '/my-login-page/' );
//     $login_url = add_query_arg( 'redirect_to', $redirect, $login_page );
//     return $login_url;
// }
//******************************************************************
// function redirect_login_page(){
//
//     // Store for checking if this page equals wp-login.php
//     $page_viewed = basename( $_SERVER['REQUEST_URI'] );
//
//     // permalink to the custom login page
//     $login_page  = get_permalink( 'CUSTOM_LOGIN_PAGE_ID' );
//
//     if( $page_viewed == "wp-login.php" ) {
//         wp_redirect( $login_page );
//         exit();
//     }
// }
// add_action( 'init','redirect_login_page' );
//*******************************************************************

/*
====================================
              Logo URL
====================================
 */
// function my_login_logo_url() {
//     return home_url();
// }
// add_filter( 'login_headerurl', 'my_login_logo_url' );
//
/*
====================================
             Logo Title
====================================
 */
// function my_login_logo_url_title() {
//     return 'Your Site Name and Info';
// }
// add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/*
====================================
    Default Login Page Redirect
====================================
 */
// Hook the appropriate WordPress action
// function prevent_wp_login() {
//     // WP tracks the current page - global the variable to access it
//     global $pagenow;
//     // Check if a $_GET['action'] is set, and if so, load it into $action variable
//     $action = (isset($_GET['action'])) ? $_GET['action'] : '';
//     var_dump($action);
//     // Check if we're on the login page, and ensure the action is not 'logout'
//     if( $pagenow == 'wp-login.php' && ( !$action || ( $action && ! in_array($action, array('logout', 'lostpassword', 'rp', 'resetpass'))))) {
//         // Load the home page url
//         $page = get_bloginfo('url');
//         // Redirect to the home page
//         wp_redirect($page);
//         // Stop execution to prevent the page loading for any reason
//         exit();
//     }
// }
// add_action('init', 'prevent_wp_login');

// add_action('init','custom_login');
// function custom_login(){
//  global $pagenow;
//  //  URL for the HomePage. You can set this to the URL of any page you wish to redirect to.
//  $blogHomePage = get_bloginfo('url');
//  $action = @$_GET['action'] ? $_GET['action'] : '';
//  //  Redirect to the Homepage, if if it is login page. Make sure it is not called to logout or for lost password feature
//  if( 'wp-login.php' == $pagenow && $action!="logout" && $action!="lostpassword") {
//      wp_redirect($blogHomePage);
//  }
// }

/*
====================================
      WordPress Flash Messages
====================================
 */
// ## STORE TEXT
// set_transient('error', 'text i want to store', 60*60*12);
// 
// ## RETRIEVE TEXT
// echo get_transient('error');
//
// ## DELETE THE TEXT
// delete_transient('error');


?>
