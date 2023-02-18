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
			<meta content="<?php echo get_bloginfo( 'description' ); ?>" name="description" />
			<!-- ================== BEGIN BASE CSS STYLE ================== -->
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,400&display=swap" rel="stylesheet">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/dist/fonts/vinila.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/wow/animate.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/plugins/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" />
			<link href="<?php echo get_template_directory_uri(); ?>/assets/dist/css/style.css?v=4.1" rel="stylesheet" />
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
		</head>
		<body <?php body_class(); ?>>
		<header>
			<div class="container-980">
				<div class="row justify-content-between">
					<div class="col-6 col-md-2 logo">
						<a class='px-3 p-2 btn-exp d-flex align-center' data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
							<i class='fal fa-bars mobile'></i>
						</a>
						<a href="<?php echo get_home_url();?>" class='logo'><img src="<?php echo get_template_directory_uri(); ?>/assets/img/new-home/logo-black.png"/></a>
					</div>

					<div class="col-md-6 text-right links d-lg-flex justify-content-center collapse" id="collapseExample">
						<?php
						wp_nav_menu( array( 
							'theme_location' => 'header-menu'
							) ); 
						?>
					</div>

					<div class="col-6 col-md-5 col-lg-4 d-flex d-lg-flex align-center justify-content-end">
						<a class='px-2 d-flex align-center button-cart-expansive mobile-d-none' href="#cart">	
							<span class="text-cart-expansive">
								<i class='fal fa-shopping-cart'></i>
								Carrinho
							</span>
						</a>
						<a class='px-2 py-1 btn-exp d-flex align-center btn-login' href="#myaccount">Entrar</a>
						<a class='px-2 align-center d-mobile-flex mt-2' href="#cart">	
							<i class='fal fa-shopping-cart'></i>
						</a>
						<a class='px-2 py-1 btn-exp d-flex align-center btn-black mobile-d-none' href="#login">Cadastre-se</a>
					</div>

				</div>
			</div>
		</header>
		
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

		
		<div class="box-expansivel box-myaccount" data-name='nav'>
			<div class='header'>
				<h3>Menu</h3>
				<button class='bclose'><i class='fal fa-times'></i></button>
			</div>
			<div class="scroll">
				
				<?php
				wp_nav_menu( array( 
					'theme_location' => 'header-menu'
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