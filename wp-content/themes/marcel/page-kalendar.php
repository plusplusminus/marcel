<?php /* Template Name: Home */  ?>
<?php global $post; ?>

<?php $page =  get_post_meta($post->ID,'_ppm_kalendar_page',true) ?>

<section id="about">
	<div class="container">
		
		<?php

		$the_query = new WP_Query( array('page_id'=>$page,'post_type'=>'page'));
		$default = array('class'=>'img-responsive pull-left');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
				<header class="section-heading text-center">
					<div class="sub-heading"><?php echo get_the_title($post->ID);?></div>
					<?php $sub_heading = get_post_meta($post->ID,'_ppm_sub_heading',true);?>
					<h2><?php echo esc_attr($sub_heading);?></h2>
				</header>

				<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
					<div class="entry">
						<?php the_content();?>
					</div>
				</article>

			<?php } ?>
		<?php
		}
		wp_reset_postdata();
		?>

	</div> <!-- container -->
</section><!--/.services-->