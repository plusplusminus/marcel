<?php /* Template Name: Erfolge */  ?>
<?php global $post; ?>

<?php $page =  get_post_meta($post->ID,'_ppm_new_page',true) ?>

<section id="erfolge" class="bg-light">
	<div class="container">
		<header class="section-heading text-center">
			<h2><?php echo get_the_title($page);?></h2>
			<?php $sub_heading = get_post_meta($page,'_ppm_sub_heading',true);?>
			<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
		</header>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<hr>
			</div>
		</div>
		
		<?php

		$the_query = new WP_Query( array('post_parent'=>$page,'post_type'=>'page','orderby' => 'menu_order', 'order' => 'ASC' ));
		$default = array('class'=>'img-responsive pull-left');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php $html_header = '<ul class="nav nav-tabs nav-justified" id="erfolgeTabs">'; ?>
			<?php $html_body = '<div class="tab-content">'; ?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>

  			<?php $html_header .= '<li><a href="#section-'.$post->ID.'" data-toggle="tab">'.get_the_title().'</a></li>'; ?>
  			<?php $html_body .= '<div class="tab-pane fade" id="section-'.$post->ID.'">';?>
  			<?php $items = get_post_meta($post->ID,'_ppm_erfolge_information',true); ?>
			<?php $default = array('class'=>'img-responsive'); ?>
			<?php $num = count($items); ?>
			<?php if (is_array($items)) : $count = 0; ?>
				<?php $inner = '' ; ?>
				<?php $inner .= '<div class="row">'; ?>
				<?php foreach ($items as $key => $value) { $count++; ?>

					<?php $inner .=	'<div class="col-md-4">
										<div class="image-container">'.wp_get_attachment_image($value['image_id'],'full','',$default).'
										</div>
										<div class="title-container">
											<h4 class="title">'.$value['title'].'</h4>
											'.wpautop($value['description']).'
										</div>
									</div>';
						 if (($count % 3 == 0)) $inner .= '<div class="clearfix"></div>'; ?>
				<?php } ?>
				<?php $inner .= '</div>'; ?>
			<?php endif; ?>

			<?php $html_body .= $inner; ?>
			<?php $inner = ''; ?>
			<?php $html_body .= '</div>';?>
			<?php } ?>
			
			<?php $html_header .= '</ul>';?>
		<?php
		}
		wp_reset_postdata();
		?>
		<?php echo $html_header; ?>
		<?php echo $html_body; ?>
		

	</div> <!-- container -->
</section><!--/.services-->