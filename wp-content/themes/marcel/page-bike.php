<?php /* Template Name: Bike */  ?>
<?php global $post; ?>
<?php if (!(is_home() || is_front_page())) { get_header(); $pid = $post->ID; } ?>
<section id="bike" class="bg-light">
	<div class="container">
		
		<?php

		$the_query = new WP_Query( array('page_id'=>$pid,'post_type'=>'page'));
		$default = array('class'=>'img-responsive');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
				<header class="section-heading text-center">
					<h2><?php echo get_the_title($post->ID);?></h2>
					<?php $sub_heading = get_post_meta($post->ID,'_ppm_sub_heading',true);?>
					<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
				</header>
				<div class="row">
					<div class="col-md-2 col-md-offset-5">
						<hr>
					</div>
				</div>

				<section class="image">
					<?php the_post_thumbnail('full',$default ); ?>
				</section>
			 
			<?php } ?>
		<?php
		}
		wp_reset_postdata();
		?>

	</div> <!-- container -->
</section><!--/.services-->
<?php if (!(is_home() || is_front_page())) { get_footer(); } ?>