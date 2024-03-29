<?php /* Template Name: About 1 */  ?>
<?php global $post; ?>
<?php if (!(is_home() || is_front_page())) { get_header(); $pid = $post->ID; } ?>
<section id="about" class="bg-light">
	<div class="container">
		
		<?php

		$the_query = new WP_Query( array('page_id'=>$pid,'post_type'=>'page'));
		$default = array('class'=>'img-responsive pull-left');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
				<header class="section-heading text-center">
					<h2><?php echo get_the_title($post->ID);?></h2>
					<?php $sub_heading = get_post_meta($post->ID,'_ppm_sub_heading',true);?>
					<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
					<div class="row">
						<div class="col-md-2 col-md-offset-5">
							<hr>
						</div>
					</div>
				</header>

				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
							<div class="entry text-center">
								<?php the_content();?>
							</div>
						</article>
					</div>
				</div>

				<footer class="about-footer">
					<?php $items = get_post_meta($post->ID,'_ppm_about_information',true); ?>
					<?php if (is_array($items)) : ?>
						<ul class="nav nav-justified text-center">
							<?php foreach ($items as $key => $value) { ?>
								<li><span class="icon <?php echo $value['icon'];?>"></span><h4><?php echo $value['title'];?></h4><small><?php echo $value['description'];?></small></li>
							<?php } ?>
						</ul>
					<?php endif; ?>
				</footer>
			 
			<?php } ?>
		<?php
		}
		wp_reset_postdata();
		?>

	</div> <!-- container -->
</section><!--/.services-->
<?php if (!(is_home() || is_front_page())) { get_footer(); } ?>