<?php
/*
Template Name: Home Page Template
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
			</div>
		</div><!--/.inner-->
		<div class="homebanner-buttons hidden-xs hidden-sm">
			
		</div>
	</div>
	
</div>



<?php get_footer(); ?>
