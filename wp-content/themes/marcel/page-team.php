<?php /* Template Name: Team */  ?>
<?php global $post; ?>

<?php $page =  get_post_meta($post->ID,'_ppm_team_page',true) ?>

<section id="team">
	<div class="container">
		<header class="section-heading text-center">
			<h2><?php echo get_the_title($page);?></h2>
			<?php $sub_heading = get_post_meta($page,'_ppm_sub_heading',true);?>
			<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
		</header>
		
		<?php

		$the_query = new WP_Query( array('post_parent'=>$page,'post_type'=>'page','orderby' => 'menu_order', 'order' => 'ASC' ));
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