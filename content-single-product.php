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
$headerId = intval($_GET['header']);
if ($headerId) {
	headers($headerId);
}


if(get_field('layout') == 'v2') { ?>

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


<section class="intro__curso">
	<?php the_post_thumbnail('full',['class'=>'background']); ?>
	<div class="container">
		<h1><span><span><?php if (get_field('aprender_titulo')) { echo get_field('aprender_titulo'); } else { echo get_the_title(); } ?></span></span></h1>
		<p><?php the_field('subtitulo') ?></p>
		<?php if(get_field('vimeo_video_id')){ ?>
			<a data-fslightbox="lightbox" href="#vimeo" class="lightbox-trigger cta__video">Assista o trailer</a>
			<div class="d-none">
				<iframe src="https://player.vimeo.com/video/<?php the_field('vimeo_video_id'); ?>" id="vimeo" width="1920px" height="1080px" frameBorder="0" allow="autoplay; fullscreen" allowFullScreen></iframe>
			</div>	
		<?php } ?>
		<a href="<?= $product->add_to_cart_url(); ?>" data-quantity="1" class="comprar__default">compre agora!</a>
	</div>
</section>


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


<section class="oque__aprender">
	<div class="container">
		<div class="row principal">
			<div class="col-md-4 left__aprender">
				<h2><?php the_field('o-que-aprender-destaque')?></h2>
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

<!--
<section class="single-beneficios">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2><?php the_field('beneficio-destaque')?></h2>
				<p><?php the_field('beneficios-conteudo')?></p>
			</div>
			<div class="col-md-5 offset-md-1 content-box">
				<div class="row">
					<?php if( have_rows('sub-beneficios') ): ?>
						<?php while( have_rows('sub-beneficios') ): the_row(); ?>
							<div class="col-md-12 content">
								<h3><?php the_sub_field('sub-beneficio-titulo');?></h3>
								<p><?php the_sub_field('sub-beneficio-conteudo');?></p>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
-->

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
		<p class="intro">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page </p>
		<div class="<?php if (count(get_field('professor')) >= 3) { ?>owl-carousel<?php  } else { echo 'blocos__simples'; } ?>">
			<?php foreach ($ids as $id): ?>
				<div class="single-professores-item">
					<div class="image-section">
						<img src="<?php echo get_the_post_thumbnail_url( $id,'large');?>" />
						<h3><?= get_the_title($id);?></h3>
						<div class="overlay"></div>
					</div>
					
					<div class="content">
						<?php
							echo get_post_field('post_content', $id);
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

<section class="empresas">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2>empresas que<br> os especialistas<br> já atuaram:</h2>
			</div>
			<div class="col-md-8 empresas__logos">
				<div class="row">
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/google.svg" alt="Saibalá">
					</div>
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/vivo.svg" alt="Saibalá">
					</div>
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ibm.svg" alt="Saibalá">
					</div>
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.svg" alt="Saibalá">
					</div>
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/inter.svg" alt="Saibalá">
					</div>
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/magalu.svg" alt="Saibalá">
					</div>
				</div>
			</div>
		</div>
		<a href="<?= $product->add_to_cart_url(); ?>" data-quantity="1" class="comprar__default">compre agora!</a>
	</div>
</section>

<section class="single-para-quem">
	<div class="container">
		<h2>Para quem <br>funciona?</h2>
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

<!--
<section class="single-certificado">
	<div class="container">
		<div class="row align-items-md-center">
			<div class="col-md-2 icon-wrapper">
				<div class="icon-box">
					<svg xmlns="http://www.w3.org/2000/svg" width="75.503" height="97.88" viewBox="0 0 75.503 97.88">
						<g data-name="Grupo 64">
								<g data-name="Grupo 63" style="clip-path:url(#a8nvqminea)">
										<path data-name="Caminho 50" d="M39.474 0c.691.208 1.393.384 2.07.63a11.227 11.227 0 0 1 6.712 6.128c.8 1.787 1.866 3.374 3.873 3.767a10 10 0 0 0 3.839-.092c4.8-.991 8.83.308 11.841 4.1a10.968 10.968 0 0 1 1.283 12.281c-.856 1.789-1.36 3.543-.6 5.492a7.6 7.6 0 0 0 2.655 3.057 11.236 11.236 0 0 1 4.353 9.33 11.561 11.561 0 0 1-8.86 10.968 12 12 0 0 0-3.422 1.326 4.756 4.756 0 0 0-2.192 3.935 65.044 65.044 0 0 0-.172 3.717 2.767 2.767 0 0 0 .331 1.162c2.93 6.1 5.889 12.193 8.8 18.308a4.788 4.788 0 0 1 .555 2.356 2.935 2.935 0 0 1-3.778 2.5c-3.392-.826-6.773-1.693-10.246-2.566-.441.953-.882 1.894-1.313 2.841-.974 2.14-1.958 4.277-2.91 6.427a3.131 3.131 0 0 1-2.941 2.19 3.179 3.179 0 0 1-2.978-2.157q-4.106-8.553-8.235-17.1c-.151-.314-.31-.623-.535-1.072-.232.452-.428.8-.591 1.155q-3.75 8.3-7.494 16.6c-.144.318-.282.642-.455.943a2.986 2.986 0 0 1-5.341.017c-.675-1.186-1.217-2.447-1.814-3.678-.955-1.972-1.9-3.946-2.889-5.987-2.9.8-5.769 1.6-8.641 2.389a12.87 12.87 0 0 1-2.223.5 2.926 2.926 0 0 1-3.092-3.8 9 9 0 0 1 .436-1.155c2.894-6.4 6.054-12.695 8.592-19.233 1.491-3.837.494-8.572-4.573-9.486a11.344 11.344 0 0 1-7.649-5.072 11.584 11.584 0 0 1 2.343-15.24q.561-.446 1.114-.9a5.434 5.434 0 0 0 1.537-6.708 13.379 13.379 0 0 1-1.619-7.434 11.593 11.593 0 0 1 14.106-10.03 7.482 7.482 0 0 0 3.949.2A5.805 5.805 0 0 0 27.076 7.1a11.1 11.1 0 0 1 5.408-5.814A33.7 33.7 0 0 1 36.034 0zM20.549 61.555v.955a5.443 5.443 0 0 0 6.455 5.514 7.642 7.642 0 0 0 3.149-1.619 11.811 11.811 0 0 1 9.915-2.551 12.977 12.977 0 0 1 5.854 3.046 5.493 5.493 0 0 0 8.71-2.509 9.45 9.45 0 0 0 .3-2.82 11.467 11.467 0 0 1 4.483-9.371 14.335 14.335 0 0 1 6.014-2.5 5.482 5.482 0 0 0 3.956-6.32 6.443 6.443 0 0 0-2.785-3.932 11.3 11.3 0 0 1-4.569-9.227 12.845 12.845 0 0 1 1.627-6.006 5.3 5.3 0 0 0-1.205-6.6c-1.689-1.613-3.639-1.576-5.788-1.177a14.844 14.844 0 0 1-4.994.206 11.3 11.3 0 0 1-8.681-6.857 7.275 7.275 0 0 0-1.949-2.632c-2.985-2.3-6.9-1.02-8.591 2.69a11.609 11.609 0 0 1-13.7 6.65 7.661 7.661 0 0 0-3.461-.1c-3.591.9-5.025 4.7-3.245 8.247a11.574 11.574 0 0 1-3.41 15.056 8.484 8.484 0 0 0-1.675 1.671 5.61 5.61 0 0 0 3.841 8.558 11.389 11.389 0 0 1 9.753 11.628m5.743 26.158L33.6 71.55c-5.355 3.728-10.419 3.464-15.433-.357l-4.813 10.661c2.123-.587 4.033-1.136 5.957-1.638a5.077 5.077 0 0 1 1.679-.208 3.115 3.115 0 0 1 2.564 2.024c.871 1.822 1.754 3.64 2.738 5.681m22.957 0c.947-2.083 1.782-3.966 2.658-5.829a3.145 3.145 0 0 1 3.981-1.892c.554.136 1.1.294 1.658.432 1.429.355 2.862.7 4.487 1.1l-4.89-10.15c-5.353 3.866-10.566 3.833-15.829-.123l7.935 16.458" style="fill:#1a1818"/>
										<path data-name="Caminho 51" d="M35.48 13.463A22.537 22.537 0 1 1 12.9 35.978a22.621 22.621 0 0 1 22.58-22.515m-.018 6.078A16.46 16.46 0 1 0 51.9 35.993a16.434 16.434 0 0 0-16.438-16.452" transform="translate(2.313 2.414)" style="fill:#1a1818"/>
										<path data-name="Caminho 52" d="M31.043 33.895c2.676-1.953 5.3-3.9 7.968-5.787a4.758 4.758 0 0 1 2.058-.851 2.763 2.763 0 0 1 2.939 1.809 2.872 2.872 0 0 1-.8 3.377c-.946.8-1.974 1.5-2.974 2.229q-3.847 2.816-7.7 5.622c-1.96 1.42-3.591 1.149-4.971-.807-.935-1.323-1.874-2.645-2.789-3.982a3.035 3.035 0 0 1 .585-4.453c1.458-1.015 3.2-.618 4.38 1 .429.59.843 1.189 1.3 1.838" transform="translate(4.316 4.882)" style="fill:#1a1818"/>
								</g>
						</g>
				</svg>
				</div>
			</div>
			<div class="col-md-10 px-0">
				<h2>certificado da saibalá</h2>
				<p>Ao concluir o curso você ainda recebe um certificado digital para poder compartilhar em seu Linkedin, fazer novas conexões e networking, e mostrar suas habilidades para o mercado com o certificado Saibalá.</p>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/certificado.png" alt="Certificado Saibalá">
			</div>
		</div>
	</div>
</section>
-->

<section class="single-programa-completo">
	<div class="container">
		<h2>Confira o programa completo</h2>
		<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
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

<?php if( have_rows('depoimentos') ): ?>
<section class="single-depoimentos">
	<div class="container">
		<div class="header">
			<h2>Quem passou pela Saibalá:</h2>
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
				$projetos = null; 
				$projetos = $temp; 
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
