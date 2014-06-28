<?php /* Template Name: Press */  ?>
<?php global $post; ?>
<?php if (!(is_home() || is_front_page())) { get_header(); $pid = $post->ID; } ?>

<section id="press">
	<div class="container">
		<header class="section-heading text-center">
			<h2><?php echo get_the_title($pid);?></h2>
			<?php $sub_heading = get_post_meta($pid,'_ppm_sub_heading',true);?>
			<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<hr class="bg-dark">
				</div>
			</div>
		</header>
		
		<?php

		$the_query = new WP_Query( array('post_type'=>'press','orderby' => 'menu_order', 'order' => 'ASC' ));
		$default = array('class'=>'img-responsive pull-left');
		
		// The Loop
		
		?>
		<?php if ( $the_query->have_posts() ) { $count = 0;?>
			<?php $num = $the_query->post_count; ?>
			<div class="flexslider flexslider-grid">
				<ul class="slides">
					<li>
						<div class="row">
							<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
							<div class="col-md-6">
								<a href="#">
									<div class="media">
										<span class="pull-right">
											<?php the_post_thumbnail('full',$default);?>
										</span>
										<div class="media-body">
											<h4 class="media-heading"><?php the_title();?></h4>
											<?php the_excerpt();?>
										</div>
									</div>
								</a>
							</div>
							<?php if (($count % 2 == 0)) echo '<div class="clearfix"></div>'; ?>
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