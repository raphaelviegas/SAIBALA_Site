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
if ($product->sale_price !== '') {
$desconto = round($product->sale_price / $product->regular_price - 1,2)*-100;
$parcela = round($product->sale_price /12,2);
} else {
	$desconto = '100';
	$parcela = '0';
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

<section class="single-header">
	<div class="container">
		<div class="content">
			<h1><?php the_title() ?></h1>
			<p><?php the_field('subtitulo') ?></p>
			<?php 
			if(get_field('vimeo_video_id')){ ?>
			<a data-fslightbox="lightbox" href="#vimeo" class="lightbox-trigger d-md-none">Assista o video</a>
			<div class="d-none">
				<iframe
					src="https://player.vimeo.com/video/<?php the_field('vimeo_video_id'); ?>"
					id="vimeo"
					width="1920px"
					height="1080px"
					frameBorder="0"
					allow="autoplay; fullscreen"
					allowFullScreen>
				</iframe>
			</div>	
			<?php } ?>
		</div>
		<div class="hero-block">
			<span class="overlay d-md-none"></span>
			<?php
			the_post_thumbnail('full',['class'=>'w-100']);
			if(get_field('vimeo_video_id')){ ?>
				<a data-fslightbox="lightbox" href="#vimeo" class="lightbox-trigger d-none d-md-block">Assista o video</a>
			<?php }
			/*
			if(get_field('video')){
				the_field('video');
				the_post_thumbnail('full',['class'=>'d-md-none w-100']);
			} else { 
				if (get_field('hero_imagem')) { ?>
					<img src="<?php the_field('hero_imagem');?>" class='w-100'/>
				<?php } else {
					the_post_thumbnail('full',['class'=>'w-100']);
				}
			} 
			*/
			?>
		</div>
	</div>
</section>

<section class="single-um-jeito-de-aprender">
	<div class="container">
		<h2>jeito saibalá de aprender:</h2>
		<div class="row mx-md-0">
			<div class="col-md-3 content">
				<h3>qualidade de cinema</h3>
				<p>Utilizamos as melhores ferramentas de audiovisual para você aprender em qualidade de cinema. Assista ao nosso trailer!</p>
			</div>
			<div class="col-md-3 content">
				<h3>professores de peso</h3>
				<p>Aprenda com quem faz. Reunimos alguns dos profissionais mais renomados no mercado que você só encontra aqui na Saibalá!</p>
			</div>
			<div class="col-md-3 content">
				<h3>acesso vitalício</h3>
				<p>Você terá acesso vitalício a todas as aulas do programa para consultar e reassistir sempre que quiser!</p>
			</div>
			<div class="col-md-3 content">
				<h3>aprenda no seu ritmo</h3>
				<p>Todas as aulas são online e gravadas para você mergulhar nos conteúdos de onde quiser e quando quiser!</p>
			</div>
		</div>
	</div>
</section>

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
	<div class="container <?php if(count($ids) > 1) { ?>jornada<?php } ?>">
		<h2>aprenda com <br>grandes nomes</h2>
		<?php if(count($ids) > 1) { ?>
			<div class="owl-carousel">
				<?php
					$args = array(
						'post_type'  => 'professores', 
						'showposts'=> -1,
						'post__in'			=> $ids,
					);
					$projetos = new WP_Query($args);
					while ($projetos->have_posts()) : $projetos->the_post();
				?>
					<div class="single-professores-item">
						<div class="image-section">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large');?>" />
							<div class="overlay"></div>
						</div>
						<h3>
							<?php the_title();?>
						</h3>
						<div class="content">
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
			<?php } else {?>
				<?php
					$args = array(
						'post_type'  => 'professores', 
						'showposts'=> -1,
						'post__in'			=> $ids,
					);
					$projetos = new WP_Query($args);
					while ($projetos->have_posts()) : $projetos->the_post();
				?>
					<div class="single-professores-item">
						<div class="image-section">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_id(),'large');?>" />
							<div class="overlay"></div>
						</div>
						<div class="content-box">
							<h3>
								<?php the_title();?>
							</h3>
							<div class="content">
								<?php the_content();?>
							</div>
						</div>
					</div>
				<?php
					endwhile; 
					$projetos = null; 
					$projetos = $temp; 
					wp_reset_postdata();
				?>
			<?php } ?>
	</div>
</section>
<?php
}?>

<section class="single-para-quem">
	<div class="container">
		<h2>para quem este programa é indicado</h2>
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

<section class="single-o-que-aprender">
	<div class="container">
		<div class="row">
			<div class="col-md-4 main">
				<h2><?php the_field('o-que-aprender-destaque')?></h2>
				<!-- <p><?php the_field('o-que-aprender-conteudo')?></p> -->
			</div>
			<div class="col-md-7 offset-md-1">
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
	</div>
</section>

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

<section class="single-programa-completo">
	<div class="container">
		<h2>confira o programa completo</h2>
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
											<a class="jornada-toogle-button collapsed" role="button" data-toggle="collapse" href="#etapa-<?php echo $count;?>" aria-expanded="false" aria-controls="etapa-<?php echo $count;?>">
												<div>
													<h3>episódio <?php echo sprintf("%02d", $count);?></h3>
													<p><?php the_sub_field('titulo');?></p>
												</div>
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
											<a style="min-height: auto !important" class="jornada-toogle-button collapsed mx-auto mt-md-2" role="button" data-toggle="collapse" href="#etapa-<?php echo $count;?>" aria-expanded="false" aria-controls="etapa-<?php echo $count;?>">
										</div>
											<img class="chevron" src="<?php echo get_template_directory_uri(); ?>/assets/img/chevron.png"/>
										</a>
									</div>
						<?php	endwhile; ?>
		</div>
	</div>
</section>

<?php if( have_rows('depoimentos') ): ?>
<section class="single-depoimentos">
	<div class="container">
		<div class="header">
			<h2>o que pessoas como você estão falando</h2>
			<!-- <p>Lorem ipsum dolor sit amet, Duis consectetur adipiscing elit. Duis at facilisis lectus. Sed rhoncus, tellus non laciniasollicitudin Lorem ipsum dolor sit amet, consectetur</p> -->
		</div>
		<div class="owl-carousel">
			<?php
				while( have_rows('depoimentos') ): the_row(); 
				$image = get_sub_field('image');
			?>
				<div class="single-depoimentos-item">
					<div class="image-section">
						<img src="<?php the_sub_field('foto');?>" />
						<div class="overlay"></div>
					</div>
					<h3>
					<?php the_sub_field('nome');?>
					</h3>
					<div class="content">
						<p><?php the_sub_field('depoimento');?></p>
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
<?php endif;?>

<section class="single-investimento">
	<div class="container">
		<div class="content-grid">
			<div class="acesso-vitalicio">
				<div class="header">
					<h2>Acesso vitalício</h2>
					<svg class="icon" id="Grupo_95" data-name="Grupo 95" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 0 160.264 160.264">
						<defs>
							<clipPath id="clip-path">
								<rect id="Retângulo_56" data-name="Retângulo 56" width="160.264" height="160.264" fill="#010101"/>
							</clipPath>
						</defs>
						<g id="Grupo_94" data-name="Grupo 94" clip-path="url(#clip-path)">
							<path id="Caminho_75" data-name="Caminho 75" d="M159.943,84.97c-.409,2.979-.745,5.97-1.252,8.933-.394,2.3-.936,4.583-1.529,6.842-1.037,3.948-4.088,5.837-7.712,4.874s-5.375-4.172-4.311-8.058a64.425,64.425,0,0,0,2.353-19.288,66.767,66.767,0,0,0-15.537-40.958C121.191,24.157,107.464,15.7,90.562,13.271,59.907,8.864,29.978,23.53,17.816,54.754c-7.5,19.245-6.973,38.4,2.44,56.96C27.129,125.269,38,134.743,51.633,141.182c.987.466,2.008.866,2.963,1.39a6.081,6.081,0,0,1,3.092,6.307,5.993,5.993,0,0,1-4.911,5.184,5.033,5.033,0,0,1-2.4-.252C35.079,148.466,23.25,138.643,14.19,125.4A79.57,79.57,0,0,1,.272,86.642,11.877,11.877,0,0,0,0,85.282V74.973c.091-.553.2-1.1.271-1.658.364-2.834.578-5.7,1.1-8.5C7.777,30.185,35.74,6.656,66.981,1.255,70.042.725,73.141.413,76.223,0h9.372c2.925.4,5.865.713,8.772,1.216,32.5,5.613,59.114,32.513,64.334,65,.484,3.011.832,6.044,1.243,9.067Z" fill="#010101"/>
							<path id="Caminho_76" data-name="Caminho 76" d="M179.571,319.092c-1.3-.313-2.618-.58-3.907-.946a23.115,23.115,0,0,1,9.548-45.111c7.007.926,12.751,4.186,17.766,8.976.974.931,1.993,1.816,2.877,2.62a99.167,99.167,0,0,1,7.81-6.556c7.708-5.293,16.089-7.089,24.957-3.3,7.731,3.307,12.271,9.356,13.754,17.661a10.582,10.582,0,0,0,.293,1.036v5a6.827,6.827,0,0,0-.279.866c-1.811,9.806-7.528,16.1-17.049,18.971-1.077.324-2.192.523-3.29.781h-5.311c-.081-.062-.156-.17-.243-.181-8.18-1.006-14.547-5.247-19.975-11.172a8.072,8.072,0,0,0-.8-.673c-.721.754-1.358,1.439-2.016,2.1a32.154,32.154,0,0,1-13.99,8.768c-1.689.486-3.434.775-5.154,1.154Zm2.771-12.472c.587-.074,1.26-.132,1.922-.247,6.188-1.077,10.276-5.1,13.8-9.9a1.157,1.157,0,0,0-.021-1.073c-3.553-4.847-7.714-8.9-13.97-9.895a10.3,10.3,0,0,0-10.551,4.232,9.934,9.934,0,0,0-.871,11.024c1.983,3.863,5.321,5.666,9.694,5.855m47.189-21.231c-.416,0-.833-.024-1.247.007a9.3,9.3,0,0,0-1.075.178c-6.092,1.188-10.123,5.221-13.637,9.939a1.15,1.15,0,0,0,.037,1.067c3.61,4.884,7.836,8.909,14.172,9.89a10.762,10.762,0,0,0,12.358-9.71,10.624,10.624,0,0,0-10.607-11.372" transform="translate(-92.726 -159.149)" fill="#010101"/>
							<path id="Caminho_77" data-name="Caminho 77" d="M154.893,96.23c0,5.831-.026,11.662.034,17.493a3.55,3.55,0,0,0,.769,2.041,9.5,9.5,0,0,1-6.464,15.624,3.563,3.563,0,0,0-1.986.906c-6.221,6.147-12.377,12.361-18.588,18.519-3.151,3.125-7.711,2.718-9.924-.808-1.682-2.68-1.288-5.629,1.15-8.078Q128.923,132.85,138,123.82a5.117,5.117,0,0,0,1.4-2.772,32.427,32.427,0,0,1,2.09-5.11,7.256,7.256,0,0,0,.87-2.483c.057-11.61.021-23.22.046-34.83.01-4.679,3.884-7.6,8.208-6.267a6.114,6.114,0,0,1,4.269,6.223c.027,5.883.008,11.766.008,17.649Z" transform="translate(-68.682 -42.03)" fill="#010101"/>
						</g>
						</svg>

				</div>
				<p>Você terá acesso vitalício a todas as aulas do programa para consultar e reassistir sempre que quiser!</p>
			</div>
			<div class="conteudo">
				<div class="header">
					<h2>investimento</h2>
					<p class="subtitle"><?php echo $desconto?><span>% de desconto</span></p>
				</div>
				<div class="parcelado">
					<p>12x de</p>
					<span class="preco"><?php echo wc_price($parcela, array('decimals' => 2)); ?></span>
					<p>sem juros</p>
				</div>
				<div class="precos">
					<p>preço com desconto</p>
					<span class="preco"><?php echo wc_price($product->get_sale_price(), array('decimals' => 2)); ?></span>
					<p>preço original</p>
					<span class="preco original"><?php echo wc_price($product->get_regular_price(), array('decimals' => 2)); ?></span>
					<div class="btn-floating">
						<?php
							echo apply_filters(
								'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
								sprintf(
									'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
									esc_url( $product->add_to_cart_url() ),
									esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
									esc_attr( isset( $args['class'] ) ? $args['class'] : '' ),
									isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
									esc_html( 'Faça sua inscrição' )
								),
								$product,
								$args
							);
						?>
					</div>
				</div>
				<?php
					echo apply_filters(
						'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
						sprintf(
							'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
							esc_url( $product->add_to_cart_url() ),
							esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
							esc_attr( isset( $args['class'] ) ? $args['class'] : 'btn btn-cta' ),
							isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
							esc_html( 'Clique e faça sua inscrição' )
						),
						$product,
						$args
					);
				?>
				<div class="contato">
					<p>Precisa de ajuda?</p>
					<a href="https://api.whatsapp.com/send/?phone=5511933938974&text&type=phone_number&app_absent=0" class="btn btn-whatsapp" aria-label="whatsapp">
						<svg id="Grupo_194" data-name="Grupo 194" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.555 55.542">
							<path id="Caminho_108" data-name="Caminho 108" d="M377.514,358.725V362.2a4.861,4.861,0,0,0-.1.527,26.508,26.508,0,0,1-2.251,8.877,27.845,27.845,0,0,1-38.125,13.264,1.315,1.315,0,0,0-.854-.1q-4.905,1.242-9.8,2.533c-1.408.37-2.808.771-4.212,1.157h-.217c1.265-4.594,2.535-9.187,3.78-13.787a1.334,1.334,0,0,0-.1-.9,27.422,27.422,0,0,1-3.375-15.128,25.855,25.855,0,0,1,7.212-16.823,27.542,27.542,0,0,1,24.316-8.653,25.947,25.947,0,0,1,16.132,8.3,27.246,27.246,0,0,1,7.179,14.256C377.27,356.721,377.378,357.726,377.514,358.725ZM328.646,381.78c.238-.048.394-.071.546-.111,2.533-.657,5.068-1.308,7.6-1.982a1.183,1.183,0,0,1,1,.155,23.016,23.016,0,0,0,34.689-23.8,23.016,23.016,0,0,0-45.607,4.063,22.489,22.489,0,0,0,3.812,12.844.992.992,0,0,1,.147.9c-.5,1.753-.984,3.511-1.469,5.269C329.127,379.984,328.9,380.849,328.646,381.78Z" transform="translate(-321.96 -332.92)" fill="#fff"/>
							<path id="Caminho_109" data-name="Caminho 109" d="M472.135,495.922a12.812,12.812,0,0,1-1.982-.264,26.872,26.872,0,0,1-9.862-4.8,41.433,41.433,0,0,1-5.961-6.352,18.319,18.319,0,0,1-2.888-4.873,8.014,8.014,0,0,1,1.808-8.861,2.356,2.356,0,0,1,1.668-.8c.63-.026,1.264-.017,1.895.014a1.176,1.176,0,0,1,.982.833c.359.788.681,1.593,1.017,2.391.441,1.048.871,2.1,1.325,3.143a1.239,1.239,0,0,1-.081,1.287c-.522.734-1.058,1.46-1.623,2.162-.594.737-.627.931-.146,1.73a18.756,18.756,0,0,0,9.229,7.959c.832.336,1.133.281,1.7-.4.656-.794,1.306-1.593,1.943-2.4.454-.577.707-.707,1.393-.459.745.269,1.463.612,2.191.927,1.114.482,2.231.957,3.338,1.457.783.353.854.542.845,1.381-.042,3.7-2.935,5.334-5.648,5.805a10.484,10.484,0,0,1-1.135.077Z" transform="translate(-436.983 -455.249)" fill="#fff"/>
						</svg>
					</a>
				</div>
			</div>
			<div class="garantia">
				<div class="header">
					<h2><span>Garantia de </span> 7 dias</h2>
					<svg class="icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 157 157">
  						<image id="warranty" width="157" height="157" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAYAAAD0eNT6AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAOxAAADsQBlSsOGwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAB7XSURBVHic7d19sG13fdfxz7n35iY3JIFEAgnPLQ+FQqwCglJrGKnloQRpbVBEsHUssVXU/lG0dqwFaWX0D8VOocw4qG2lgnTQACLP8iDSDkUKllJA5SE8hibBkNyEm3uvf6y7TXI5D3ufs9b6rrV+r9fMb+CPzFm/tc+55/s+a++99lZYgqNJ3pDkquqNAJNyNMmJ6k0wTYeqN8CBGf4AbEwAzJvhD8C+CID5MvwB2DcBME+GPwAHIgDmx/AH4MAEwLwY/gD0QgDMh+EPQG8EwDwY/gD0SgBMn+EPQO8EwLQZ/gAMQgBMl+EPwGAEwDQZ/gAMSgBMj+EPwOAEwLQY/gCMQgBMh+EPwGgEwDQY/gCMSgDUM/wBGJ0AqGX4A1BCANQx/AEoIwBqGP4AlBIA4zP8ASgnAMZl+AMwCQJgPIY/AJMhAMZh+AMwKQJgeIY/AJMjAIZl+AMwSQJgOIY/AJMlAIZh+AMwaQKgf4Y/ADTmaJJrk5yewfrNJOfscT7nFO3txB77grk5kZp/S3v9Gwd6sLThnwgA6IsAgIVa4vBPBAD0RQDAAi11+CcCAPoiAGBhljz8EwEAfREAsCBLH/6JAIC+CABYiBaGfyIAoC8CABagleGfCADoiwCAmWtp+CcCAPoiAGDGWhv+iQCAvggAmKkWh38iAKAvAgBmqNXhnwgA6IsAgJlpefgnAgD6IgBgRlof/okAgL4IAJgJw78jAKAfAgBmwPC/kwCAfggAmDjD/+4EAPRDAMCEGf7fTgBAPwQATJThvz0BAP0QADBBhv/OBAD0QwDAxBj+uxMA0A8BABNi+O9NAEA/BABMhOG/HgEA/RAAMAGG//oEAPRDAEAxw38zAgD6IQCgkOG/OQEA/RAAUMTw3x8BAP0QAFDA8N8/AQD9EAAwMsP/YAQA9EMAwIgM/4MTANAPAcDkbFVvYCBHk7whyVXVG2Ff7kjNL65DER9Ld06SUwXHPZHkSMFxj8bPNDuo+IEcmuHPfm2liwCWa6l/9MDGlvbLzvAHgDUsKQAMfwBY01ICwPAHgA0sIQAMfwDY0NwDwPAHgH2YcwAY/gCwT3N9G+ChJG9M8ozqjQDAHM31PbHHktxavQkGU3UjoMNnjs1yHUlysuC4bgTE5Mz5KQAAYJ8EAAA0SAAAQIMEAAA0SAAAQIMEAAA0SAAAQIMEAAA0SAAAQIMEAAA0SAAAQIMEAAA0SAAAQIMEAAA0SAAAQIMEAAA0SAAAQIMEAAA0SAAAQIMEAAA06Ej1BmbmtiTHqjfBYE4mOad6EwzqZPUGYCoEANzdHdUbABiDpwAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEECAAAaJAAAoEFHqjfAWo4muaV6E7AA5yY5Vb0JmAIBMA9b8b2CPmxVbwCmwlMAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADRIAANAgAQAADTpSvQEm7Y4kF1RvgkW6rXoD0DoBwF5ur94AAP3zFAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDjlRvgEk7kuS26k0A0D8BwF7Ord4AAP3zFAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDBAAANEgAAECDjlRvgLXcnuT86k3AApys3gBMhQCYj+PVGwBgOTwFAAANEgAA0CABAAANEgAA0CABAAANEgAA0CABAAANEgAA0CABAAANEgAA0CABAAANEgAA0CABAAANEgAA0CABAAANEgAA0CABAAANEgAA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"/>
					</svg>

				</div>
				<p>Tiramos todo o risco para você testar! Se depois de fechar a compra, você sentir que o programa <?php the_title() ?> não é para você, basta solicitar o reembolso do valor investido dentro do prazo de garantia e vamos devolver 100% do seu dinheiro.</p>
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
		<?php if($loop->have_posts()) {?>
			<h2>perguntas<br>frequentes</h2>
			<div class="row items">
				<?php
					$count = 0;
					while ( $loop->have_posts() ) : $loop->the_post(); 
					$count = $count + 1;
						?>
							<div class="item col-md-12">
								<a class="faq-toogle-button collapsed" role="button" data-toggle="collapse" href="#faq-<?php echo $count;?>" aria-expanded="false" aria-controls="faq-<?php echo $count;?>">
									<div>
										<p><?php the_title();?></p>
									</div>
								</a>
								<div class="collapse" id="faq-<?php echo $count;?>">
									<div class="content">
										<?php the_content()?>
									</div>
								</div>
							</div>
				<?php	endwhile; ?>
			</div>
		<?php }?>
		<div class="contato">
			<h2>Ainda tem dúvidas?</h2>
			<p>entre em contato com a nossa equipe pelo email:</p>
			<a href="mailto:contato@saibala.com.br">contato@saibala.com.br</a>
		</div>
	</div>
</section>

<?php } else { ?>
<!-- Estrutura Antiga -->
<div>

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

</div>
<?php } ?>