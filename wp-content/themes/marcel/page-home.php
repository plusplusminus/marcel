<?php
/*
Template Name: Home - 1
*/
?>

<?php get_header(); ?>

<?php
/* Carousel Images */

	global $post;

	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	
	$full_image = wp_get_attachment_image_src( $post_thumbnail_id,'full'); 
	$medium_image = wp_get_attachment_image_src( $post_thumbnail_id,'large');
	?>

<div id="home" class="home-image img-holder" data-image-mobile="<?php echo $medium_image[0]; ?>" data-image="<?php echo $full_image[0]; ?>" data-width="<?php echo $full_image[1]; ?>" data-height="<?php echo $full_image[2]; ?>" data-extra-height="100">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-6 col-md-6">
				<h2>Marcel Stauffer</h2>
				<h2>The Blade</h2>
				<button class="btn btn-primary" data-toggle="modal" data-target="#ModalVideo">Video</button>
			</div>
		</div><!--/.inner-->
	</div>
</div>

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

<?php image_menu('home-layout'); ?>


<?php get_footer(); ?>
