<?php

// Template Name: Catalogo

$email_contact = 'xxx@saibala.com.br';
$url_current = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"];
$hero_image_01 = get_field('hero_image_01');
$hero_image_02 = get_field('hero_image_02');
$hero_image_03 = get_field('hero_image_03');


get_header('shop');


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
    <div class="catalogo__hero-bg-01" style="background-image:url(<?php echo $hero_image_01;?>)">
      <div class="catalogo__hero-bg-01--content">
        <h2><?php echo get_field('hero_01_postit_title');?></h2>
        <p><?php echo get_field('hero_01_postit_subtitle');?></p>
        <a href="<?php echo get_field('hero_01_postit_link');?>">ver mais <img src="<?php echo get_template_directory_uri(); ?>/assets/img/programas-arrow-black.png" /></a>
      </div>
    </div>
    <div class="catalogo__hero-wrapper">
    <div class="catalogo__hero-bg-02" style="background-image:url(<?php echo $hero_image_02;?>)">
      <div class="catalogo__hero-bg-02--content">
      <h2><?php echo get_field('hero_02_postit_title');?></h2>
        <p><?php echo get_field('hero_02_postit_subtitle');?></p>
        <a href="<?php echo get_field('hero_02_postit_link');?>">ver mais <img src="<?php echo get_template_directory_uri(); ?>/assets/img/programas-arrow-white.png" /></a>
      </div>
    </div>
    <div class="catalogo__hero-bg-03" style="background-image:url(<?php echo $hero_image_03;?>)">

      <div class="catalogo__hero-bg-03--content">
      <h2><?php echo get_field('hero_03_postit_title');?></h2>
        <p><?php echo get_field('hero_03_postit_subtitle');?></p>
        <a href="<?php echo get_field('hero_03_postit_link');?>">ver mais <img src="<?php echo get_template_directory_uri(); ?>/assets/img/programas-arrow-white.png" /></a>
      </div>

    </div>
    </div>

  </section>

  

  <section class="catalogo__about">
      <h2 class="catalogo__about-title"><?php echo get_field('about_header_title');?></h2>

      <div class="catalogo__about-wrapper">

      <div class="catalogo__about-content">
        <div class="catalogo__about-content_header">
          <h3><?php echo get_field('about_content_01_title');?></h3>
          <p><?php echo get_field('about_content_01_subtitle');?> <span><?php echo get_field('about_content_01_subtitle_details_mid');?></span> <?php echo get_field('about_content_01_subtitle_continue');?> <span><?php echo get_field('about_content_01_subtitle_details_end');?></span></p>
        </div>

        <div class="catalogo__about-content-img">
          <img src="<?php echo get_field('about_content_01_image');?>"/>
        </div>
      </div>

      <div class="catalogo__about-content catalogo__about-content-02">
        <div class="catalogo__about-content_header">
          <h3><?php echo get_field('about_content_02_title');?></h3>
          <p><?php echo get_field('about_content_02_subtitle');?> <span><?php echo get_field('about_content_02_subtitle_details_mid');?></span> <?php echo get_field('about_content_02_subtitle_continue');?> <span><?php echo get_field('about_content_02_subtitle_details_end');?></span></p>
        </div>

        <div class="catalogo__about-content-img">
          <img src="<?php echo get_field('about_content_02_image');?>"/>
        </div>
      </div>
    </div>
  </section>

    <?php if (have_rows('series_bloco')) : ?>
        <?php while (have_rows('series_bloco')) :
            the_row();

            $color = get_sub_field('color');
            $rgb = hex2rgba($color);
            $rgba = hex2rgba($color, 0.2);
            ?>

             <section class="catalogo__series" style="background: linear-gradient(180deg, #FFFFFF, #FAF7ED, <?php echo $rgba?>)">
              <div class="catalogo__series-wrapper">
                <div class="catalogo__series-header">
                  <h2><span><?php the_sub_field('title_details_first') ?></span> <?php the_sub_field('title') ?> <span><?php the_sub_field('title_details_last') ?></span></h2>
                  <p><?php the_sub_field('subtitle'); ?></p>
                  <strong>confira nossas séries:</strong>
                </div>
                
            <?php
            $featured_posts = get_sub_field('posts');

            if ($featured_posts) : ?>
              <div class="series-itens swiper swiperSeries">
                <div class="swiper-wrapper">
                <?php foreach ($featured_posts as $post) :
                  // Setup this post for WP functions (variable must be named $post).
                    $permalink = get_permalink($post->ID);

                    setup_postdata($post);
                    ?>
                    

                    <div class = "series__itens-card swiper-slide" style = "background-image: linear-gradient(
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
                   
                        <div class="series__itens-card--content-duration">
                          <ion-icon name="time-outline"></ion-icon>
                          <span>1:30 horas</span>
                        </div>
                      </div>
                      
                      <a href="<?php echo esc_url($permalink); ?>" class="series__itens-card--btn" style="background: <?php echo $rgb?>" >ver mais</a>
                  </div>
                <?php endforeach; ?>
              </div>
                <?php
                wp_reset_postdata(); ?>
            <?php endif; ?>
                </div>
            </div>
          </section>
        <?php endwhile; ?>
      
    <?php endif; ?>

  <section class="more-series" id="series">
    <div class="more-series-wrapper">

      <h2 class="more-series-title">confira todas as <span>séries</span> da saibalá:</h2>

      <div class="more-series-menu swiper-container menuSwiper">
        <?php
          $terms = get_field('products_categories');
        if ($terms) : ?>
              <ul class="more-series-menu-wrapper swiper-wrapper">
                <?php foreach ($terms as $term) : ?>
                    <?php $termObject = get_term($term);
                    ?>
                   
                      <button class="btn-more-series swiper-slide" data-category-id="<?php echo $term?>"><?php echo $termObject -> name?></button>
                   
                 
                <?php endforeach; ?>
              </ul>
        <?php endif; ?>
      </div> 


      <div class="more-series-content">
      <?php
        $terms = get_field('products_categories');

        if ($terms) : ?>
            <?php foreach ($terms as $term) :?>
                <?php
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $args = array(
                  'paged' => $paged,
                'post_type' => 'product',
                'posts_per_page' => 6,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $term
                  )
                ),
                );
                $the_query = new WP_Query($args);
                ?>
                 <div class="more-series-container" data-container-category-id="<?php echo $term?>">
                 <div class="more-series-container-wrapper">

                <?php if (have_posts()) :
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        $permalinkSeries = get_permalink(); ?>
                        
                      
                        <div class="more-series-item" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
                          <div class="more-series-item-content">
                            <div class="more-series-item-content-container">
                              <strong><?php the_title();?></strong>
                              <?php
                                $professor_posts_series = get_field('professor');
                                $maxS = 3;
                                $iS = 0;
                                $prof_names_series = array();

                                if ($professor_posts_series) : ?>
                                          <?php foreach ($professor_posts_series as $post) :
                                                $iS++; ?>
                                      
                                                <?php if ($iS > $maxS) {
                                                    break;
                                                } ?>
                                                <?php setup_postdata($post); ?>
                                            
                                                <?php array_push($prof_names_series, get_the_title());
                                                ?>
                                          <?php endforeach; ?>
                                
                                        <?php

                                        wp_reset_postdata(); ?>
                                <?php endif;
                                ?>
                               <?php if (count($prof_names_series) > 2) :
                                                ;?>
                                            <p><?php echo $prof_names_series[0] ?>, <?php echo $prof_names[1] ?>, e mais <?php echo count($prof_names_series) - 2?></p>
                                  
                               <?php else : ?>
                                                <p><?php echo implode(", ", $prof_names_series);
                                                ?></p>
                               <?php endif ?>         
                              
                            </div>
                            
                            <a href="<?php echo esc_url($permalinkSeries);?>" class="more-series-item-content-link">ver mais <ion-icon name="arrow-forward-outline"></ion-icon></a>
                          </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    
                    <div class="more-series-container-footer">
                      <?php
                        echo paginate_links(array(
                        'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'total'        => $the_query->max_num_pages,
                        'current'      => max(1, get_query_var('paged')),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 2,
                        'mid_size'     => 1,
                        'prev_next'    => false,
                        'add_args'     => false,
                        'add_fragment' => '#series',
                        ));
                        wp_reset_query(); ?>
                    </div>
              
                    <?php
                else : ?>
                <?php endif; ?>
                </div>
            <?php endforeach; ?>
        
        <?php endif; ?>

      </div>


    </div>
  </section>

  <section class="catalogo__programas">

    <div class="catalogo__programas-header">
      <h2>confira também nossos <span>programas</span>, clicando aqui:</h2>
        <a href="<?php echo $url_current;?>programas">programas</a>
    </div>

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

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script type="text/javascript">
  var swiper = new Swiper(".swiperSeries", {
    spaceBetween: 20,
    loop: false,
    loopFillGroupWithBlank: true,
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
      spaceBetween: 10,
      },
      480: {
        slidesPerView: 1.5,
      },
      768: {
        slidesPerView: 2.5,
        spaceBetween: 15,
      },
      1200: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    }
  });

  var swiperMenu = new Swiper('.menuSwiper', {
      slidesPerView: 6.5,
      slidesPerColumn: 6,
      spaceBetween: 20,
      breakpoints: {
        375: {
          slidesPerView: 4.5,
          slidesPerColumn: 5,
          spaceBetween: 16,
        },
        769: {
          slidesPerView: 6.5,
          slidesPerColumn: 5.5,
          spaceBetween: 20,
        }
      }
  });

  /* Changed Series */
    
  const btnSeries = document.querySelectorAll('.btn-more-series')

  btnSeries.forEach(element => {
  
    element.addEventListener('click', async () => {
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
                <?php
                get_footer();
                ?>
