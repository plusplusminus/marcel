<div class="flexslider flexslider-grid">
	<ul class="slides">
		<li>
			
				<?php $items = get_post_meta($post->ID,'_ppm_team_information',true); ?>
				<?php $default = array('class'=>'img-responsive'); ?>
				<?php $num = count($items); ?>
				<?php if (is_array($items)) : $count = 0; ?>

					<div class="row">
					<?php foreach ($items as $key => $value) { $count++; ?>

						<div class="col-xs-6 col-md-4">
							<div class="image-container">
								<?php echo wp_get_attachment_image($value['image_id'],'full','',$default);?>
							</div>
							<div class="team-content">
								<div class="col-xs-10">
									<h4 class='title'><?php echo $value['title']; ?></h4>
									<?php echo wpautop($value['description']);?>
								</div>
								<div class="col-xs-2">
									<div class="social">
										<?php if(!empty($value['web_link'])) : ?>
											<p><a href="<?php echo $value['web_link'];?>"><span class="icon-world"></span></a></p>
										<?php endif; ?>
										<?php if(!empty($value['facebook_link'])) : ?>
											<p><a href="<?php echo $value['facebook_link'];?>"><span class="icon-facebook"></span></a></p>
										<?php endif; ?>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<?php if (($count % 2 == 0)) echo '<div class="clearfix visible-xs"></div>'; ?>
						<?php if (($count % 3 == 0)) echo '<div class="clearfix visible-md"></div>'; ?>
						<?php if (($count % 6 == 0) && ($num != $count)) echo '</div></li><li><div class="row">'; ?>
					<?php } ?>
					</div>
				<?php endif; ?>
		</li>
	</ul>
</div>