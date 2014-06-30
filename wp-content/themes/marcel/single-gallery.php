<?php global $post; ?>

<?php get_header(); ?>

<section id="single-gallery" class="bg-light">
	<div class="container">

		<header class="section-heading text-center">
			<h2><?php echo get_the_title($post->ID);?></h2>
			<?php $sub_heading = get_post_meta($post->ID,'_ppm_sub_heading',true);?>
			<div class="sub-heading">
				<p class="byline vcard">
					by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span> - 
					<time class="updated" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo get_the_time(get_option('date_format')) ?></time>
					<span class="category"><?php the_category();?></span>
				</p>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<hr class="bg-dark">
				</div>
			</div>
		</header>

		<div class="row">
			<div class="col-md-12">

		
				<?php

				if ( have_posts() ) { $count = 0;?>
					<?php while ( have_posts() ) { the_post(); $count++;?>
						
						<section class="masonry">
							<?php wp_get_gallery_content(); ?>
						</section>

					 
					<?php } ?>
				<?php
				}
				wp_reset_postdata();
				?>

			</div>

		</div>

	</div> <!-- container -->
</section><!--/.services-->

<?php get_footer(); ?>