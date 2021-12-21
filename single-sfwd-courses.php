<?php
get_header('shop');
?>
<div class="container mt-5 pt-4">
	<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>

	<?php endwhile;  ?>
</div>

<?php
get_footer();
?>