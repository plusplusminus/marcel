<?php global $post; ?>

<?php $page =  get_page_by_title('Services'); ?>

<section id="services">
	<div class="container">
		<header class="section-heading text-center">
			<div class="sub-heading"><?php echo get_the_title($page->ID);?></div>
			<?php $sub_heading = get_post_meta($page->ID,'_ppm_sub_heading',true);?>
			<h2><?php echo esc_attr($sub_heading);?></h2>
		</header>
		
		<?php

		// The Query
		$the_query = new WP_Query( array('post_parent'=>$page->ID,'post_type'=>'page','orderby'=>'menu_order','order'=>'ASC'));
		$default = array('class'=>'img-responsive');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<div class="row">
				<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail text-center">
				    	<div class="images">
				      		<?php the_post_thumbnail('blog-image',$default); ?>
				      		<?php $logo = get_post_meta($post->ID,'_ppm_service_image_id',true); ?>
				      		<?php echo wp_get_attachment_image( $logo,'blog-image','',$default);?>
				      	</div>
				      	<div class="caption">
				        	<h3><?php the_title();?></h3>
				        	<?php the_content(); ?>
				        	<p><a href="<?php the_permalink();?>" class="btn btn-success" role="button">VISIT OUR PAGE</a></p>
				      	</div>
				    </div>
				  </div>
				<?php } ?>
			</div> <!-- row -->
		<?php
		}
		wp_reset_postdata();
		?>
	</div> <!-- container -->
</section><!--/.services-->