<?php get_header(); ?>
<section class="pd-mb-top">
    <div class="set-w">
        <div class="container">
            <div class="about-us page-news">
                <div class="about-us__breadcrumb">
                    <ul class="breadcrumb-fs">
                        <?php custom_breadcrumbs(); ?>
                    </ul>
                    <h1 class="about-us__title"><?php single_cat_title()  ?></h1>
                    <div class="page-news__description">
                        <p>
                            <?php echo category_description(6) ?>
                        </p>
                    </div>
                </div>
                <div class="page-news__content news-event">
                    <div class="news-event__div-news-event over-hiden-animate">
                        <?php
                        $current_cate =  get_queried_object();
                        $cat_id_current = $current_cate->term_id;
                        $list_post_news = array(
                            'order' => 'DESC',
                            'orderby' => 'date',
                            'post_status' => 'publish', // Chỉ lấy những bài viết được publish
                            'post_type' => 'post', // Lấy những bài viết thuộc post, nếu lấy những bài trong 'trang' thì để là page 
                            // 'showposts' => 4, // số lượng bài viết
                            'posts_per_page' => 6,
                            'cat' => $cat_id_current, // lấy bài viết trong chuyên mục có id là 1
                            'paged' => stheme_get_paged(),
                        );
                        $query_list_post_news = new WP_Query($list_post_news);

                        // The Loop
                        if ($query_list_post_news->have_posts()) : ?>
                            <div class="news-event__slider-tertiary page-news__container-news elmt-anm wow animate__animated animate__fadeInUp animate__delay-0s">
                                <?php while ($query_list_post_news->have_posts()) : $query_list_post_news->the_post(); ?>
                                    <div class="news-event__sld-item page-news__col-4">
                                        <a href="<?php the_permalink() ?>" class="news-event__content-col">
                                            <div href="<?php the_permalink() ?>" class="news-event__clip-hover clippath-anm">
                                                <!--<img src="" alt="" class="news-event__img clippath-anm__clip-img">-->
                                                <?php the_post_thumbnail() ?>
                                            </div>
                                            <div class="news-event__ss-text">
                                                <p class="news-event__date page-news__date"><?php echo get_the_date('d - m -Y'); ?></p>
                                                <a href="<?php the_permalink() ?>">
                                                    <h4 class="news-event__name-item page-news__name-news"><?php the_title() ?></h4>
                                                </a>
                                            </div>
                                        </a>
                                        <a href="<?php the_permalink() ?>" class="news-event__read-more page-news__read-more">Read more <i class="fas fa-chevron-right discover__icon"></i></a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php stheme_paginate(array('query' => $query_list_post_news));
                        endif;
                        // Reset Post Data
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>