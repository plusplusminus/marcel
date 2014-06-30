<?php /* Template Name: Gallery */  ?>
<?php global $post; ?>
<?php if (!(is_home() || is_front_page())) { get_header(); $pid = $post->ID; } ?>
<section id="gallery" class="bg-light">
	<div class="container">
		<header class="section-heading text-center">
			<h2><?php echo get_the_title($pid);?></h2>
			<?php $sub_heading = get_post_meta($pid,'_ppm_sub_heading',true);?>
			<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
		</header>
		
		<?php

		$the_query = new WP_Query( array('post_type'=>'gallery','posts_per_page'=>12));
		$default = array('class'=>'img-responsive');
		
		// The Loop
		
		?>
		<?php if ( $the_query->have_posts() ) { $count = 0;?>
			<?php $num = $the_query->post_count; ?>
			<div class="flexslider flexslider-grid">
				<ul class="slides">
					<li>
						<div class="row">
							<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
							<div class="col-xs-6 col-md-4">
								<div class="image-container">
									<?php the_post_thumbnail('full',$default);?>
								</div>
								<div class="gallery-content">
									<div class="title-container">
										<h4 class='title'><?php the_title();?></h4>
										<a href="<?php the_permalink();?>" class="btn btn-xs btn-success">View Gallery</a>
									</div>
								</div>
							</div>
							<?php if (($count % 2 == 0)) echo '<div class="clearfix visible-sm"></div>'; ?>
							<?php if (($count % 3 == 0)) echo '<div class="clearfix visible-md visible-lg"></div>'; ?>
							<?php if (($count % 6 == 0) && ($num != $count)) echo '</div></li><li><div class="row">'; ?>
							<?php } ?>
						</div>
					</li>
				</ul>
			</div>
			<?php } wp_reset_postdata();?>
	</div> <!-- container -->
</section><!--/.services-->
<?php if (!(is_home() || is_front_page())) { get_footer(); } ?>