<?php /* Template Name: Erfolge */  ?>
<?php global $post; ?>
<?php if (!(is_home() || is_front_page())) { get_header(); $pid = $post->ID; } ?>
<section id="erfolge" class="bg-light">
	<div class="container">
		<header class="section-heading text-center">
			<h2><?php echo get_the_title($pid);?></h2>
			<?php $sub_heading = get_post_meta($pid,'_ppm_sub_heading',true);?>
			<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
		</header>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<hr>
			</div>
		</div>
		
		<?php

		$the_query = new WP_Query( array('post_parent'=>$pid,'post_type'=>'page','orderby' => 'menu_order', 'order' => 'ASC' ));
		$default = array('class'=>'img-responsive pull-left');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php $html_header = '<ul class="nav nav-tabs nav-justified" id="erfolgeTabs">'; ?>
			<?php $html_body = '<div class="tab-content">'; ?>
			<?php $html_button = '<div class="btn-group clearfix">
									  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									    Select <span class="caret"></span>
									  </button>
									  <ul class="dropdown-menu" role="menu">'; ?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
			<?php $html_button .= '<li><a href="#section-'.$post->ID.'" data-toggle="tab">'.get_the_title().'</a></li>'; ?>
  			<?php $html_header .= '<li><a href="#section-'.$post->ID.'" data-toggle="tab">'.get_the_title().'</a></li>'; ?>
  			<?php $html_body .= '<div class="tab-pane fade" id="section-'.$post->ID.'">';?>
  			<?php $items = get_post_meta($post->ID,'_ppm_erfolge_information',true); ?>
			<?php $default = array('class'=>'img-responsive'); ?>
			<?php $num = count($items); ?>
			<?php if (is_array($items)) : $count = 0; ?>
				<?php $inner = '' ; ?>
				<?php $inner .= '<div class="row">'; ?>
				<?php foreach ($items as $key => $value) { $count++; ?>

					<?php $inner .=	'<div class="col-md-4 col-xs-6">
										<div class="image-container">'.wp_get_attachment_image($value['image_id'],'full','',$default).'
										</div>
										<div class="title-container">
											<h4 class="title">'.$value['title'].'</h4>
											'.wpautop($value['description']).'
										</div>
									</div>';
						 if (($count % 2 == 0)) $inner .= '<div class="clearfix visible-sm"></div>'; 
						 if (($count % 3 == 0)) $inner .= '<div class="clearfix visible-md"></div>'; ?>
				<?php } ?>
				<?php $inner .= '</div>'; ?>
			<?php endif; ?>

			<?php $html_body .= $inner; ?>
			<?php $inner = ''; ?>
			<?php $html_body .= '</div>';?>
			<?php } ?>
			
			<?php $html_header .= '</ul>';?>
			<?php $html_button .= '</ul></div>';?>
		<?php
		}
		wp_reset_postdata();
		?>
		<?php echo $html_header; ?>
		<?php echo $html_button; ?>
		<?php echo $html_body; ?>
		

	</div> <!-- container -->
</section><!--/.services-->
<?php if (!(is_home() || is_front_page())) { get_footer(); } ?>