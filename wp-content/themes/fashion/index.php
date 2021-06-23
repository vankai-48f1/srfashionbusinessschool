<?php
/*
Template Name: Trang chủ
*/
?>

<?php get_header() ?>

<section class="pd-mb-top">
    <!-- slick 1-->
    <script src="<?php echo get_template_directory_uri() ?>/js/js-home/slider-primary.js"></script>
    <div class="section-first">
        <?php
        if (have_rows('slider-primary')) : ?>
            <div class="slider-primary" id="slider-primary">

                <?php while (have_rows('slider-primary')) : the_row();
                    $sl_img_pri = get_sub_field('sl-primary-img'); ?>
                    <div class="slider-primary__image">
                        <img src="<?php echo $sl_img_pri['url']; ?>" alt="">
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif;
        ?>
        <a href="#to-arrow" class="section-first__arrow-down section-first__arrow-down--icon">
            <svg viewBox="0 0 20 20" class="click-down">
                <path d="M10.509 1.256v15.949l1.232-1.196a.265.265 0 0 1 .364 0l.365.35c.1.095.1.252 0 .348l-2.294 2.221a.268.268 0 0 1-.365 0l-2.28-2.207a.238.238 0 0 1 0-.349l.365-.349a.265.265 0 0 1 .364 0l1.23 1.195V1.256c0-.142.115-.256.255-.256h.51c.14 0 .254.114.254.256z">
                </path>
            </svg>
        </a>
    </div>
</section>

<section>
    <div class="main" id="to-arrow">
        <div class="set-w">
            
            <!-- slick 2 -->
            <script src="<?php echo get_template_directory_uri() ?>/js/js-home/slider-secondary.js"></script>

            <?php
            $displayDots = 0;
            $list_fashion =  array(
                'post_status' => 'publish', // Chỉ lấy những bài viết được publish
                'post_type' => 'post', // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page 
                'showposts' => 12, // số lượng bài viết
                'post_per_page' => -1,
                'category_name' => 'class-schedule', // lấy bài viết trong chuyên mục có id là 1            
            );
            $query_fashion = new WP_Query($list_fashion);
            // The Loop
            if ($query_fashion->have_posts()) : ?>
                <div class="slider-secondary" id="slider-secondary">
                    <?php while ($query_fashion->have_posts()) : $query_fashion->the_post(); $displayDots++ ;?>

                        <div class="slider-secondary__item" id="width-second-content">
                            <a href="<?php the_permalink(); ?>" class="slider-secondary__link-second" data-title="<?php the_title(); ?>">
                                <?php the_post_thumbnail(); ?>
<!--                                 <div class="slider-secondary__ct-left">
                                    <h2 class="slider-secondary__name limit-line-secon"><?php //the_title(); ?></h2>
                                    <div class="slider-secondary__caption"><?php //the_excerpt(); ?>
                                    </div>
                                    <?php 
                                    //$open_course = get_post_meta($post->ID,'open_course', true );
                                    //if(!empty($open_course)) : ?>
                                    <div class="slider-secondary__box"><?php //echo $open_course ; ?></div>
                                    <?php //endif; ?>
                                </div> -->
                                <a href="<?php the_permalink(); ?>" class="slider-secondary__dcv-more discover">Discover more<i class="fas fa-chevron-right discover__icon"></i>
                                </a>
                            </a>
                        </div>

                    <?php endwhile; ?>
                </div>
            <?php endif;
            // Reset Post Data
            wp_reset_postdata();

            ?>
        </div>
    </div>
</section>
<section>
    <div class="set-w">
        <div class="section-tertiary">
            <div class="container pd-0">
                <div class="over-hiden-animate">
                    <div class="section-tertiary__block elmt-anm wow animate__animated animate__fadeInUp animate__delay-0s">
                        <?php
                        $img_fashion = get_field('img-col-fashion');
                        $img_art = get_field('img-col-art');
                        $img_design = get_field('img-col-design');
                        ?>
                        <div class="section-tertiary__col-col-4">
                            <div class="section-tertiary__image">
                                <a href="#" class="section-tertiary__link-img"><img class="section-tertiary__item-img" src="<?php echo esc_url($img_fashion['url']); ?>" alt=""></a>
                            </div>
                            <div class="section-tertiary__content-ttr elmt-anm wow animate__animated animate__fadeInUp animate__delay-0.2s">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'fashion-business', // Gọi menu đã đăng ký trong function
                                    'depth'           => 2,     // Cấu hình dropdown 2 cấp
                                    'container'       => false, // header-menuThẻ div bọc menu
                                    'menu_class'      => 'section-tertiary__menu-fashion', // Class của nav bootstrap
                                ));
                                ?>
                                
                            </div>
                        </div>
                        <div class="section-tertiary__col-col-4">
                            <div class="section-tertiary__image">
                                <a href="#" class="section-tertiary__link-img"><img class="section-tertiary__item-img" src="<?php echo esc_url($img_art['url']); ?>" alt=""></a>
                            </div>
                            <div class="section-tertiary__content-ttr elmt-anm wow animate__animated animate__fadeInUp animate__delay-0.2s">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'fashion-marketing', // Gọi menu đã đăng ký trong function
                                    'depth'           => 2,     // Cấu hình dropdown 2 cấp
                                    'container'       => false, // header-menuThẻ div bọc menu
                                    'menu_class'      => 'section-tertiary__menu-fashion', // Class của nav bootstrap
                                ));
                                ?>
                                <!-- <ul class="section-tertiary__list-school">
                                    <li class="section-tertiary__name-school"><a href="#" class="section-tertiary__link-school">MILANO</a></li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="section-tertiary__col-col-4">
                            <div class="section-tertiary__image">
                                <a href="#" class="section-tertiary__link-img"><img class="section-tertiary__item-img" src="<?php echo esc_url($img_design['url']); ?>" alt=""></a>
                            </div>
                            <div class="section-tertiary__content-ttr elmt-anm wow animate__animated animate__fadeInUp animate__delay-0.2s">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'fashion-stylist', // Gọi menu đã đăng ký trong function
                                    'depth'           => 2,     // Cấu hình dropdown 2 cấp
                                    'container'       => false, // header-menuThẻ div bọc menu
                                    'menu_class'      => 'section-tertiary__menu-fashion', // Class của nav bootstrap
                                ));
                                ?>
                                <!-- <ul class="section-tertiary__list-school">
                                    <li class="section-tertiary__name-school"><a href="#" class="section-tertiary__link-school">MILANO</a></li>
                                    <li class="section-tertiary__name-school"><a href="#" class="section-tertiary__link-school">MILANO</a></li>
                                    <li class="section-tertiary__name-school"><a href="#" class="section-tertiary__link-school">MILANO</a></li>
                                    <li class="section-tertiary__name-school"><a href="#" class="section-tertiary__link-school">MILANO</a></li>
                                    <li class="section-tertiary__name-school"><a href="#" class="section-tertiary__link-school">MILANO</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="office">
                <div class="infor-office">
                    <div class="infor-office__row-first container pd-0">
                        <?php
                        // $link_enquire = get_field('enquire-now');
                        // if ($link_enquire) :
                        //     $link_url = $link_enquire['url'];
                        //     $link_title = $link_enquire['title'];
                        //     $link_target = $link_enquire['target'] ? $link_enquire['target'] : '_self';
                        ?>
                            <a href="<?php
                                        //  echo esc_url($link_url); 
                                        ?>" class="infor-office__name-1"><?php
                                                                            //   echo esc_html($link_title); 
                                                                            ?>
                                <i class="fas fa-chevron-right discover__icon infor-office__name-1--arrow"></i>
                            </a>
                        <?php
                        //endif; 
                        ?>

                        <?php
                        // $link_book = get_field('book-oriantation');
                        // if ($link_book) :
                        //     $link_url_book = $link_book['url'];
                        //     $link_title_book = $link_book['title'];
                        //     $link_target_book = $link_book['target'] ? $link_book['target'] : '_self';
                        ?>
                            <a href="<?php
                                        // echo esc_url($link_url_book); 
                                        ?>" class="infor-office__name-1"><?php
                                                                            //echo esc_html($link_title_book);
                                                                            ?>
                               <i class="fas fa-chevron-right discover__icon infor-office__name-1--arrow"></i></a>
                        <?php
                        //endif; 
                        ?>
                    </div>
                    <div class="container pd-0 infor-office__office-bottom">
                        <div class="infor-office__box-infor">
                            <div class="infor-office__name"><?php
                                                            //echo get_post_meta($post->ID, 'office', true); 
                                                            ?></div>
                            <?php
                            //echo get_post_meta($post->ID, 'list-office', true); 
                            ?>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<section>
    <div class="set-w">
        <div class="bg-news-event">
            <div class="container">
                <div class="news-event">
                    <div class="news-event__title">
                        <h3 class="news-event__name"><?php echo get_cat_name(6) ?></h3>
                        <a href="<?php echo get_category_link(6); ?>" class="news-event__views">view all</a>
                    </div>
                    <div class="news-event__div-news-event over-hiden-animate">
                        <!-- slick 3 -->
                        <script src="<?php echo get_template_directory_uri() ?>/js/js-home/slider-tertiary.js"></script>
                        <?php
                        $args = array(
                            'post_status' => 'publish', // Chỉ lấy những bài viết được publish
                            'post_type' => 'post', // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page 
                            'showposts' => 3, // số lượng bài viết
                            'cat' => 6, // lấy bài viết trong chuyên mục có id là 1
                            'order' => 'DESC',
                            'orderby' => 'date',
                        );
                        $the_query = new WP_Query($args);

                        // The Loop
                        if ($the_query->have_posts()) : ?>
                            <div class="news-event__slider-tertiary slider-news-event elmt-anm wow animate__animated animate__fadeInUp animate__delay-0s" id="slider-news-event">

                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                    <div class="news-event__sld-item">
                                        <a href="<?php the_permalink(); ?>" class="news-event__content-col">
                                            <div href="<?php the_permalink(); ?>" class="news-event__clip-hover clippath-anm">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                            <div class="news-event__ss-text">
                                                <p class="news-event__date"><?php echo get_the_date('d - m - Y'); ?></p>
                                                <h4 class="news-event__name-item"><?php the_title(); ?></h4>
                                            </div>
                                        </a>
                                        <a href="<?php the_permalink(); ?>" class="news-event__read-more">Read more <i class="fas fa-chevron-right discover__icon"></i></a>
                                    </div> <?php endwhile; ?>
                            </div>

                        <?php endif;

                        // Reset Post Data
                        wp_reset_postdata();

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="set-w">
        <?php $bg_banner = get_field('bg-banner'); ?>
        <div class="full-banner" style="background-image: url('<?php echo esc_url($bg_banner['url']); ?>');">
            <div class="container">
                <div class="full-banner__content">
                    <div class="full-banner__ct-inner">
                        <h2 class="full-banner__title slider-secondary__name"><?php echo get_post_meta($post->ID, 'title-banner', true); ?></h2>
                        <p class="full-banner__paragraph"><?php echo get_post_meta($post->ID, 'description-banner', true); ?></p>
                        <?php
                        $link_discover_banner = get_field('link-discover-banner');
                        if ($link_discover_banner) :
                            $url_dcv_bn = $link_discover_banner['url'];
                            $name_dcv_bn = $link_discover_banner['title'];
                        ?>
                            <a class="full-banner__link-1" href="<?php echo esc_url($url_dcv_bn) ?>"><span class="full-banner__dcv-more discover"><?php echo esc_html($name_dcv_bn); ?><i class="fas fa-chevron-right discover__icon"></i></span></a>
                        <?php endif;
                        $link_join_cmnt = get_field('link-join-the-community');
                        if ($link_join_cmnt) :
                            $url_join_cmnt = $link_join_cmnt['url'];
                            $name_join_cmnt = $link_join_cmnt['title'];
                        ?>
                            <a class="full-banner__link-2" href="<?php echo esc_url($url_join_cmnt); ?>"><span class="full-banner__dcv-more discover"><?php echo esc_html($name_join_cmnt); ?><i class="fas fa-chevron-right discover__icon"></i></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="set-w">
        <div class="bg-news-event bg-stories">
            <div class="container">
                <div class="news-event stories over-hiden-animate">
                    <div class="news-event__title">
                        <h3 class="news-event__name"><?php echo get_cat_name(7) ?></h3>
                        <a href="<?php echo get_category_link(7); ?>" class="news-event__views">view all</a>
                    </div>
                    <div class="news-event__div-news-event elmt-anm wow animate__animated animate__fadeInUp animate__delay-0s" id="slider-stories">
                        <!-- slick 4 -->
                        <script src="<?php echo get_template_directory_uri() ?>/js/js-home/slider-fourth.js"></script>
                        <?php
                        $cate_stories = array(
                            'post_status' => 'publish', // Chỉ lấy những bài viết được publish
                            'post_type' => 'post', // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page 
                            'showposts' => 6, // số lượng bài viết
                            'cat' => 7, // lấy bài viết trong chuyên mục có id là 1
                            'order' => 'DESC',
                            'orderby' => 'date',
                        );
                        $query_cate_stories = new WP_Query($cate_stories);

                        // The Loop
                        if ($query_cate_stories->have_posts()) : ?>
                            <div class="news-event__slider-tertiary slider-stories">
                                <?php while ($query_cate_stories->have_posts()) : $query_cate_stories->the_post(); ?>
                                    <div class="news-event__sld-item">
                                        <a href="<?php the_permalink() ?>" class="news-event__content-col">
                                            <div href="#" class="news-event__clip-hover clippath-anm">
                                                <?php the_post_thumbnail(); ?>
                                            </div>
                                            <div class="news-event__ss-text">
                                                <h4 class="news-event__name-item stories__name-item"><?php the_title(); ?></h4>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif;
                        // Reset Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
  <div class="set-w">
    <?php $image_why_chose_us = get_field('image_why_chose_us'); ?>
    <div class="full-banner content-why-chose-us">
      <div class="row mg-row-0">
        <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="img-why-chose-us">
            <img src="<?php echo esc_url($image_why_chose_us['url']); ?>" alt="">
          </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="container">
            <div class="full-banner__content">
              <div class="full-banner__ct-inner">
                <h2 class="full-banner__title slider-secondary__name"><?php echo get_post_meta($post->ID, 'title_why_chose_us', true); ?></h2>
                <p class="full-banner__paragraph"><?php echo get_post_meta($post->ID, 'description_why_chose_us', true); ?></p>
                <?php
                $link_why_chose_us = get_field('link_why_chose_us');
                if ($link_why_chose_us) :
                  $url_why_chose_us = $link_why_chose_us['url'];
                  $name_why_chose_us = $link_why_chose_us['title'];
                ?>
                  <a class="full-banner__link-1" href="<?php echo esc_url($url_why_chose_us) ?>"><span class="full-banner__dcv-more discover"><?php echo esc_html($name_why_chose_us); ?><i class="fas fa-chevron-right discover__icon"></i></span></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <section>
    <div class="set-w">
        <div class="container">
            <div class="partners">
                <div class="partners__name"><?php echo get_post_meta($post->ID, 'title-partners', true) ?></div>
                <?php
                $images_partners = get_field('list-img-partners');
                if ($images_partners) : ?>
                    <ul class="partners__list">
                        <?php foreach ($images_partners as $img_partners) : ?>
                            <li class="partners__item"><img src="<?php echo esc_url($img_partners['sizes']['large']); ?>" alt="" class="partners__item-img"></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="partners partners-2">
                <?php
                $images_partners_2 = get_field('list-img-partners-2');
                if ($images_partners_2) : ?>
                    <ul class="partners__list">
                        <?php foreach ($images_partners_2 as $img_partners_2) : ?>
                            <li class="partners__item"><img src="<?php echo esc_url($img_partners_2['sizes']['large']); ?>" alt="" class="partners__item-img"></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section> -->
</div>
<!-- /.container -->
<?php get_footer() ?>