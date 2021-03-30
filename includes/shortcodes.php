<?php
add_shortcode('circus_zvezdnuy', 'my_shortcode');

function my_shortcode(){
	ob_start();

	get_template_part('includes/components/events/events');

	return ob_get_clean();
}
