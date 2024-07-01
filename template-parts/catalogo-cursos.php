<?php

  $args = (object) array_merge([
    'id' => 'section-catalogo-cursos-' . rand(0, 9999),
    'title' => 'confira todos os <span>cursos</span> da saibalá:',
  ], $args);

  $products_categories = get_field('products_categories');
  $products_categories = is_array($products_categories) ? $products_categories : [];

  $journeys_categories = get_field('journeys_categories');
  $journeys_categories = is_array($journeys_categories) ? $journeys_categories : [];

  $categories = [];
  foreach($products_categories as $category) $categories[] = $category;
  foreach($journeys_categories as $category) $categories[] = $category;

  $categories = array_values(array_filter(array_map(function($term_id) {
    $category = get_term($term_id);
    return $category->taxonomy=='product_cat' ? $category : null;
  }, $categories)));

  $courses = [];
  foreach($categories as $cat) {
    $query = new WP_Query([
      'post_type' => 'product',
      'posts_per_page' => -1,
      'tax_query' => [
        [
          'taxonomy' => 'product_cat',
          'field' => 'id',
          'terms' => $cat->term_id,
        ],
      ],
    ]);

    foreach($query->posts as $course) {
      $course->category_id = $cat->term_id;
      $course->thumbnail_url = get_the_post_thumbnail_url($course, 'shop_single');
      $course->permalink = get_permalink($course);
      
      $course->professor_posts_series_more = 0;
      $course->professor_posts_series = [];

      if ($professor_posts_series = get_field('professor', $course)) {
        $course->professor_posts_series = array_slice($professor_posts_series, 0, 3);
        $course->professor_posts_series_more = max(0, sizeof($professor_posts_series) - sizeof($course->professor_posts_series));
      }

      $courses[] = $course;
    }
  }

?>

<section class="more-series" id="<?php echo $args->id; ?>">
  <div class="more-series-wrapper">
    <h2 class="more-series-title"><?php echo $args->title; ?></h2>
    <br><br>

    <label class="more-series-input-search">
      <i class="mdi mdi-magnify"></i>
      <input type="search" v-model="params.search" placeholder="pesquisa" />
    </label>

    <div class="more-series-menu">
      <div class="swiper" ref="swiper" @click="categorySwiperBugfixClickHandler($event)">
        <div class="swiper-wrapper">
          <template v-for="c in categories">
            <div class="swiper-slide">
              <button
                class="btn-more-series"
                :data-category-id="c.term_id"
              >
                {{ c.name }}
              </button>
            </div>
          </template>
        </div>
      </div>
      <br><br>

      <div v-if="coursesFilter.length==0">
        nenhum curso encontrado
      </div>

      <div class="more-series-content">
        <div class="more-series-container" :data-container-category-id="params.category_id">
          <div class="more-series-container-wrapper">
            <template v-for="c in coursesFilter">
              <div class="more-series-item" :style="`background-image:url(${c.thumbnail_url});`">
                <div class="more-series-item-content">
                  <div class="more-series-item-content-container">
                    <strong>{{ c.post_title }}</strong>
                    <p>
                      {{ c.professor_posts_series.map(cc => cc.post_title).join(', ') }}
                      {{ c.professor_posts_series_more>0 ? ` e mais ${c.professor_posts_series_more}` : null }}
                    </p>
                  </div>
                  <a :href="c.permalink" class="more-series-item-content-link">
                    ver mais <div class="arrow"></div>
                  </a>
                </div>
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  addEventListener('DOMContentLoaded', () => {
    Vue.createApp({
      data() {
        return {
          params: {
            search: '',
            category_id: <?php echo json_encode(isset($categories[0]) ? $categories[0]->term_id : false); ?>,
          },
          categories: <?php echo json_encode($categories); ?>,
          courses: <?php echo json_encode($courses); ?>,
        };
      },

      methods: {
        swiperInit() {
          new Swiper(this.$refs.swiper, {
            slidesPerView: 'auto',
            loop: true,
            breakpoints: {
              375: {
                spaceBetween: 30,
              },
            }
          });
        },
        categorySwiperBugfixClickHandler(ev) {
          const categoryId = ev.target.getAttribute('data-category-id');
          if (!categoryId) return;
          this.params.category_id = categoryId;
          ev.target.closest('.swiper-wrapper').querySelectorAll('.btn-more-series').forEach(btn => {
            btn.style['border-bottom'] = btn==ev.target ? 'solid 5px #3196FF' : null;
          });
        },
      },

      computed: {
        coursesFilter() {
          const filterSearch = (courses) => {
            return courses.filter((course) => {
              return JSON.stringify(course).toLowerCase().includes(this.params.search.toLowerCase());
            });
          }
          
          const filtercategory = (courses) => courses.filter((course) => {
            return course.category_id==this.params.category_id;
          });

          let courses = this.courses;

          if (this.params.search) {
            courses = filterSearch(courses);
          }

          else if (this.params.category_id) {
            courses = filtercategory(courses);
          }

          return courses;
        },
      },

      mounted() {
        this.swiperInit();
      },
    }).mount('#<?php echo $args->id; ?>');
  });
</script>