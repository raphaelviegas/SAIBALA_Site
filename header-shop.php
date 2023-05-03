<?php

$args = (object) array_merge([
	'header_logo' => '/assets/img/new-home/logo-yellow.svg',
	'header_link_color' => '#ffff00',
], $args);

?>
<!DOCTYPE html>
<!--[if IE 8]> 
<html lang="pt" class="ie8">
	<![endif]-->
	<!--[if !IE]><!-->
	<html lang="pt">
		<!--<![endif]-->
		<head>
			<meta charset="utf-8" />
			<title><?php echo get_bloginfo( 'name' );?></title>
			<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
			<meta content="A Saibalá é uma comunidade de criativos, um espaço coletivo, um ecossistema pra aprender fazendo, sempre com os melhores ;)" name="description" />
			<!-- ================== BEGIN BASE CSS STYLE ================== -->
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,400&display=swap" rel="stylesheet">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/wow/animate.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fonts/vinila.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/dist/css/style.css" rel="stylesheet" />
			<!-- ================== END BASE CSS STYLE ================== -->

			<!-- ================== FAVICON END ================== -->
			<?php wp_head();?>
			<script type="text/javascript">
			    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			    var themeurl = "<?php echo get_template_directory_uri(); ?>";
			</script>

			<!-- ================== OGIMAGE ================== -->
			<?php if (has_post_thumbnail($post->ID)): ?>
				<meta property="og:image" content="<?= get_the_post_thumbnail_url($post->ID, 'full'); ?>"/>
			<?php endif; ?>

			<?php if (!has_post_thumbnail($post->ID)): ?>
				<meta property="og:image" content="<?= get_template_directory_uri(); ?>/assets/img/og-image.jpg"/>
			<?php endif; ?>

			<style>
				/* section-header */
				.section-header {
					width: 100%;
					position: absolute;
					top: 0;
					background: none;
					color: #ffff00;
					padding: 10px;
					z-index: 99;
				}

				.section-header-menu {
					list-style-type: none;
					padding: 0;
					margin: 0;
					display: flex;
				}

				.section-header-menu > li > a {
					display: block;
					padding: 10px 10px;
					color: <?php echo $args->header_link_color; ?>;
					font-size: 20px ;
					font-weight: 100;
				}
			</style>
		</head>
		<body <?php body_class(); ?>>

		<header class="section-header">
			<div class="container-980 d-flex align-items-center" style="gap:15px;">
				<div>
					<a href="<?php echo get_home_url();?>" class='logo'>
						<img src="<?php echo get_template_directory_uri() . $args->header_logo; ?>" width="100" />
					</a>
				</div>
				<div class="flex-grow-1"></div>
				<div class="d-none d-lg-block">
					<div class="menu-header-container">
						<ul class="section-header-menu">
							<?php wp_nav_menu([
								'theme_location' => 'header-menu',
								'items_wrap' => '%3$s',
								'container' => false,
							]); ?>

							<?php if (is_user_logged_in()): ?>
								<li>
									<a href="<?php echo site_url('/minha-conta'); ?>" style="white-space:nowrap;">
										Meus cursos
									</a>
								</li>
								<li>
									<a href="<?php echo wp_logout_url(site_url()); ?>">
										Sair
									</a>
								</li>

							<?php else: ?>
								<li>
									<a href="javascript:;" onclick="saibalaLoginModal.show();">
										Entrar
									</a>
								</li>
								<!-- <li>
									<a href="https://saibala.com.br/carrinho/">	
										<i class='fal fa-shopping-cart'></i>
									</a>
								</li> -->
								<li>
									<a href="javascript:;" onclick="saibalaCadastroModal.show()">
										Cadastre-se
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="d-lg-none">
					<a href="#box-menu" style="color: <?php echo $args->header_link_color; ?>;" class="btn-exp">
						<i class="fal fa-bars"></i>
					</a>
				</div>
			</div>
		</header>

		<div class="box-expansivel box-menu" data-name="box-menu">
			<div class='header'>
				<h3>Menu</h3>
				<button class='bclose'><i class='fal fa-times'></i></button>
			</div>
			<div class="scroll">
				<?php wp_nav_menu([
					'theme_location' => 'header-menu',
					'items_wrap' => '<ul class="%2$s">%3$s</ul>',
					'menu_class' => 'section-header-menu-overlay-menu',
				]); ?>

				<div class="menu-header-container">
					<ul class="section-header-menu-overlay-menu">
						<?php if (is_user_logged_in()): ?>
							<li>
								<a href="<?php echo site_url('/minha-conta'); ?>" style="white-space:nowrap;">
									Meus cursos
								</a>
							</li>
							<li>
								<a href="<?php echo wp_logout_url(site_url()); ?>">
									Sair
								</a>
							</li>

						<?php else: ?>
							<li>
								<a href="javascript:;" onclick="saibalaLoginModal.show();">
									Entrar
								</a>
							</li>
							<!-- <li>
								<a href="https://saibala.com.br/carrinho/">	
									<i class='fal fa-shopping-cart'></i>
								</a>
							</li> -->
							<li>
								<a href="javascript:;" onclick="saibalaCadastroModal.show()">
									Cadastre-se
								</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="box-expansivel box-myaccount" data-name='myaccount'>
			<div class='header'>
				<h3>Minha Conta</h3>
				<button class='bclose'><i class='fal fa-times'></i></button>
			</div>
			<div class="scroll">
				
				<?php
				wp_nav_menu( array( 
					'theme_location' => 'user-menu'
					) ); 
				?>
			</div>			
		</div>

		<div class="box-expansivel box-login" data-name='login'>
			<div class='header'>
				<h3>Área do Cliente</h3>
				<button class='bclose'><i class='fal fa-times'></i></button>
			</div>
			<div class="scroll">
				<div class="login">
					<?php woocommerce_login_form( );?>
				</div>
			</div>
		</div>

		<div class="box-expansivel" data-name='cart'>
			<div class='header'>
				<h3>Carrinho</h3>
				<button class='bclose'><i class='fal fa-times'></i></button>
			</div>
			<div class="scroll">
				<div class="minicartheader">
					<?php woocommerce_mini_cart(); ?>		
				</div>
			</div>
		</div>

		<div class="box-expansivel box-search" data-name='search'>
			<div class='header'>
				<h3>Busca</h3>
				<button class='bclose'><i class='fal fa-times'></i></button>
			</div>
			<div class="scroll">
				<form action="<?php echo get_home_url();?>">
					<div class="align">
						<div class='row'>
							<div class='col-md-12'>
								<input type="text" name='s' class='form-control' placeholder="Procure aqui" />
								<input type="hidden" name='post_type' class='form-control' value="product" />
							</div>
							<div class='col-md-12'>
								<button class="btn btn-warning">Pesquisar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		<?php get_template_part('template-parts/cadastro'); ?>
		<?php get_template_part('template-parts/login'); ?>