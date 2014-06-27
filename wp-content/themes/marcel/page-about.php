<?php /* Template Name: About */  ?>
<?php global $post; ?>

<?php $page =  get_post_meta($post->ID,'_ppm_about_page',true) ?>

<section id="about" class="bg-light">
	<div class="container">
		
		<?php

		$the_query = new WP_Query( array('page_id'=>$page,'post_type'=>'page'));
		$default = array('class'=>'img-responsive pull-left');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
				<header class="section-heading text-center">
					<h2><?php echo get_the_title($post->ID);?></h2>
					<?php $sub_heading = get_post_meta($post->ID,'_ppm_sub_heading',true);?>
					<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
				</header>

				<div class="col-md-8 col-md-offset-2">
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<div class="entry">
							<?php the_content();?>
						</div>
					</article>
				</div>

				<footer class="about-footer">
					<?php $items = get_post_meta($post->ID,'_ppm_about_information',true); ?>
					<?php if (is_array($items)) : ?>
						<ul class="nav nav-justified text-center">
							<?php foreach ($items as $key => $value) { ?>
								<li><span class="<?php echo $value['icon'];?>"></span><h4><?php echo $value['title'];?></h4><small><?php echo $value['description'];?></small></li>
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