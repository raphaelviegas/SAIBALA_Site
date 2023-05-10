<?php

// Template Name: Catalogo

// Dependências
wp_enqueue_script('vue', 'https://unpkg.com/vue@3.2.47/dist/vue.global.js');
wp_enqueue_style('mdi', 'https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css');

$email_contact = get_field('email_contact');
$hero_image_01 = get_field('hero_image_01');
$hero_image_02 = get_field('hero_image_02');
$hero_image_03 = get_field('hero_image_03');

// // Localhost imagem correta para teste
// $hero_image_01 = 'https://saibala.com.br/wp-content/uploads/2022/11/Retrato_Embuscadoprodutoperfeito.png';
// $hero_image_02 = 'https://saibala.com.br/wp-content/uploads/2022/11/Landscape_Temposexponenciais.png';
// $hero_image_03 = 'https://saibala.com.br/wp-content/uploads/2022/12/Landscape_CaminhoProfissionalFuturo.png';

wp_enqueue_style('swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');

get_header('shop', [
  'header_logo' => '/assets/img/new-home/logo-yellow.svg',
	'header_link_color' => '#ffff00',
]);


if (! function_exists('hex2rgba')) :

    function hex2rgba($color, $opacity = false)
    {

        $default = 'rgb(0,0,0)';

        // Return default if no color provided
        if (empty($color)) {
            return $default;
        }

        // Sanitize $color if "#" is provided
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        // Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif (strlen($color) == 3) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }

        // Convert hexadec to rgb
        $rgb = array_map('hexdec', $hex);

        // Check if opacity is set(rgba or rgb)
        if ($opacity) {
            if (abs($opacity) > 1) {
                $opacity = 1.0;
            }
            if (preg_match("/^[0-9,]+$/", $opacity)) {
                $opacity = str_replace(',', '.', $opacity);
            }
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode(",", $rgb) . ')';
        }

        // Return rgb(a) color string
        return $output;
    }

endif;


?>


<div id="catalogo">
  <section class="catalogo__hero">
    <?php $hero = get_field('hero_item'); ?>
    <div class="catalogo__hero-wrapper">
      <a href="<?php echo get_field('hero_01_postit_link');?>" class="catalogo__hero-bg-01">
        <div class="catalogo__hero-bg-01" style="background-image:url(<?php echo $hero_image_01;?>)">
          <div class="selo__hero"><img src="<?= get_template_directory_uri(); ?>/assets/img/selo-lancamento.png"></div>
          <div class="catalogo__hero-bg-01--content">
            <h2><?php echo get_field('hero_01_postit_title');?></h2>
            <p><?php echo get_field('hero_01_postit_subtitle');?></p>
            <div class="catalogo__hero-bg-01--content-link">
              ver mais <div class="arrow"></div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="catalogo__hero-wrapper">
      <a href="<?php echo get_field('hero_02_postit_link');?>" class="catalogo__hero-bg-02">
        <div class="catalogo__hero-bg-02" style="background-image:url(<?php echo $hero_image_02;?>)">
          <div class="selo__hero"><img src="<?= get_template_directory_uri(); ?>/assets/img/selo-lancamento.png"></div>
          <div class="catalogo__hero-bg-02--content">
            <h2><?php echo get_field('hero_02_postit_title');?></h2>
            <p><?php echo get_field('hero_02_postit_subtitle');?></p>
            <div class="catalogo__hero-bg-02--content-link">
              ver mais <div class="arrow"></div>
            </div>
          </div>
        </div>
      </a>
      
      <a href="<?php echo get_field('hero_03_postit_link');?>" class="catalogo__hero-bg-03">
        <div class="catalogo__hero-bg-03" style="background-image:url(<?php echo $hero_image_03;?>)">
          <div class="selo__hero"><img src="<?= get_template_directory_uri(); ?>/assets/img/selo-lancamento.png"></div>  
          <div class="catalogo__hero-bg-03--content">
            <h2><?php echo get_field('hero_03_postit_title');?></h2>
            <p><?php echo get_field('hero_03_postit_subtitle');?></p>
            <div class="catalogo__hero-bg-03--content-link">
              ver mais <div class="arrow"></div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </section>

  <?php if (have_rows('ancora_topo')): ?>
    <section class="catalogo__about">
        <h2 class="catalogo__about-title">
          Em qual momento da sua carreira você está?  
        </h2>

        <div class="row">
          <?php while(have_rows('ancora_topo')):
            $ancora = (object) the_row();
            $ancora->ancora_topo_image = $ancora->ancora_topo_image ? wp_get_attachment_url($ancora->ancora_topo_image) : null;
          ?>
          <div class="col-6 col-md-3 align-end">
            <a href="javascript:ancoraTopoScrollTo(<?php echo $ancora->ancora_topo_link_bloco_series; ?>);" style="color:#444!important;">
              <img style="height:270px; max-width:100%; object-fit:cover;" src="<?php echo $ancora->ancora_topo_image; ?>" alt="<?php echo $ancora->ancora_topo_title; ?>">
              <div class="px-3">
                <strong><?php echo $ancora->ancora_topo_title; ?></strong>
                <div style="margin-top:10px;"><?php echo $ancora->ancora_topo_text; ?></div>
              </div>
            </a>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>

    <script>
      function ancoraTopoScrollTo(index) {
        const target = document.querySelector(`#series_bloco_index_${index}`);
        if (target) target.scrollIntoView({ behavior: 'smooth', block: 'end' });
      }
    </script>
  <?php endif; ?>

    <?php if (have_rows('series_bloco')) : ?>
        <?php
          
          $series_bloco_index = 0;
          while (have_rows('series_bloco')):
            $series_bloco_index++;
            the_row();

            $color = get_sub_field('color');
            $rgb = hex2rgba($color);
            $rgba = hex2rgba($color, 0.2);
            ?>

             <section id="series_bloco_index_<?php echo $series_bloco_index; ?>" class="catalogo__series" style="background: linear-gradient(180deg, #FFFFFF, #FAF7ED, <?php echo $rgba?>)">
              <div class="catalogo__series-wrapper">
                <div class="catalogo__series-header">
                  <h2><span><?php the_sub_field('title_details_first') ?></span> <?php the_sub_field('title') ?> <span><?php the_sub_field('title_details_last') ?></span></h2>
                  <p><?php the_sub_field('subtitle'); ?></p>
                  <strong>confira nossas séries:</strong>
                </div>
                
            <?php
            $featured_posts = get_sub_field('posts');

            if ($featured_posts) : ?>
              <div class="container">
              <div class="series-itens swiper swiperSeries">
               
                <div class="swiper-wrapper">
                <?php foreach ($featured_posts as $post) :
                  // Setup this post for WP functions (variable must be named $post).
                    $permalink = get_permalink($post->ID);

                    setup_postdata($post);
                    ?>
                    

                  <div class="swiper-slide">
                    <div class="series__itens-card" style = "background-image: linear-gradient(
                            180deg,
                            #000,
                            #595656 0.1%,
                            rgba(255, 255, 255, 0)
                          ), url('<?php echo get_the_post_thumbnail_url($post->ID) ?>'); " >
                      <div class = "series__itens-card--content" >
                        <strong> <?php the_title(); ?></strong>
                        
                        
                        <div class="series__itens-card--content-profs">
                        <div class="series__itens-card--content-profs-imgs">
                        <?php
                          $professor_posts = get_field('professor');
                          $max = 3;
                          $i = 0;
                          $prof_names = array();

                        if ($professor_posts) : ?>
                                  <?php foreach ($professor_posts as $post) :
                                      // Setup this post for WP functions (variable must be named $post).
                                        $i++; ?>
                                      
                                        <?php if ($i > $max) {
                                            break;
                                        } ?>
                                        <?php setup_postdata($post); ?>
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>"/>
                                            <?php array_push($prof_names, get_the_title());
                                            ?>
                                  <?php endforeach; ?>
                                
                                <?php
                                // Reset the global post object so that the rest of the page works correctly.
                                wp_reset_postdata(); ?>
                        <?php endif;
                        ?>
                        
                        </div>

                        <div class="series__itens-card--content-profs-names">
                          <span>professores:</span>

                            <?php if (count($prof_names) > 2) :
                                 ;?>
                            <p><?php echo $prof_names[0] ?>, <?php echo $prof_names[1] ?>, e mais <?php echo count($prof_names) - 2?></p>
                  
                            <?php else : ?>
                                <p><?php echo implode(", ", $prof_names);
                                ?></p>
                            <?php endif ?>
                       
                          </div>
                        </div>
                      </div>
                      
                      <a href="<?php echo esc_url($permalink); ?>" class="series__itens-card--btn" style="background: <?php echo $rgb?>" >ver mais <div class="arrow"></div></a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              </div>
                <?php
                wp_reset_postdata(); ?>
            <?php endif; ?>
                </div>
            </div>
          </section>
        <?php endwhile; ?>
      
    <?php endif; ?>

  <?php get_template_part('template-parts/catalogo-cursos'); ?>

  <section class="catalogo__programas">

    <?php /*<div class="catalogo__programas-header">
      <h2>confira também nossos <span>programas</span>, clicando aqui:</h2>
      <a href="<?php echo bloginfo('url');?>/catalogo/programas-saibala">programas</a>
    </div>*/ ?>

    <div class="catalogo__programas-form">
      <div class="catalogo__programas-form-content">
        <h2><?php echo get_field('form_title');?></h2>
        <p><?php echo get_field('form_subtitle');?></p>
      </div>
      <div class="catalogo__programas-form-container background-btn">
      <?php echo do_shortcode(get_field('shortcode'))?>
      </div>
    </div>

    <div class="catalogo__programas-faq catalogo__faq">

    <?php
    $args = array(
    'post_type' => 'saibala_faq',
    );

    $loop = new WP_Query($args);

    ?>
      
      <?php if ($loop->have_posts()) {?>
            <h2 class="catalogo__programas-faq-title">perguntas frequentes</h2>
            
                <?php
                    $count = 0;
                while ($loop->have_posts()) :
                    $loop->the_post();
                    $count = $count + 1;
                    ?>
                    <div class="programas__faq-item">
                    <div class="programas__faq-item-question">
                      <h3><?php the_title();?></h3>
                      <button class="programas__faq-item-btn">
                        <ion-icon name="chevron-down-outline" class="programas__faq-item-btn-open"></ion-icon>
                        <ion-icon name="chevron-up-outline" class="programas__faq-item-btn-close"></ion-icon>
                      </button>
                    </div>
                    <div class="programas__faq-item-answer">
                      <p><?php the_content();?></p>
                    </div>
                   </div>  
                <?php	endwhile; ?>
           
      <?php }?>
      <div class="catalogo__programas-faq-footer">
      <h3>ainda tem dúvidas?</h3>
      <p>entre em contato com nossa equipe pelo email:</p>
      <a href="mailto:<?php echo $email_contact;?>"><?php echo $email_contact;?></a>
      </div>
    </div>

  </section>

  

</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<style>
	* {
		font-family: "Vinila", sans-serif;
	}
</style>

<!-- Initialize Swiper -->
<script type="text/javascript">
  var swiper = new Swiper(".swiperSeries", {
    loop: false,
	  loopedSlides: 7,
    watchSlidesProgress: true,
	  centeredSlides: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 2,
		    spaceBetween: 20,
      },
      1200: {
        slidesPerView: 3,
		    spaceBetween: 20,
      }
    }
  });

  var swiperMenu = new Swiper('.menuSwiper', {
    slidesPerView: 'auto',
    loop: true,
    breakpoints: {
      375: {
        spaceBetween: 30,
      },
    }
  });

  /* Changed Series */
    
  const btnSeries = document.querySelectorAll('.btn-more-series')
  if(window.screen.width >= 769) {
    btnSeries.item(0).style.fontWeight = 'bold'
    btnSeries.item(0).style.borderBottom = '5px solid #3196ff'
  }
  else {
    btnSeries.item(0).style.fontWeight = 'bold'
    btnSeries.item(0).style.borderBottom = '3px solid #3196ff'
  }
 
  
  btnSeries.forEach(element => {
    element.addEventListener('click', async () => {
      btnSeries.forEach(item => {
        item.style.borderBottom  = 'none';
        item.style.fontWeight = '300';
      })
      element.style.fontWeight = 'bold';
      if(window.screen.width >= 769) {
       
        element.style.borderBottom = '5px solid #3196ff'
      }
      else {
        
        element.style.borderBottom = '3px solid #3196ff'
      }

      const dataCategory = element.getAttribute('data-category-id')
      const container = document.querySelector(`[data-container-category-id='${dataCategory}']`)
      const allContainers = document.querySelectorAll('.more-series-container')
      allContainers.forEach(element => {
       
        element.style.display = 'none';
      });
      container.style.display = 'block';
    })
  })

  
  /* Faq Animation */

  const faqItems = document.querySelectorAll('.programas__faq-item')

  faqItems.forEach(element => {
    element.firstElementChild.addEventListener('click', () => {
      element.classList.toggle('active')

      if(element.classList.contains('active')) {
        element.lastElementChild.style.maxHeight = element.lastElementChild.scrollHeight + 'px'
        element.lastChild.style.pointerEvents = 'none'
      }
      else {
        element.lastElementChild.style.maxHeight = '0px'
      }
    })
  })
 
</script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<?php get_footer(); ?>