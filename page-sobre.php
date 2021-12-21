<?php
// Template Name: Sobre
get_header('shop');
?>

<div class="sobre">

	<div class="container-fluid">
		<div class="p-md-4 title">
			<h1><?php the_title();?></h2>
		</div>
		<!--<div class="menu">			
			<?php
			/*wp_nav_menu( array( 
				'theme_location' => 'sobre-menu'
				) ); 
			*/?>
		</div>-->
		<div class="my-5 editor">
			<div class="container">
				
				<?php while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>

				<?php endwhile;  ?>
			</div>
		</div>
	</div>

</div>

<?php
get_footer();
?>