<?php
/**
 * The template for displaying the header
 */
?> 

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 

		<title><?php wp_title(''); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
		<!-- add additional scripts and stylesheets to my_add_theme_scripts() in functions.php -->
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> >
		<div class="wrapper">
		<?php $page_background_image = get_field('page_background_image', 'option'); ?>
		<img class ="page-background" alt="background image" src="<?php echo $page_background_image['url']; ?>">
			<header role="banner" class="header">
				<a class="screen-reader-text skip-link" href="#main">Skip to content</a>
				<div class="container">
					<div class="header--wrapper">
					<div class="header--flex">
					<div class="header--left header--column">
						<a class="btn myAccount" href="/my-account/" target="_self">My Account</a>
						<div class="headerImage">
							<img alt="" src="/wp-content/themes/candylandstore/images/FamousSince1932.png">
						</div>
					</div>
					<div class="header--center header--column">
					<div class="logo">
						<?php $image = get_field('header_logo', 'option'); ?>
						<a href="<?php bloginfo('url'); ?>"><img alt="logo" src="<?php echo $image['url']; ?>" /></a>					
					</div>
					</div>
					<div class="header--right header--column">
						<div class="headerImage">
							<img alt="" src="<?php echo get_template_directory_uri(); ?>/images/Mpls-StPaul-Stillwater.png">
						</div>
					</div>
					</div>
					<div class="nav">
						<nav role="navigation" class="mainNav">
							<?php wp_nav_menu( array( 'theme_location' => 'main-navigation' ) ); ?>
						</nav>
						<div class="navCart">
							<div class="navCart--overlay"></div>
						<?php echo do_shortcode("[woo_cart_but]"); ?>
						</div>
					</div>
				</div>
				</div>
			</header>






