<?php

add_action( 'widgets_init', 'createsidebarProduct' );
function createsidebarProduct() {
    register_sidebar( array(
        'name' => 'Filter',
        'id' => 'filter-home',
        'before_widget' => '<div class="widgetProduct">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
    ) );
}



?>