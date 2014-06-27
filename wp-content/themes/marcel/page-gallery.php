<?php /* Template Name: Gallery */  ?>
<?php global $post; ?>

<?php $page =  get_post_meta($post->ID,'_ppm_gallery_page',true) ?>

<section id="gallery" class="bg-light">
	<div class="container">
		<header class="section-heading text-center">
			<div class="sub-heading"><?php echo get_the_title($page);?></div>
			<?php $sub_heading = get_post_meta($page,'_ppm_sub_heading',true);?>
			<h2><?php echo esc_attr($sub_heading);?></h2>
		</header>
		
		<?php

		$the_query = new WP_Query( array('post_type'=>'gallery','orderby' => 'menu_order', 'order' => 'ASC' ));
		$default = array('class'=>'img-responsive');
		
		// The Loop
		
		?>
		<?php if ( $the_query->have_posts() ) { $count = 0;?>
			<?php $num = $the_query->post_count; ?>
			<div class="flexslider-grid">
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
										<?php the_excerpt();?>
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