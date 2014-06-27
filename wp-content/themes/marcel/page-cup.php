<?php /* Template Name: Cup */  ?>
<?php global $post; ?>

<?php $page =  get_post_meta($post->ID,'_ppm_cup_page',true) ?>

<section id="cup" class="bg-light">
	<div class="container">
		<header class="section-heading text-center">
			<div class="sub-heading"><?php echo get_the_title($page);?></div>
			<?php $sub_heading = get_post_meta($page,'_ppm_sub_heading',true);?>
			<h2><?php echo esc_attr($sub_heading);?></h2>
		</header>
		
		<?php

		$the_query = new WP_Query( array('post_parent'=>$page,'post_type'=>'page','orderby' => 'menu_order', 'order' => 'ASC' ));
		$default = array('class'=>'img-responsive pull-left');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php $html_header = '<ul class="nav nav-tabs nav-justified" id="cupTabs">'; ?>
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
  			<?php $items = get_post_meta($post->ID,'_ppm_cup_information',true); ?>
			<?php $default = array('class'=>'img-responsive'); ?>
			<?php $num = count($items); ?>
			<?php if (is_array($items)) : $count = 0; ?>
				<?php $inner = '' ; ?>
				<?php $inner .= '<div class="row">'; ?>
				<?php foreach ($items as $key => $value) { $count++; ?>

					<?php $inner .=	'<div class="col-md-6">
										<div class="media">
											<a class="pull-right" href="#">
												<span class="fa fa-table fa-3x"></span>
											</a>
											<div class="media-body">
												<h4 class="media-heading">'.$value['title'].'</h4>
												'.$value['description'].'
											</div>
										</div>
									</div>';
						if (($count % 2 == 0)) $inner .= '<div class="clearfix"></div>'; ?>
				<?php } ?>
				<?php $inner .= '</div>'; ?>
			<?php endif; ?>

			<?php $html_body .= $inner; ?>
			<?php $inner = ''; ?>
			<?php $html_body .= '</div>';?>
			<?php } ?>
			<?php $html_button .= '</ul></div>';?>
			<?php $html_header .= '</ul>';?>
		<?php
		}
		wp_reset_postdata();
		?>
		<?php echo $html_header; ?>
		<?php echo $html_button; ?>
		<?php echo $html_body; ?>
		

	</div> <!-- container -->
</section><!--/.services-->