<?php

/* Meta Box: Additional Information */

function bcfw_add_meta_info_slider_bootstrap_carousel()
{
	add_meta_box(
		'info_slider_bootstrap_carousel',
		'Additional Information',
		'bcfw_info_slider_bootstrap_carousel_view',
		'bootstrap_carousel',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'bcfw_add_meta_info_slider_bootstrap_carousel');

/* Meta Box styles */

function bcfw_info_slider_bootstrap_carousel_view( $post )
{ 
	$slider_bootstrap_carousel_meta_data = get_post_meta( $post->ID );
	$value = '';
	if( isset($slider_bootstrap_carousel_meta_data['image_link_id'][0]) ){
		$value = $slider_bootstrap_carousel_meta_data['image_link_id'][0];
	}
	?>
	<div>
		<label for="slider_bootstrap_carousel_link_input">Image link:</label>
		<input id="slider_bootstrap_carousel_link_input" type="text" name="image_link_id" style="width:100%;" value="<?= $value; ?>">
	</div>
	<?php
}

/* Update Post Meta: Additional Information */

function bcfw_save_meta_info_slider_bootstrap_carousel( $post_id )
{
	if( isset($_POST['image_link_id']) ) {
		update_post_meta( $post_id, 'image_link_id', sanitize_text_field( $_POST['image_link_id'] ) );
	}
}
add_action('save_post', 'bcfw_save_meta_info_slider_bootstrap_carousel');
