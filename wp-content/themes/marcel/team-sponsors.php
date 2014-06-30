<div class="<?php echo $post->post_name;?>">
	<div class="row">
		<?php $items = get_post_meta($post->ID,'_ppm_team_information',true); ?>
		<?php $default = array('class'=>'img-responsive'); ?>
		<?php if (is_array($items)) :  ?>
			<?php $num = count($items); ?>
			<?php $offset = ($num*4 -12)/2; ?>
			<?php $class = 12 / $num + $offset; ?>
			<?php $count = 0; ?>
			<?php foreach ($items as $key => $value) { $count++; ?>
				<div class="<?php if ($count ==1) echo 'col-md-offset-'.abs($offset); ?> col-md-4 col-xs-6">
					<div class="image-container">
						<?php echo wp_get_attachment_image($value['image_id'],'full','',$default);?>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="team-content">
								<div class="col-xs-10">
									<h4 class='title'><?php echo $value['title']; ?></h4>
									<a href="<?php echo $value['web_link'];?>"><?php echo wpautop($value['description']);?></a>
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
					</div>
				</div>
			<?php } ?>
		<?php endif; ?>
	</div>
</div>