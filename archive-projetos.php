<?php
get_header();
?>

<div id="projetos">

	<div class="container-fluid">
		<div class="container">
			<div class="p-md-5 title">
				<h1>Confira e inspire-se no que os alunos estão fazendo!</h1>
			</div>
		</div>

		<?php if(isset($_GET['course'])){?>
		<section class="tabsSingle">		
			<div class="cat2">
				<div class="container">
					<a href="<?php echo get_permalink($_GET['course']);?>">Sobre o curso</a>
					<a class="active" href="<?php echo get_home_url();?>/projetos?course=<?php echo get_the_id();?>">Projetos de alunos</a>
				</div>
			</div>
		</section>
		<?php } ?>


		<div class="filter">
			<div class="container">
				<i class='fal fa-filter'></i>
				<div class="select">
					<select class='form-control'>
						<option value="<?php echo get_home_url();?>/projetos">Selecione um curso</option>
						<?php 
							$args = array(
							    'post_type'  => 'product', 
							    'showposts'=> -1,
							);
							$projetos = new WP_Query($args);
							while ($projetos->have_posts()) : $projetos->the_post();
							$selected = '';
							if(isset($_GET['course'])){
								if(get_the_id() == $_GET['course']){
									$selected = 'selected';
								}
							}
							?>

								<option <?php echo $selected;?> value="<?php echo get_home_url();?>/projetos?course=<?php echo get_the_id();?>"><?php the_title();?></option>

							<?php
							endwhile; 
							$projetos = null; 
							$projetos = $temp; 
							wp_reset_postdata();
							?>
					</select>
				</div>
			</div>
		</div>


		<div class="my-5 list-projects">
			<div class="container">			
				<?php if(isset($_GET['course'])){
					echo "<div class='row'>";
					$args = array(
						'post_type'  => 'projetos', 
						'showposts'=> -1,
						'meta_query' => array(
						   array(
						       'key' => 'curso',
						       'value' => $_GET['course'],
						       'compare' => 'LIKE',
						   )
						)
					);
					$projetos = new WP_Query($args);
					while ($projetos->have_posts()) : $projetos->the_post();
					?>

							<div class="col-md-3 col-lg-4 itemList" data-curso="<?php the_field('curso');?>">
								<div class="box">
									<a href="<?php echo get_permalink();?>">
										<?php if(get_the_post_thumbnail_url()){
											the_post_thumbnail();
										} else {
											?>
											<img src="<?php echo get_post_meta(get_the_id(),'imagem_url',true)?>" class='w-100'/>
											<?php
										};?>		
									</a>
									<div class="infosBox">
										<a href="<?php echo get_permalink();?>">
											<h2 class="woocommerce-loop-product__title"><?php the_title();?></h2>
											<span class="professor"><?php echo get_the_title(get_post_meta(get_the_id(),'curso',true));?></span>
										</a>
										<div class="hover">
											<a href="<?php echo get_permalink();?>">
											<p><?php the_excerpt();?></p>
											<div class="infos">
												<?php echo get_the_date('d-m-Y');?>
											</div>
											</a>
											<a href="<?php echo get_permalink();?>" class="btn btn-warning">Saiba Mais</a> 
										</div>
									</div>
									
								</div>
							</div>

					<?php
					endwhile; 
					$projetos = null; 
					$projetos = $temp; 
					wp_reset_postdata();
					echo "</div>";
				} else { ?>	
					<div class="row">
						<?php while ( have_posts() ) : the_post(); ?>

							<div class="col-md-3 col-lg-4 itemList" data-curso="<?php the_field('curso');?>">
								<div class="box">
									<a href="<?php echo get_permalink();?>">
										<?php if(get_the_post_thumbnail_url()){
											the_post_thumbnail();
										} else {
											?>
											<img src="<?php echo get_post_meta(get_the_id(),'imagem_url',true)?>" class='w-100'/>
											<?php
										};?>	
									</a>
									<div class="infosBox">
										<a href="<?php echo get_permalink();?>">
											<h2 class="woocommerce-loop-product__title"><?php the_title();?></h2>
											<span class="professor"><?php echo get_the_title(get_post_meta(get_the_id(),'curso',true));?></span>
										</a>
										<div class="hover">
											<a href="<?php echo get_permalink();?>">
											<p><?php the_excerpt();?></p>
											<div class="infos">
												<?php echo get_the_date('d-m-Y');?>
											</div>
											</a>
											<a href="<?php echo get_permalink();?>" class="btn btn-warning">Saiba Mais</a> 
										</div>
									</div>
									
								</div>
							</div>

						<?php endwhile;  ?>
					</div>
					<?php //the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
				<?php } ?>
			</div>
		</div>


	</div>

</div>

<?php
get_footer();
?>