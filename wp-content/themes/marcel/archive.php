<?php get_header(); ?>

<?php global $post; ?>
<?php if (!(is_home() || is_front_page())) { get_header(); $pid = $post->ID; } ?>
<section id="blog" class="bg-light">
	<div class="container">
		<header class="section-heading text-center">
			<div class="sub-heading">
				<?php if (is_category()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Posts Categorized:', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
					</h1>

				<?php } elseif (is_tag()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
					</h1>

				<?php } elseif (is_author()) {
					global $post;
					$author_id = $post->post_author;
				?>
					<h1 class="archive-title h2">

						<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

					</h1>
				<?php } elseif (is_day()) { ?>
					<h1 class="archive-title h2">
						<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
					</h1>

				<?php } elseif (is_month()) { ?>
						<h1 class="archive-title h2">
							<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
						</h1>

				<?php } elseif (is_year()) { ?>
						<h1 class="archive-title h2">
							<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
						</h1>
				<?php } ?>
			</div>
			<?php $sub_heading = get_post_meta($pid,'_ppm_sub_heading',true);?>
			<h2><?php echo esc_attr($sub_heading);?></h2>
		</header>
		
		
		<?php if ( have_posts() ) { $count = 0;?>
			<?php $num = $the_query->post_count; ?>
			<div class="flexslider-grid">
				<ul class="slides">
					<li>
						<div class="row">
							<?php while ( have_posts() ) { the_post(); $count++;?>
							<div class="col-xs-6 col-md-4">
								<div class="image-container">
									<?php the_post_thumbnail('full',$default);?>
								</div>
								<div class="blog-content">
									<div class="title-container">
										<h4 class='title'><?php the_title();?></h4>
										<a href="<?php the_permalink();?>" class="btn btn-xs btn-primary">Read More</a>
									</div>
								</div>
							</div>
							<?php if (($count % 2 == 0)) echo '<div class="clearfix visible-sm"></div>'; ?>
							<?php if (($count % 3 == 0)) echo '<div class="clearfix visible-md"></div>'; ?>
							<?php if (($count % 6 == 0) && ($num != $count)) echo '</div></li><li><div class="row">'; ?>
							<?php } ?>
						</div>
					</li>
				</ul>
			</div>
			<?php } wp_reset_postdata();?>
	</div> <!-- container -->
</section><!--/.services-->
<?php get_footer(); ?>
