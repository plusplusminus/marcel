<!doctype html>
<?php global $brew_options;?>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon-57x57.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon-72x72.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon-114x114.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon-144x144.png" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon-60x60.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon-120x120.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon-76x76.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-touch-icon-152x152.png" />
	    <meta name="msapplication-square70x70logo" content="<?php echo get_stylesheet_directory_uri(); ?>/library/images/smalltile.png" />
	    <meta name="msapplication-square150x150logo" content="<?php echo get_stylesheet_directory_uri(); ?>/library/images/mediumtile.png" />
	    <meta name="msapplication-wide310x150logo" content="<?php echo get_stylesheet_directory_uri(); ?>/library/images/widetile.png" />
	    <meta name="msapplication-square310x310logo" content="<?php echo get_stylesheet_directory_uri(); ?>/library/images/largetile.png" />

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>
