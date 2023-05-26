<?php
// get_header('shop');
get_header();

while (have_posts()) {
	the_post();
	the_content();
}

get_footer();