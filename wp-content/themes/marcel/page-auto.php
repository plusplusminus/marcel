<?php /* Template Name: Autogrammkarten */  ?>
<?php global $post; ?>

<section id="auto">
	<div class="container">
		
		<?php

		$the_query = new WP_Query( array('page_id'=>$pid,'post_type'=>'page'));
		$default = array('class'=>'img-responsive');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
				<header class="section-heading text-center">
					<div class="sub-heading"><?php echo get_the_title($post->ID);?></div>
					<?php $sub_heading = get_post_meta($post->ID,'_ppm_sub_heading',true);?>
					<h2><?php echo esc_attr($sub_heading);?></h2>
				</header>

				<section class="items">
					<?php $items = get_post_meta($post->ID,'_ppm_auto_information',true); ?>
					<?php if (is_array($items)) : ?>
						<div class="row">

							<?php foreach ($items as $key => $value) { ?>
								<div class="col-md-4">
									<a href="<?php echo $value['image'];?>" target="_blank">
										<div class="image-container">
											<?php echo wp_get_attachment_image($value['image_id'],'full','',$default);?>
											<div class="title-container vertical">
												<span class="inner download btn btn-success">Download</span>
											</div>
										</div>
									</a>
								</div>
							<?php } ?>

						</div>
					<?php endif; ?>
				</section>
			 
			<?php } ?>
		<?php
		}
		wp_reset_postdata();
		?>

	</div> <!-- container -->
</section><!--/.services-->