<?php
get_header();
?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="product-detail" id="single-course">
	<div class="container">
		<div class="summary entry-summary">
			<h1 class="product_title entry-title"><?php echo get_the_title(get_post_meta(get_the_id(),'curso',true));?></h1>

			<?php


				$product = wc_get_product( get_post_meta(get_the_id(),'curso',true) );

				if ( ! $product->is_purchasable() ) {
					return;
				}

				
				if ( $product->is_in_stock() ) : ?>

					<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

					<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
						<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

						<?php
						do_action( 'woocommerce_before_add_to_cart_quantity' );

						woocommerce_quantity_input(
							array(
								'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
								'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
								'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
							)
						);

						do_action( 'woocommerce_after_add_to_cart_quantity' );
						?>

						<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt btn btn-warning"><?php echo esc_html( $product->single_add_to_cart_text() ); ?> <?php echo $product->get_price_html(); ?></button>
						<a href="#" class='btn btn-primary'>Presentar</a>
						<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
					</form>

					<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

				<?php endif; ?>

		</div>
	</div>
	<section class="tabsSingle mt-5 mb-5">		
		<div class="cat2">
			<div class="container">
				<a href="<?php echo get_permalink(get_post_meta(get_the_id(),'curso',true));?>">Sobre o curso</a>
				<a class='active' href="<?php echo get_home_url();?>/projetos?course=<?php echo get_post_meta(get_the_id(),'curso',true)?>">Projetos de alunos</a>
			</div>
		</div>
	</section>

	<section class="contentProject">
		<div class="container">
			<div class="row">
				<div class="col-md-3 order-md-1 order-2">
					<a href="<?php echo get_home_url();?>/projetos?course=<?php echo get_post_meta(get_the_id(),'curso',true)?>" class="btn btn-warning d-block">Ver todos os projetos</a>
				</div>
				<div class="col-md-9 order-md-2 order-1">
					<h2><?php the_title();?></h2>
					<div class="editor mt-4">
						<img src="<?php echo get_post_meta(get_the_id(),'imagem_url',true)?>" class='w-100'/>
						<div class="my-4">
							<?php the_content(); ?>
						</div>
						<?php
						if(get_post_meta(get_the_id(),'galeria',true)){
							if(get_post_meta(get_the_id(),'galeria',true) != 'novo'){						
						?>
						<div class="galeria mb-4">
							<div class="row">
								<?php
								$images = get_post_meta(get_the_id(),'galeria',true);
								foreach ($images as $image) {
									?>
									<div class="col-md-4 mb-3">
										<img src="https://saibala.com.br/<?php echo $image;?>" class='w-100'/>
									</div>
									<?php
								}
								?>
							</div>
						</div>
						<?php } }?>
						<?php if(get_post_meta(get_the_id(),'arquivo_url',true)){?>
							<a href="<?php echo get_post_meta(get_the_id(),'arquivo_url',true)?>" class="btn btn-primary">Download</a>
						<?php } ?>
					</div>
					<div class="commentsProject">
						<?php
							if ( comments_open() || get_comments_number() ) :
							    comments_template();
							endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>


<div id="projetos">

	<div class="container-fluid">
	

		<div class="my-5 list-projects">
			<div class="container">
				<h3 class='text-center my-4'>Outros projetos do curso</h3>			
				<div class="row">
				<?php
					$args = array(
						'post_type'  => 'projetos', 
						'showposts'=> 3,
						'orderby' => 'rand',
						'meta_query' => array(
						   array(
						       'key' => 'curso',
						       'value' => get_post_meta(get_the_id(),'curso',true)[0],
						       'compare' => 'LIKE',
						   )
						)
					);
					$projetos = new WP_Query($args);
					while ($projetos->have_posts()) : $projetos->the_post();
					?>

							<div class="col-md-3 col-lg-4 itemList" data-curso="<?php the_field('curso');?>">
								<div class="box">
									<a href="<?php echo get_permalink();?>" data-test='123'>
											<img src="<?php echo get_post_meta(get_the_id(),'imagem_url',true)?>" class='w-100'/>	
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
					?>
				</div>
			</div>
		</div>


	</div>

</div>


<?php endwhile;  ?>

<?php
get_footer();
?>