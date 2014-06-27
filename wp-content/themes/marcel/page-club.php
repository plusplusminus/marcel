<?php /* Template Name: Club */  ?>
<?php global $post; ?>
<?php global $html_body; ?>

<section id="club">
	<div class="container">
		<header class="section-heading text-center">
			<h2><?php echo get_the_title($pid);?></h2>
			<?php $sub_heading = get_post_meta($pid,'_ppm_sub_heading',true);?>
			<div class="sub-heading"><?php echo esc_attr($sub_heading);?></div>
		</header>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<hr class="bg-dark">
			</div>
		</div>
		
		<?php

		$the_query = new WP_Query( array('post_parent'=>$page,'post_type'=>'page','orderby' => 'menu_order', 'order' => 'ASC' ));
		$default = array('class'=>'img-responsive pull-left');
		// The Loop
		if ( $the_query->have_posts() ) { $count = 0;?>
			<?php $html_header = '<ul class="nav nav-tabs nav-justified" id="clubTabs">'; ?>
			<?php $html_body = '<div class="tab-content">'; ?>
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>

  			<?php $html_header .= '<li><a href="#section-'.$post->ID.'" data-toggle="tab">'.get_the_title().'</a></li>'; ?>
  			<?php $html_body .= '<div class="tab-pane fade" id="section-'.$post->ID.'">';?> 

  			<?php switch ($post->post_name) {
  				case 'club-4':
  					$html_body .= get_the_content();
  					break;
  				case 'mitgliederliste':
  					$member_heading = get_post_meta($post->ID,'_ppm_member_heading',true);
  					$html_body .= '<h4>'.$member_heading.'</h4>';
  					$member_list = get_post_meta($post->ID,'_ppm_member_list',true);
  					$html_body .= '<ul class="list-inline members">';
  					foreach ($member_list as $key => $value) {
  						$html_body .= '<li>'.$value['title'].'</li>';
  					}
  					$html_body .= '</ul>';
  					break;
  				case 'sponsoren':
  					$member_heading = get_post_meta($post->ID,'_ppm_sponsoren_heading',true);
  					$html_body .= '<h4>'.$member_heading.'</h4>';

  					$html_body .= '<div class="flexslider flexslider-grid">
						<ul class="slides">
							<li>';
								
								$items = get_post_meta($post->ID,'_ppm_team_information',true); ?>
								<?php $default = array('class'=>'img-responsive'); ?>
								<?php $num = count($items); ?>
								<?php if (is_array($items)) : $count = 0; ?>

										<?php $html_body .= '<div class="row">'; ?>
										<?php foreach ($items as $key => $value) { $count++; ?>

											<?php $html_body.= '<div class="col-md-4">
												<div class="image-container">'.wp_get_attachment_image($value['image_id'],'full','',$default).'
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="sponsors-content">
															<div class="col-md-10">
																<h4 class="title">'.$value['title'].'</h4>'.
																wpautop($value['description']).'
															</div>
															<div class="col-md-2">
																<div class="social">'; ?>
																	<?php if(!empty($value['web_link'])) : ?>
																		<?php $html_body .= '<p><a href="'.$value['web_link'].'"><span class="fa fa-globe"></span></a></p>'; ?>
																	<?php endif; ?>
																	<?php if(!empty($value['facebook_link'])) : ?>
																		<?php $html_body .= '<p><a href="'.$value['facebook_link'].'"><span class="fa fa-facebook"></span></a></p>'; ?>
																	<?php endif; ?>
																
															<?php $html_body .= '</div></div>
														<div class="clearfix"></div>
														</div>
													</div>
												</div>
											</div>'; ?>
											<?php if (($count % 3 == 0) && ($num != $count)) $html_body .= '</div></li><li><div class="row">'; ?>
										<?php } ?>
										<?php $html_body .= '</div>'; ?>
									<?php endif; ?>
							<?php $html_body .= '</li>
						</ul>
					</div>';
  					
 					break;
 				case 'pressmappe':
 					$html_body .= get_the_content();
 					break;

 				case 'info-heft':
 					$member_heading = get_post_meta($post->ID,'_ppm_sponsoren_heading',true);
  					$html_body .= '<h4>'.$member_heading.'</h4>';

  					$html_body .= '<div class="flexslider flexslider-caro">
						<ul class="slides">
							';
								
								$items = get_post_meta($post->ID,'_ppm_infoheft_information',true); ?>
								<?php $default = array('class'=>'img-responsive'); ?>

								<?php if (is_array($items)) : $count = 0; ?>

										
										<?php foreach ($items as $key => $value) { $count++; ?>

											<?php $html_body.= '<li>
												<a target="_blank" href="'.$value['url'].'"><div class="image-container">'.wp_get_attachment_image($value['image_id'],'full','',$default).'
												</div></a></li>';
											?>

										<?php } ?>
								<?php endif; ?>
							<?php $html_body .= '
						</ul>
						<div class="clearfix"></div>
					</div>';
					$html_body .= '<div class="entry">'.get_the_content().'</div>'; 

 					

 					break;

  				default:
  					$html_body .= get_the_content();
  					# code...
  					break;
  			}
  			?>
  			<?php $html_body .= '</div>';?>

			
			<?php } ?>
			<?php $html_body .= '</div>';?>
			<?php $html_header .= '</ul>';?>
		<?php
		}
		wp_reset_postdata();
		?>
		<?php echo $html_header; ?>
		<?php echo $html_body; ?>
		

	</div> <!-- container -->
</section><!--/.services-->