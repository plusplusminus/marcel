<?php /* Template Name: Kontakt */  ?>
<?php global $brew_options;?>
<?php if (!(is_home() || is_front_page())) { get_header(); $pid = $post->ID; } ?>
<section id="contact" class="bg-success">
	<div class="container">
		<header class="section-heading text-center">
			<h2><?php echo get_the_title($pid);?></h2>
			<?php $sub_heading = get_post_meta($pid,'_ppm_sub_heading',true);?>
			<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
		</header>

		<div class="row">
			<div class="col-sm-8">
				<?php gravity_form(1, false, false, false, '', true, 12); ?>
			</div>
			<div class="col-sm-4">
				<?php
				// The Query
				$the_query = new WP_Query( array('page_id'=>$pid,'post_type'=>'page') );

				// The Loop
				if ( $the_query->have_posts() ) { ?>

					<?php while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
						<div class="entry">
							<?php the_content(); ?>

				        </div>
				        
						<div class="row">
							<?php if (!empty($brew_options['address'])) : ?>
								<div class="col-xs-2">
									<span class="icon-location"></span>
								</div>
								<div class="col-xs-10">
									<?php echo wpautop($brew_options['address'] ); ?>
								</div>
							<?php endif; ?>
							<?php if (!empty($brew_options['email'])) : ?>
								<div class="col-xs-2">
									<span class="icon-pen"></span>
								</div>
								<div class="col-xs-10">
									<?php echo wpautop($brew_options['email'] ); ?>
								</div>
							<?php endif; ?>
						</div>

					<?php } ?>
				<?php
				}
				wp_reset_postdata();
				?>
			</div>
		</div>

	</div>
</section><!--/.contact-->
<?php if (!(is_home() || is_front_page())) { get_footer(); } ?>