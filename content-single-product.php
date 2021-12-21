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
<div class="product-detail " id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

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
	<div class="timelineJornada">
		<div class="container">
			<h4>Transforme seu aprendizado em uma jornada!</h4>
			<div class="row">
				<div class="col-md-4">
					<p>Os cursos da Saibalá foram organizados em um formato mais completo e engajador.  Conheça a nossa jornada de aprendizado.</p>
				</div>
				<div class="col-md-4">
					<p>O mercado de cursos oferece hoje uma ampla gama de opções para quem procura especialização.  Mas como fazer a melhor escolha para seu tempo e investimento? Com o objetivo de oferecer uma experiência de ensino mais completa e engajadora, a Saibalá reuniu seus cursos em unidades interconectadas. </p>
				</div>
				<div class="col-md-4">
					<p>Nasceram, assim, as jornadas de aprendizado. Desenvolvidas com técnicas inovadoras, as nossas jornadas são comandadas por profissionais experientes e treinados para oferecer uma visão ampla e objetiva sobre sua área de interesse, com o dinamismo que você precisa.</p>
					<p>Impulsione sua carreira com conteúdo de alta qualidade e um formato adaptado à sua rotina! </p>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/chartJourney.png"/>
		</div>
	</div>
	<?php //}?>
	<div class="aprender">
		<div class="container">
			<h4>O que você vai aprender:</h4>
			<div class="row">
				<div class="col-md-8">
					<h5><?php the_field('aprender_titulo');?></h5>
					<?php the_field('aprender_descricao');?>
				</div>
				<div class="col-md-4">
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
					            	<img src="<?php the_sub_field('icone');?>"/>
					            	<h5><?php the_sub_field('titulo');?></h5>
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
		foreach (get_field('professor') as $key => $value) {
			$ids[] = $value->ID;
		}
		?>

		<section class="professores">
			<div class="container">
				<?php				
				if(get_field('jornada') == '1'){
					?>
					<h3>Conheça os professores</h3>
					<?php
				} else {
					?>
					<h3>Conheça o professor</h3>
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
							$class2 = 'order-2 order-md-1';
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
									<h2><?php the_title();?> <span><?php the_field('especialidade');?></h2>
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
					<div class="col-md-4">
						<h3><?php the_field('percurso_titulo');?></h3>
						<p><?php the_field('percurso_descricao');?></p>
						<p><b>Confira tudo o que você vai aprender:</b></p>
					</div>
				</div>
				<div class="row items">

				    <?php
				    	$count = 0;
				    	while( have_rows('etapas') ): the_row(); 
				    	$count = $count + 1;
				        ?>
				        <?php if(get_field('jornada') == '1'){?>
						<div class="item col-md-6">
						<?php } else { ?>
						<div class="item col-md-12">						
						<?php } ?>
							<h2><?php if(get_field('jornada') == '1'){?><b>Etapa <?php echo $count;?> |</b><?php }?> <?php the_sub_field('titulo');?></h2>
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
				    <?php endwhile; ?>
				</div>
			</div>
		</section>

		<?php
	}?>

	<?php 
	if(get_field('jbf_titulo')){?>
	
	<section class='jornada-final'>
		<div class="container">
			<div class="box">
				<div class="box-head">
					<div class="row">
						<div class="col-md-5">
							<h3>Aproveite</h3>
						</div>
						<div class="col-md-7">
							<?php if($product->get_sale_price()){?>
							<span class='op'><small>de:</small> <?php echo wc_price($product->get_regular_price()); ?></span>
							<span><small>por:</small><?php echo wc_price($product->get_sale_price()); ?></span>
							<?php } else {
								?>
								<span><?php echo wc_price($product->get_regular_price()); ?></span>
								<?php
							}?>
						</div>
					</div>
				</div>
				<div class="box-body">
					<h4><?php the_field('jbf_titulo');?></h4>
					<h5><?php the_field('jbf_subtitulo');?></h5>
					<div class="row items">												
					    <?php
					    if(have_rows('jbf_itens_inclursos')){
					    	while( have_rows('jbf_itens_inclursos') ): the_row(); 
					        ?>
					        <div class="col-md-6 item">
					        	<div class='align'>
					        		<h6><?php the_sub_field('item');?></h6>
					        		<p><?php the_sub_field('descricao');?></p>
					        		<span><?php the_sub_field('valor');?></span>
					        	</div>
					        </div>
					    <?php endwhile;
					    } ?>
					</div>
					<hr>
					<div class="prices">						
							<?php if($product->get_sale_price()){?>
							<span class='op'>Total: <?php echo wc_price($product->get_regular_price()); ?></span>
							<span>Pague apenas <?php echo wc_price($product->get_sale_price()); ?></span>
							<?php } else {
								?>
								<span><?php echo wc_price($product->get_regular_price()); ?></span>
								<?php
							}?>
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

	<section class="cta">
		
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
