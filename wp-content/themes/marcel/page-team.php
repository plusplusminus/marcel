<?php /* Template Name: Team */  ?>
<?php global $post; ?>

<section id="team">
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

		$the_query = new WP_Query( array('post_parent'=>$pid,'post_type'=>'page','orderby' => 'menu_order', 'order' => 'ASC' ));
		$default = array('class'=>'img-responsive pull-left');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>

				<?php get_template_part('team',$post->post_name); ?>
			 
			<?php } ?>
		<?php
		}
		wp_reset_postdata();
		?>

	</div> <!-- container -->
</section><!--/.services-->

<?php if (!(is_home() || is_front_page())) { get_footer(); } ?>