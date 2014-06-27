<?php global $post; ?>

<?php get_header(); ?>

<section id="single" class="bg-light">
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
		</header>

		<div class="row">

		
			<?php

			if ( have_posts() ) { $count = 0;?>
				<?php while ( have_posts() ) { the_post(); $count++;?>
					
					<div class="col-md-8">
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<div class="entry">
								<?php the_content();?>
							</div>
						</article>
					</div>

				 
				<?php } ?>
			<?php
			}
			wp_reset_postdata();
			?>

			<?php get_sidebar(); ?>

		</div>

	</div> <!-- container -->
</section><!--/.services-->

<?php get_footer(); ?>