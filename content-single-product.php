<div class="video__section" style="display:none">
		<span class="video__close"></span>
		<iframe src="https://player.vimeo.com/video/<?php the_field('vimeo_video_id'); ?>" width="90%" height="90%" frameBorder="0" allow="autoplay; fullscreen" allowFullScreen></iframe>
	</div>	
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
<div class="product-detail<?php if(get_field('layout') == 'v2') { ?>-v2<?php } ?> <?php if(get_field('jornada') == '1') { ?>jornada<?php } ?>" id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>


<?php 
if (isset($_GET['header'])) {
	$headerId = intval($_GET['header']);
	if ($headerId) {
		headers($headerId);
	}
}


if(get_field('layout') == 'v2') { ?>
<!--
<section class="single-fixed-cta">
	<?php
		echo apply_filters(
			'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
			sprintf(
				'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
				esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
				isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
				esc_html( get_field('call_to_action') )
			),
			$product,
			$args
		);
	?>
	<p>comprando agora ganhe <span><?php echo $desconto?>%</span> de desconto</p>
</section>
-->

<section class="intro__curso">
	<?php the_post_thumbnail('full',['class'=>'background']); ?>
	<div class="container">
		<h1><span><span><?php echo get_the_title(); ?></span></span></h1>
		<p><?php the_field('subtitulo') ?></p>
		<?php if(get_field('vimeo_video_id')){ ?>
			<a class="cta__video">Assista o trailer</a>
		<?php } ?>
		<a href="<?= $product->add_to_cart_url(); ?>" data-quantity="1" class="comprar__default">compre agora!</a>
	</div>
</section>


<section class="single-para-quem">
	<div class="container">
		<h2>Para quem <br>indicamos?</h2>
		<div class="row mx-md-0">
			<?php if( have_rows('paraquem_lista') ): ?>
				<?php while( have_rows('paraquem_lista') ): the_row(); 
					$image = get_sub_field('image');
					?>
						<div class="col-md-4 px-0">
							<div class="box">
								<div class="box-content">
									<h3><?php the_sub_field('titulo');?></h3>
									<p><?php the_sub_field('descricao');?></p>
								</div>
								<img src="<?php the_sub_field('icone');?>"/>
							</div>
						</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>


<section class="oque__aprender">
	<div class="container">
		<div class="row principal">
			<div class="col-md-4 left__aprender">
				<h2><?php the_field('o-que-aprender-destaque'); ?></h2>
			</div>
			<div class="col-md-7 offset-md-1 right__aprender">
				<div class="row">
					<?php if( have_rows('o-que-aprender-items') ): ?>
						<?php while( have_rows('o-que-aprender-items') ): the_row(); ?>
							<div class="col-md-6 content">
								<h3><?php the_sub_field('o-que-aprender-items-titulo');?></h3>
								<p><?php the_sub_field('o-que-aprender-items-conteudo');?></p>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<a href="<?= $product->add_to_cart_url(); ?>" data-quantity="1" class="comprar__default">compre agora!</a>
	</div>
</section>

<?php 
if(get_field('professor')){
	$ids = array();
	$index = 0;
	foreach (get_field('professor') as $key => $value) {
		$ids[] = $value->ID;
		$index ++;
	};
?>
<section class="single-professores">
	<div class="container jornada">
		<h2>Aprenda com <br>Profissionais de sucesso</h2>
		<p class="intro"><?= get_field('descricao-prof'); ?></p>
		<div class="<?php if (count(get_field('professor')) >= 2) { ?>owl-carousel<?php  } else { echo 'blocos__simples'; } ?>">
			<?php foreach ($ids as $id): ?>
				<div class="single-professores-item">
					<div class="image-section">
						<img src="<?php echo get_the_post_thumbnail_url( $id,'large');?>" />
						<h3><?= get_the_title($id);?></h3>
						<div class="overlay"></div>
					</div>
					
					<div class="content">
						<?php
							//$post = get_post($id);
							echo strip_tags(get_post_field('post_content', $id));
						?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>			
	</div>
</section>
<?php
	}
?>

<section class="jeito__saibala">
	<div class="container">
		<h2>Jeito saibalá de ensinar:</h2>
		<div class="jeito__list">
			<div class="jeito__item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icone-cinema.svg">
				<h3>Qualidade de cinema</h3>
			</div>
			<div class="jeito__item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icone-ponto-vista.svg">
				<h3>Especialistas com diferentes pontos de vistas</h3>
			</div>
			<div class="jeito__item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icone-simples.svg">
				<h3>Tornamos o complexo em simples</h3>
			</div>
			<div class="jeito__item">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icone-ritimo.svg">
				<h3>Aprenda no seu ritmo</h3>
			</div>
		</div>
	</div>
</section>


<?php if (get_field('ativar_as_marcas')): ?>
<section class="empresas"> 
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2>empresas que<br> os especialistas<br> já atuaram:</h2>
			</div>
			<div class="col-md-8 empresas__logos">
				<div class="row">
					<?php if( have_rows('marcas') ): ?>
						<?php while( have_rows('marcas') ): the_row(); ?>
							<div class="col-md-4 col-6">
								<img src="<?= get_sub_field('imagem'); ?>" alt="Saibalá">
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<a href="<?= $product->add_to_cart_url(); ?>" data-quantity="1" class="comprar__default">compre agora!</a>
	</div>
</section>
<?php endif; ?>

<?php if (have_rows('etapas')): ?>
<section class="single-programa-completo">
	<div class="container">
		<h2>Confira o programa completo</h2>
		<p><?= get_field('percurso_titulo'); ?></p>
	</div>
	<div class="container-fluid px-0">
		<div class="row items">
			<?php
				$count = 0;
				while( have_rows('etapas') ): the_row(); 
				$count = $count + 1;
			?>
				<div class="item col-md-12">
					<div class="container">
						<a style="min-height: auto !important" class="jornada-toogle-button collapsed mx-auto mt-md-2" role="button" data-toggle="collapse" href="#etapa-<?php echo $count;?>" aria-expanded="false" aria-controls="etapa-<?php echo $count;?>">
							<img class="chevron" src="<?php echo get_template_directory_uri(); ?>/assets/img/chevron.png"/>
						</a>
						<div>
							<h3>Módulo <?php echo sprintf("%02d", $count);?></h3>
						</div>
						<div class="collapse" id="etapa-<?php echo $count;?>">
							<h6><?php the_sub_field('titulo');?></h6>
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
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>


<?php if( have_rows('depoimentos') ): ?>
<section class="single-depoimentos">
	<div class="container">
		<div class="header">
			<h2>O que dizem alunos Saibalá:</h2>
		</div>
		<div class="<?php if (count(get_field('depoimentos')) >= 3) { ?>owl-carousel<?php  } else { echo 'blocos__simples'; } ?>">
			<?php
				while( have_rows('depoimentos') ): the_row(); 
				$image = get_sub_field('image');
			?>
				<div class="single-depoimentos-item">
					<div class="bloco">
						<div class="image-section">
							<img src="<?php the_sub_field('foto');?>" />
							<h3><?php the_sub_field('nome');?></h3>
						</div>
						<div class="content">
							<p><?php the_sub_field('depoimento');?></p>
						</div>
					</div>
					<div class="after"></div>
				</div>
			<?php
				endwhile; 
				wp_reset_postdata();
			?>
		</div>
	</div>
</section>
<?php endif;?>

<?php if (get_field('ativar__bonus')): ?>
<section class="bonus">
	<div class="container">
		<h2><?= get_field('titulo__bonus'); ?></h2>
		<div class="row">
			<div class="col-md-5">
				<h3><?= get_field('introducao__bonus'); ?></h3>
				<?= get_field('descricao__bonus'); ?>
			</div>
			<div class="col-md-7">
				<img src="<?= get_field('imagem__bonus'); ?>" alt="<?= get_field('introducao__bonus'); ?>">
			</div>
		</div>
	</div>
</section>
<?php endif;?>

<section class="comprar">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php 
					if ($product->sale_price !== '') {
						$desconto = round($product->sale_price / $product->regular_price - 1,2)*-100;
						$parcela = round($product->sale_price /12,2);
					} else {
						$desconto = '100';
						$parcela = '0';
					}
				?>
				<div class="box__comprar">
					<div class="preco__de">
						<?php echo wc_price($product->get_regular_price(), array('decimals' => 2)); ?>
					</div>
					<div class="preco__parcelado">
						<p>12x de <?php echo wc_price($parcela, array('decimals' => 2)); ?></p>
					</div>
					<div class="preco__por">
						<span class="preco"><?php echo wc_price($product->get_sale_price(), array('decimals' => 2)); ?></span>
					</div>
					<a href="<?= $product->add_to_cart_url(); ?>" data-quantity="1" class="comprar__default">compre agora!</a>
				</div>
				<ul class="pagamento__list">
					<li><img src="<?= get_template_directory_uri(); ?>/assets/img/pagamento-pix.svg"></li>
					<li><img src="<?= get_template_directory_uri(); ?>/assets/img/pagamento-mastercard.svg"></li>
					<li><img src="<?= get_template_directory_uri(); ?>/assets/img/pagamento-visa.svg"></li>
					<li><img src="<?= get_template_directory_uri(); ?>/assets/img/pagamento-boleto.svg"></li>
				</ul>
			</div>
			<div class="col-md-6">
				<h2>Garanta já sua vaga</h2>
				<ul class="comprar__list">
					<li><span>Aprenda a criar produtos que vendem muito e  pare de gastar tempo, mão de obra e dinheiro em produtos que não dão retorno.</span></li>
					<li><span>Descubra por onde começar e o passo a passo para criar o seu produto ou serviço de sucesso.</span></li>
					<li><span>Transforme suas ideias em produtos ou serviços de destaque.</span></li>
					<li><span>Torne-se um expert em produtos.</span></li>
					<li><span>Caso não funcione para você, basta solicitar o reembolso dentro do prazo de garantia que <strong>devolvemos 100% do seu dinheiro.</strong></span></li>
				</ul>
			</div>
		</div>		
	</div>
</section>

<section class="single-saibala">
	<div class="container">
		<div class="header">
			<h2 class="sr-only">Saibalá</h2>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-black.png" alt="Logo Saibalá">
			<p>Novos tempos possibilitam novos caminhos e exigem um novo você.</p>
		</div>
		<ul class="content">
			<li class="item first-col">
				<div>
					<p class="heading">+1 milhão</p>
					<p class="text-1">alunos já passaram pelos nossos cursos</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/1.png" alt="icone-1" class="icon">
			</li>
			<li class="item second-col">
				<div>
					<p class="heading">89%</p>
					<p class="text-2">taxa de conclusão de cursos saibalá</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/2.png" alt="icone-2" class="icon">
			</li>
			<li class="spacer"></li>
			<li class="spacer"></li>
			<li class="item first-col">
				<div>
					<p class="heading">100%</p>
					<p class="text-3">dos professores são profissionais de renome no mercado</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/3.png" alt="icone-3" class="icon">
			</li>
			<li class="item second-col">
				<div>
					<p class="heading">95%</p>
					<p class="text-4">Dos alunos recomendam os cursos Saibalá</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/4.png" alt="icone-4" class="icon">
			</li>
			<li class="item first-col">
				<div>
					<p class="heading">+40</p>
					<p>empresas já contrataram  serviços in-company</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/5.png" alt="icone-5" class="icon">
			</li>
			<li class="item second-col">
				<div>
					<p class="heading">8 anos</p>
					<p class="text-6">produzindo cursos de alta qualidade</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/6.png" alt="icone-6" class="icon">
			</li>
			<li class="spacer"></li>
			<li class="spacer"></li>
			<li class="item first-col">
				<div>
					<p class="heading">+3.000</p>
					<p>cursos produzidos</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/7.png" alt="icone-7" class="icon">
			</li>
			<li class="item second-col">
				<div>
					<p class="heading">+40k horas</p>
					<p>de cursos produzidos</p>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icones/8.png" alt="icone-8" class="icon icon-8">
			</li>
		</ul>
	</div>
</section>

<?php

$args = array(  
	'post_type' => 'saibala_faq',
);

$loop = new WP_Query( $args ); 

?>

<section class="single-faq">
	<div class="container">
		<div class="contato">
			<h2>ainda tem dúvidas?</h2>
			<a href="mailto:contato@saibala.com.br">converse com a nossa equipe</a>
		</div>
	</div>
</section>

<?php }  ?>
