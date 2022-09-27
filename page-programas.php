<?php

// Template Name: Programas
$email_contact = 'xxx@saibala.com.br';
$shortcode = get_field('shortcode');

get_header('shop');
?>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



<section class="more-programas" id="programas">
  
<div class="more-programas__btn-back">
  <ion-icon name="arrow-back-outline"></ion-icon>
  <a href="https://saibala.com.br/catalogo/programas">voltar para <span>séries</span></a>
</div>

    <div class="more-programas-wrapper">

      <h2 class="more-programas-title">confira todas os <span>programas</span> da saibalá:</h2>

      <div class="more-programas-menu swiper-container menuSwiperPrograma">
        <?php
        $terms = get_field('journeys_categories');
        if ($terms) : ?>
              <ul class="more-programas-menu-wrapper swiper-wrapper">
                <?php foreach ($terms as $term) : ?>
                    <?php $termObject = get_term($term);
                    ?>
                   
                      <button class="btn-more-programas swiper-slide" data-category-id="<?php echo $term?>"><?php echo $termObject -> name?></button>
                   
                 
                <?php endforeach; ?>
              </ul>
        <?php endif; ?>
      </div> 


      <div class="more-programas-content">
      <?php
        $terms = get_field('journeys_categories');

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
                 <div class="more-programas-container" data-container-category-id="<?php echo $term?>">
                 <div class="more-programas-container-wrapper">

                <?php if (have_posts()) :
                    while ($the_query->have_posts()) :
                        $the_query->the_post();
                        $permalinkProgramas = get_permalink(); ?>
                        
                      
                        <div class="more-programas-item" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)">
                          <div class="more-programas-item-content">
                            <div class="more-programas-item-content-container">
                              <strong><?php the_title();?></strong>
                              <?php
                                $professor_posts = get_field('professor');
                                $maxS = 3;
                                $iS = 0;
                                $prof_names = array();

                                if ($professor_posts) : ?>
                                          <?php foreach ($professor_posts as $post) :
                                                $iS++; ?>
                                      
                                                <?php if ($iS > $maxS) {
                                                    break;
                                                } ?>
                                                <?php setup_postdata($post); ?>
                                            
                                                <?php array_push($prof_names, get_the_title());
                                                ?>
                                          <?php endforeach; ?>
                                
                                        <?php

                                        wp_reset_postdata(); ?>
                                <?php endif;
                                ?>
                               <?php if (count($prof_names) > 2) :
                                                ;?>
                                            <p><?php echo $prof_names[0] ?>, <?php echo $prof_names[1] ?>, e mais <?php echo count($prof_names) - 2?></p>
                                  
                               <?php else : ?>
                                                <p><?php echo implode(", ", $prof_names);
                                                ?></p>
                               <?php endif ?>         
                              
                            </div>
                            
                            <a href="<?php echo esc_url($permalinkProgramas);?>" class="more-programas-item-content-link">ver mais <ion-icon name="arrow-forward-outline"></ion-icon></a>
                          </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    
                    <div class="more-programas-container-footer">
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
                        'add_fragment' => '#programas',
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

<section class="catalogo__programas-form more__programas-form">
      <div class="catalogo__programas-form-content">
        <h2><?php echo get_field('form_title');?></h2>
        <p><?php echo get_field('form_subtitle');?></p>
      </div>
      <div class="catalogo__programas-form-container more__programas-form-container">
      <?php echo do_shortcode(get_field('shortcode'))?>
      </div>
</section>

<?php
$args = array(
    'post_type' => 'saibala_faq',
);

$loop = new WP_Query($args);

?>

<section class="catalogo__programas-faq more-programas__faq">
    
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
            <p>entre em contato com a nossa equipe pelo email:</p>
            <a href="mailto:contato@saibala.com.br">contato@saibala.com.br</a>
        </div>
    
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script type="text/javascript">

  var swiperMenuPrograma = new Swiper('.menuSwiperPrograma', {
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

  const btnProgramas = document.querySelectorAll('.btn-more-programas')

  
  btnProgramas.forEach(element => {
  
  element.addEventListener('click', async () => {
      const dataCategoryP = element.getAttribute('data-category-id')
      const containerP = document.querySelector(`[data-container-category-id='${dataCategory}']`)
      const allContainersP = document.querySelectorAll('.more-programas-container')
      allContainers.forEach(element => {
        element.style.display = 'none';
      });
      containerP.style.display = 'block';
    })
  })




  /* Faq Animation */

  const faqItemsProgramas = document.querySelectorAll('.programas__faq-item')

  faqItemsProgramas.forEach(element => {
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

<?php
  get_footer();
?>
