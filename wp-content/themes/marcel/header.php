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

	<?php
/* Carousel Images */

	global $post;

	?>
	<?php if (is_home() || is_front_page()) : 
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	
	$full_image = wp_get_attachment_image_src( $post_thumbnail_id,'full'); 
	$medium_image = wp_get_attachment_image_src( $post_thumbnail_id,'large');
	?>
		<div id="home" class="home-image img-holder" data-image-mobile="<?php echo $medium_image[0]; ?>" data-image="<?php echo $full_image[0]; ?>" data-width="<?php echo $full_image[1]; ?>" data-height="<?php echo $full_image[2]; ?>" data-extra-height="100">
			<div class="home-hero vertical">
				<div class="inner">
					<div class="container">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<h1 class="text-default">Marcel Stauffer</h1>
								<h1 class="text-success">The Blade</h1>
								<button class="btn btn-default" data-toggle="modal" data-target="#ModalVideo">Video</button>
							</div>
						</div>
					</div>
				</div><!--/.inner-->
			</div>
		</div>
	<?php endif; ?>

	<nav role="navigation">
		<div class="navbar navbar-inverse">
		  <div class="container">
			<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>

			<?php if ( ( '' != $brew_options['site_logo']['url'] ) ) {
					$logo_url = $brew_options['site_logo']['url'];
					$site_url = get_bloginfo('url');
					$site_name = get_bloginfo('name');
					$site_description = get_bloginfo('description');
				if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
					echo '<a class="navbar-brand logo" href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img class="img-responsive" src="'.$brew_options['site_logo']['url'].'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
				} // End IF Statement */
			?>
			</div>

			<div class="navbar-collapse collapse navbar-responsive-collapse">
				
					<?php secondary_nav(); ?>
			
			</div>
		  </div>
		</div> 
	</nav>
