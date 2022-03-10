<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="product-detail <?php if(get_field('jornada') == '1') { ?>jornada<?php } ?>" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	
	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	//do_action( 'woocommerce_before_single_product_summary' );
	?>
	<div class="container">
		<div class="summary entry-summary">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>

	<section class="tabsSingle">		
		<div class="cat">
			<div class="container">
				<a class='active' href="<?php echo get_permalink();?>">Sobre o curso</a>
				<a href="<?php echo get_home_url();?>/projetos?course=<?php echo get_the_id();?>">Projetos de alunos</a>
			</div>
		</div>
	</section>

	<div class="video">
		<div class="container">
			<?php
			if(get_field('video')){
				the_field('video');
			} else {
				?>
				<img src="<?php the_field('hero_imagem');?>" class='w-100'/>
				<?php
			}
			?>
		</div>
	</div>

	<?php //if(get_field('jornada') == '1'){?>
	<!-- 
	<div class="timelineJornada">
		<div class="container">
			<div class="row position-relative">
				<div class="col-md-7 timelineJornada-content">
					<h2>Transforme seu aprendizado em uma jornada!</h2>
					<p>Os cursos da Saibalá foram organizados em um formato mais completo e engajador.  Conheça a nossa jornada de aprendizado.</p>
					<p>O mercado de cursos oferece hoje uma ampla gama de opções para quem procura especialização.  Mas como fazer a melhor escolha para seu tempo e investimento? Com o objetivo de oferecer uma experiência de ensino mais completa e engajadora, a Saibalá reuniu seus cursos em unidades interconectadas. </p>
					<p>Nasceram, assim, as jornadas de aprendizado. Desenvolvidas com técnicas inovadoras, as nossas jornadas são comandadas por profissionais experientes e treinados para oferecer uma visão ampla e objetiva sobre sua área de interesse, com o dinamismo que você precisa.</p>
					<p>Impulsione sua carreira com conteúdo de alta qualidade e um formato adaptado à sua rotina! </p>
				</div>
				<img class="chartJourney" src="<?php echo get_template_directory_uri(); ?>/assets/img/chartJourney2.png"/>
			</div>
		</div>
	</div>
	-->
	<?php //}?>
	<div class="aprender">
		<div class="container">
			<div class="row">
				<div class="col-md-7 <?php if(get_field('jornada') == '0') { ?>order-2 order-md-1<?php } ?> ">
					<h2>O que você vai aprender:</h2>
					<h3>
						<?php if(get_field('jornada') == '1') { the_field('aprender_titulo'); } ?>
					</h3>
					<?php the_field('aprender_descricao');?>
				</div>
				<div class="col-md-4 offset-md-1 <?php if(get_field('jornada') == '0') { ?>d-md-flex align-items-center order-1 order-md-2<?php } ?>">
					<?php
						if(get_field('jornada') == '0'): 
					?>
					<h3 class="text-md-right" style="max-width: 100% !important;>">
						<?php the_field('aprender_titulo'); ?>
					</h3>
					<?php endif; ?>
					<?php 
						$images = get_field('aprender_imagem');
						if( $images ): ?>
							<?php foreach( $images as $image ): ?>
									<img class='w-100' src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<?php endforeach; ?>
						<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="container-fluid px-0">
			<img class="chartJourney d-none d-md-block" src="<?php echo get_template_directory_uri(); ?>/assets/img/chartJourney3_1.png"/>
		</div>
	</div>


	<div class="paraquem">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h4>Para quem?</h4>
					<?php the_field('paraquem_descricao');?>
				</div>
				<div class="col-md-9">
					<?php if( have_rows('paraquem_lista') ): ?>
					    <div class="row paraquem_lista">
					    <?php while( have_rows('paraquem_lista') ): the_row(); 
					        $image = get_sub_field('image');
					        ?>
					        <div class='col-md-4'>
					            <div class="box">
												<div class="content">
													<img src="<?php the_sub_field('icone');?>"/>
													<h5><?php the_sub_field('titulo');?></h5>
												</div>
					            	<p><?php the_sub_field('descricao');?></p>
					            </div>
					        </div>
					    <?php endwhile; ?>
					    </div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php if( have_rows('depoimentos') ): ?>
	<section class="depoimentos">
		<div class="container-fluid p-0">
			<div class="text-center">
				<h3>Veja o que nossos alunos falam</h3>
				<div class="owl-carousel">
						<?php while( have_rows('depoimentos') ): the_row(); 
								$image = get_sub_field('image');
								?>
						<div class='item'>
							<div class="row">
								<div class="col-md-4">
									<img src="<?php the_sub_field('foto');?>"/>
								</div>
								<div class="col-md-8">
									<h4><?php the_sub_field('nome');?></h4>
									<p><?php the_sub_field('depoimento');?></p>
								</div>
							</div>
						</div>
						<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	
	<section class="cta middle-cta">
		<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
	</section>

	<?php 
	if(get_field('projetos')){
		$ids = array();
		foreach (get_field('projetos') as $key => $value) {
			$ids[] = $value->ID;
		}
		?>

		<section class="projetos">
			<div class="container-fluid p-0">
				<div class="text-center">
					<h3>Veja o que produzimos<br> nas últimas aulas</h3>
					<div class="owl-carousel">
						<?php 
							$args = array(
							    'post_type'  => 'projetos', 
							    'showposts'=> -1,
								'post__in'			=> $ids,
							);
							$projetos = new WP_Query($args);
							while ($projetos->have_posts()) : $projetos->the_post();
							?>

							
								<div class="item">
											<img src="<?php echo get_post_meta(get_the_id(),'imagem_url',true)?>" class='w-100'/>	
								</div>


							<?php
							endwhile; 
							$projetos = null; 
							$projetos = $temp; 
							wp_reset_postdata();
							?>
					</div>
				</div>
			</div>
		</section>

		<?php
	}?>


	<?php 
	if(get_field('professor')){
		$ids = array();
		$index = 0;
		foreach (get_field('professor') as $key => $value) {
			$ids[] = $value->ID;
			$index ++;
		}
		?>

		<section class="professores <?php if($index % 2 == 0){echo "par"; }else{echo "impar";} ?>">
			<div class="container">
				<?php				
				if(get_field('jornada') == '1'){
					?>
					<h2>Conheça os professores:</h2>
					<?php
				} else {
					?>
					<h2>Conheça o professor:</h2>
					<?php
				}
				?>
				<div class="box">
					<?php 
						$args = array(
							'post_type'  => 'professores', 
							'showposts'=> -1,
							'post__in'			=> $ids,
						);
						$projetos = new WP_Query($args);
						$count = 0;
						while ($projetos->have_posts()) : $projetos->the_post();
						$count = $count+1;
						if($count % 2 == 0){
							$class1 = 'order-1 order-md-2';
							$class2 = 'order-2 order-md-1 text-md-right';
						} else {
							$class1 = '';
							$class2 = '';
						}
						?>				
							<div class="row mb-3">
								<div class="col-md-5 <?php echo $class1;?>">
									<img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large');?>" class='w-100'/>
								</div>
								<div class="col-md-7 <?php echo $class2;?>">
									<h3><?php the_title();?> <span><?php the_field('especialidade');?></h3>
									<?php the_content();?>
								</div>								
							</div>


						<?php
						endwhile; 
						$projetos = null; 
						$projetos = $temp; 
						wp_reset_postdata();
						?>
				</div>
			</div>
		</section>

		<?php
	}?>


	<?php 
	if(have_rows('etapas')){
		?>

		<section class="percurso">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-lg-6">
						<h3 class="percurso-titulo"><?php the_field('percurso_titulo');?></h3>
						<p class="percurso-descricao"><?php the_field('percurso_descricao');?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<h2>Confira tudo o que você vai aprender:</h2>
					</div>
				</div>
				<div class="row items">
				    <?php
				    	$count = 0;
				    	while( have_rows('etapas') ): the_row(); 
				    	$count = $count + 1;
				        ?>
								<?php if(get_field('jornada') == '1'){?>
									<div class="item col-md-12">
										<a class="jornada-toogle-button collapsed" role="button" data-toggle="collapse" href="#etapa-<?php echo $count;?>" aria-expanded="false" aria-controls="etapa-<?php echo $count;?>">
											<div>
												<h3>Etapa <?php echo sprintf("%02d", $count);?> |</h3>
												<p><?php the_sub_field('titulo');?></p>
											</div>
											<img class="chevron d-none d-md-block" src="<?php echo get_template_directory_uri(); ?>/assets/img/chevron.png"/>
										</a>
										<div class="collapse" id="etapa-<?php echo $count;?>">
											<div>
												<ul>								
												<p><?php the_sub_field('descricao');?></p>
												<?php
														if(have_rows('itens')){
															while( have_rows('itens') ): the_row(); 
																?>
														<li><?php the_sub_field('titulo');?></li>
														<?php endwhile;
														} ?>
												</ul>
											</div>
										</div>
										<a style="min-height: auto !important" class="jornada-toogle-button collapsed d-md-none" role="button" data-toggle="collapse" href="#etapa-<?php echo $count;?>" aria-expanded="false" aria-controls="etapa-<?php echo $count;?>">
											<img class="chevron d-md-none" src="<?php echo get_template_directory_uri(); ?>/assets/img/chevron.png"/>
										</a>
									</div>
								<?php } else { ?>
									<div class="item col-md-10 offset-md-1">	
										<h2><?php the_sub_field('titulo');?></h2>
										<p><?php the_sub_field('descricao');?></p>
										<ul>								
												<?php
												if(have_rows('itens')){
													while( have_rows('itens') ): the_row(); 
														?>
												<li><?php the_sub_field('titulo');?></li>
												<?php endwhile;
												} ?>
										</ul>
									</div>					
								<?php } 
							endwhile; ?>
				</div>
			</div>
		</section>

		<?php
	}?>

	<?php 
		if(get_field('jbf_titulo')){
	?>
	
	<section class='jornada-final'>
		<div class="container">
			<div class="box">
				<div class="box-head">
					<div class="box-content">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 69.303 68.661">
							<g id="Grupo_149" data-name="Grupo 149" transform="translate(-0.003 -0.042)">
								<path id="Caminho_53" data-name="Caminho 53" d="M43.5.047a5.423,5.423,0,0,0-.7.106,10.862,10.862,0,0,0-1.343.352c-.917.287-1.941.688-2.949,1.081S36.5,2.373,35.725,2.66a10.8,10.8,0,0,1-1.073.295h-.008a9.506,9.506,0,0,1-1.049-.295c-.786-.287-1.786-.688-2.793-1.081S28.754.792,27.828.506A12.119,12.119,0,0,0,26.5.17a2.864,2.864,0,0,0-1.7.016,2.95,2.95,0,0,0-1.45.893,12.482,12.482,0,0,0-.934,1.016c-.614.745-1.278,1.63-1.917,2.507s-1.262,1.761-1.761,2.417a9.658,9.658,0,0,1-.729.827,9.043,9.043,0,0,1-1.065.328c-.811.18-1.86.377-2.924.6s-2.138.442-3.072.7a10.812,10.812,0,0,0-1.319.434,2.966,2.966,0,0,0-1.4.942A2.919,2.919,0,0,0,7.5,12.376a9.9,9.9,0,0,0-.246,1.368C7.135,14.7,7.07,15.792,7,16.873s-.115,2.163-.18,2.99a9.8,9.8,0,0,1-.172,1.1,10.686,10.686,0,0,1-.7.836c-.582.6-1.368,1.335-2.146,2.089s-1.565,1.54-2.212,2.261a11.135,11.135,0,0,0-.86,1.065A3.134,3.134,0,0,0,.27,30.455a9.683,9.683,0,0,0,.524,1.27c.418.868.958,1.835,1.491,2.785s1.065,1.876,1.458,2.613a9.84,9.84,0,0,1,.442,1.008h0a10.818,10.818,0,0,1-.139,1.1c-.172.811-.418,1.851-.664,2.908s-.492,2.122-.647,3.08a11.6,11.6,0,0,0-.156,1.376,2.968,2.968,0,0,0,.262,1.671,3,3,0,0,0,1.106,1.3,11.95,11.95,0,0,0,1.13.786c.827.508,1.794,1.024,2.752,1.532s1.925,1.008,2.654,1.409a9.225,9.225,0,0,1,.917.614,9.587,9.587,0,0,1,.467.983c.295.778.647,1.8,1.016,2.826s.737,2.048,1.122,2.933a12.574,12.574,0,0,0,.614,1.245,2.99,2.99,0,0,0,1.147,1.27,2.9,2.9,0,0,0,1.606.5,12.728,12.728,0,0,0,1.384.049c.967-.016,2.064-.106,3.146-.2s2.154-.2,2.982-.262a8.9,8.9,0,0,1,1.1.025,7.877,7.877,0,0,1,.942.582c.672.492,1.524,1.163,2.384,1.827s1.728,1.319,2.531,1.86a12,12,0,0,0,1.2.7,3.174,3.174,0,0,0,3.26,0,10.417,10.417,0,0,0,1.18-.7c.8-.541,1.7-1.2,2.556-1.868s1.7-1.327,2.376-1.819a8.319,8.319,0,0,1,.926-.582,9.4,9.4,0,0,1,1.114-.016c.827.057,1.884.147,2.965.238s2.187.18,3.154.2a10.847,10.847,0,0,0,1.376-.041A3.173,3.173,0,0,0,54.7,61.887a11,11,0,0,0,.614-1.245c.385-.893.762-1.909,1.122-2.933s.721-2.04,1.016-2.818a10.664,10.664,0,0,1,.483-1,7.986,7.986,0,0,1,.917-.614c.721-.4,1.679-.893,2.646-1.4s1.917-1.024,2.736-1.532c.41-.262.786-.508,1.147-.786a2.951,2.951,0,0,0,1.09-1.294,2.88,2.88,0,0,0,.262-1.688,10.144,10.144,0,0,0-.156-1.368c-.156-.95-.393-2.032-.639-3.088s-.483-2.089-.655-2.908a9.589,9.589,0,0,1-.147-1.1,10.7,10.7,0,0,1,.442-1.008c.393-.729.934-1.663,1.466-2.605s1.065-1.917,1.483-2.793a11.958,11.958,0,0,0,.532-1.27,2.851,2.851,0,0,0,.2-1.679,2.908,2.908,0,0,0-.68-1.556,11.329,11.329,0,0,0-.868-1.073c-.647-.721-1.417-1.483-2.2-2.245s-1.565-1.5-2.146-2.1a9.355,9.355,0,0,1-.713-.844,7.891,7.891,0,0,1-.18-1.09c-.066-.827-.106-1.9-.172-2.982s-.131-2.187-.254-3.146a11.151,11.151,0,0,0-.246-1.36,3.18,3.18,0,0,0-2.146-2.474,11.846,11.846,0,0,0-1.319-.434c-.934-.254-2-.475-3.064-.7s-2.122-.41-2.933-.59A9.477,9.477,0,0,1,51.3,7.837h-.008a9.479,9.479,0,0,1-.721-.819c-.5-.655-1.139-1.54-1.778-2.417S47.5,2.84,46.882,2.095a11.23,11.23,0,0,0-.942-1.016A3.019,3.019,0,0,0,44.5.178,2.87,2.87,0,0,0,43.5.047ZM26.075,4.52a3.728,3.728,0,0,1,.459.131c.729.229,1.712.59,2.7.975s1.991.778,2.867,1.1a5.8,5.8,0,0,0,2.556.647A5.685,5.685,0,0,0,37.2,6.732c.885-.319,1.884-.721,2.875-1.106s1.958-.762,2.687-.983a4.5,4.5,0,0,1,.467-.123c.106.115.2.188.328.344.492.59,1.114,1.425,1.745,2.277s1.237,1.753,1.81,2.5A5.444,5.444,0,0,0,51.4,12.392c.909.2,1.974.41,3.015.623s2.056.426,2.785.623c.213.057.311.115.467.164.025.156.049.262.074.475.1.754.172,1.786.238,2.843s.115,2.146.188,3.08a5.349,5.349,0,0,0,2.114,4.628c.664.672,1.434,1.417,2.2,2.154s1.5,1.483,2.007,2.048c.139.156.213.246.311.369-.057.139-.1.246-.188.442-.336.688-.827,1.606-1.352,2.531s-1.057,1.86-1.5,2.687a5.748,5.748,0,0,0-1,2.425,5.829,5.829,0,0,0,.262,2.621c.2.917.459,1.958.7,2.99s.467,2.056.59,2.81c.033.213.033.319.049.475-.131.09-.221.156-.4.27-.647.4-1.556.9-2.49,1.393s-1.9,1-2.72,1.458a5.669,5.669,0,0,0-2.154,1.507,5.591,5.591,0,0,0-1.18,2.343c-.336.877-.7,1.892-1.049,2.892s-.729,1.974-1.032,2.671a4.474,4.474,0,0,1-.2.434c-.156.008-.262.025-.475.025-.762-.016-1.81-.1-2.867-.188s-2.122-.2-3.064-.254a5.719,5.719,0,0,0-2.63.106,5.806,5.806,0,0,0-2.261,1.335c-.754.557-1.606,1.221-2.441,1.868s-1.679,1.278-2.31,1.7c-.18.123-.279.172-.418.254-.131-.074-.229-.139-.41-.254-.631-.426-1.466-1.049-2.31-1.7s-1.688-1.3-2.441-1.86a5.851,5.851,0,0,0-2.269-1.343,5.659,5.659,0,0,0-2.621-.09c-.934.057-2.015.156-3.072.246s-2.089.164-2.851.172a4.458,4.458,0,0,1-.483-.008c-.066-.139-.139-.238-.221-.434-.3-.7-.664-1.671-1.016-2.671s-.713-2.015-1.049-2.892a5.717,5.717,0,0,0-1.188-2.343A5.792,5.792,0,0,0,12.575,49.5c-.819-.451-1.786-.942-2.72-1.442S8,47.068,7.356,46.667c-.18-.115-.27-.18-.4-.27.016-.156.025-.27.057-.483.123-.754.36-1.769.6-2.8s.492-2.089.68-3.006a5.792,5.792,0,0,0,.262-2.613,5.785,5.785,0,0,0-1-2.433c-.442-.827-.975-1.753-1.491-2.679S5.038,30.537,4.71,29.849c-.09-.188-.139-.287-.2-.434.1-.123.172-.221.311-.385.508-.565,1.237-1.294,2-2.032s1.548-1.483,2.2-2.146A5.817,5.817,0,0,0,10.666,22.8a5.71,5.71,0,0,0,.475-2.58c.074-.934.139-2.032.2-3.1s.123-2.089.213-2.843c.033-.213.057-.319.09-.475.147-.049.246-.1.459-.156.729-.2,1.745-.4,2.785-.614S17,12.6,17.916,12.392a5.73,5.73,0,0,0,2.482-.844A5.663,5.663,0,0,0,22.2,9.64c.565-.745,1.2-1.63,1.819-2.49s1.237-1.679,1.728-2.261C25.886,4.725,25.968,4.634,26.075,4.52Zm-1.622,16a6.914,6.914,0,1,0,6.906,6.914A6.938,6.938,0,0,0,24.453,20.518Zm15.72.434a2.162,2.162,0,0,0-1.9,1.122L27.345,40.982a2.171,2.171,0,0,0,3.711,2.253l.049-.09L42.016,24.238a2.17,2.17,0,0,0-.745-2.974A2.241,2.241,0,0,0,40.173,20.953ZM24.453,24.86a2.572,2.572,0,1,1-2.564,2.572A2.546,2.546,0,0,1,24.453,24.86Zm20.463,8.126A6.914,6.914,0,1,0,51.822,39.9,6.947,6.947,0,0,0,44.916,32.986Zm0,4.333a2.576,2.576,0,1,1-2.58,2.58A2.547,2.547,0,0,1,44.916,37.32Z" transform="translate(0 0)"/>
							</g>
						</svg>
						<h3>Aproveite!</h3>
						<?php if($product->get_sale_price()){?>
						<span class='op regular-price'><small>de:</small> <?php echo wc_price($product->get_regular_price(), array('decimals' => 0)); ?></span>
						<span class='highlight'><small>por: </small><?php echo wc_price($product->get_sale_price(), array('decimals' => 0)); ?></span>
						<?php } else {
							?>
							<span><?php echo wc_price($product->get_regular_price(), array('decimals' => 0)); ?></span>
							<?php
						}?>
					</div>
				</div>
				<div class="box-body">
					<div class="box-content">
						<p class="box-body-title"><?php the_field('jbf_titulo');?></p>
						<p class="box-body-subtitle"><?php the_field('jbf_subtitulo');?></p>
						<div class="list-items">												
							<ul class="list-item first-column">
								<?php
								if(have_rows('jbf_itens_inclusos')){
									while( have_rows('jbf_itens_inclusos') ): the_row(); 
										?>
										<li class='align'>
											<div>
												<span class="title"><?php the_sub_field('item');?></span>
												<span><?php the_sub_field('descricao');?></span>
											</div>
											<span class="price-box">R$ <?php the_sub_field('valor');?></span>
										</li>
										<?php endwhile;
								} ?>
							</ul>
							<ul class="list-item second-column">
								<?php
								if(have_rows('jbf_itens_bonus')){
									while( have_rows('jbf_itens_bonus') ): the_row(); 
										?>
										<li class='align'>
											<div>
												<span class="title"><?php the_sub_field('item');?></span>
												<span><?php the_sub_field('descricao');?></span>
											</div>
											<span class="price-box">R$ <?php the_sub_field('valor');?></span>
										</li>
										<?php endwhile;
								} ?>
							</ul>
						</div>
						<hr>
						<div class="prices">						
								<?php if($product->get_sale_price()){?>
								<span class='op'>Total: <?php echo wc_price($product->get_regular_price(), array('decimals' => 0)); ?></span>
								<span>Pague apenas <?php echo wc_price($product->get_sale_price(), array('decimals' => 0)); ?></span>
								<?php } else {
									?>
									<span><?php echo wc_price($product->get_regular_price(), array('decimals' => 0)); ?></span>
									<?php
								}?>
						</div>
					</div>
				</div>
			</div>

			<div class="obs">
				<h4>Não gostou do curso?</h4>
				<p>Se pedir reembolso nos primeiros<br> 7 dias, devolvemos seu dinheiro</p>
			</div>
		</div>
	</section>
	
	<?php } ?>

	<section class="cta" style="width: 95%; margin:auto">
		
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
			<div class='share'>
				<h3>Compartilhe</h3>
				<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink();?>" target="_blank"><i class='fab fa-facebook-f'></i></a>
				<a href="http://api.whatsapp.com/send?1=pt_BR&text=<?php the_permalink();?>" target="_blank"><i class='fab fa-whatsapp'></i></a>
				<a href="http://twitter.com/share?text=<?php the_title();?>&url=<?php the_permalink();?>" target="_blank"><i class='fab fa-twitter'></i></a>
				<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink();?>" target="_blank"><i class='fab fa-linkedin'></i></a>
			</div>
	</section>
				

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
