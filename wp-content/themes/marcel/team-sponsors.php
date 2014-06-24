<div class="<?php echo $post->post_name;?>">
	<div class="row">
		<?php $items = get_post_meta($post->ID,'_ppm_team_information',true); ?>
		<?php $default = array('class'=>'img-responsive'); ?>
		<?php if (is_array($items)) :  ?>
			<?php foreach ($items as $key => $value) {  ?>
				<div class="col-md-4">
					<div class="image-container">
						<?php echo wp_get_attachment_image($value['image_id'],'full','',$default);?>
					</div>
					<div class="row">
						<div class="col-md-10">
							<h4 class='title'><?php echo $value['title']; ?>
							<?php echo wpautop($value['description']);?>
						</div>
						<div class="col-md-2">
							<?php if(!empty($value['web_link'])) : ?>
								<p><a href="<?php echo $value['web_link'];?>"><span class="fa fa-globe"></span></a></p>
							<?php endif; ?>
							<?php if(!empty($value['facebook_link'])) : ?>
								<p><a href="<?php echo $value['facebook_link'];?>"><span class="fa fa-facebook"></span></a></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php endif; ?>
	</div>
	<hr>
</div>