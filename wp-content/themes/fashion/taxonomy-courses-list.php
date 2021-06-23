<?php get_header() ?>
<!-- Page Content -->
<?php //if (get_term_by(14)) { 
?>
<div class="pd-mb-top">
    <div class="set-w">
        <div class="container">

            <div class="page-course">
                <ul class="breadcrumb-fs">
                    <?php custom_breadcrumbs(); ?>
                </ul>
                <div class="page-course__content">
                    <div class="page-course__title-tax">
                        <?php
                        $terms = get_the_terms($post->ID, 'courses-list');
                        ?>
                         <h1><?php echo single_cat_title() ; ?></h1>
                    </div>
                    <div class="about-us__content">
                         <?php
                        $array_term_current = get_queried_object();
                        echo $array_term_current->description;
                        ?>
                        
                        <?php
                        // foreach ($terms as $term) {
                        //      echo $term->term_id;
                        //     if($id_term_curent === $term->term_id){
                        //         echo $term->description; 
                        //     }else{
                        //         echo '';
                        //     }
                        // }
                        ?>
                    </div>
                    <hr>
                    <?php
                    $id_my_term =  get_queried_object()->term_id;
                    // echo $id_my_term;
                    $args_ct = array(
                        'post_type' => 'courses',
                        'type' => 'post',
                        'order' => 'DESC',
                        'paged' => stheme_get_paged(),
                        'posts_per_page' => 6,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'courses-list',
                                'field' => 'term_id',
                                'terms' => $id_my_term
                            )
                        )
                    );
                    $the_query_ct = new WP_Query($args_ct);
                    // The Loop
                    if ($the_query_ct->have_posts()) : ?>
                        <div class="row">
                            <?php while ($the_query_ct->have_posts()) : $the_query_ct->the_post(); ?>
                                <div class="col-md-6 col-sm-12 col-xs-12 page-course__courses-list wow animate__animated animate__fadeIn">
                                    <div class="page-course__courses-class">
                                        <h2><?php the_title(); ?></h2>
                                        <div class="page-course__img-post-course">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail(); ?>
                                            </a>
                                            <div class="page-course__course-price wow animate__animated animate__slideInRight">
                                                <?php
                                                        $value_price_course = get_post_meta($post->ID, 'course_price', true);
                                                        if (!empty($value_price_course)) { ?>
                                                    <a href="<?php the_permalink() ?>"><?php echo $value_price_course; ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="page-course__short-text">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="page-course__read-more wow animate__animated animate__slideInRight">
                                            <a href="<?php the_permalink(); ?>" class="news-event__read-more page-course__link-read-more">Read more&emsp;<i class="fas fa-chevron-right discover__icon box-read__arrow-read"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php
                        stheme_paginate(array('query' => $the_query_ct));
                    endif;

                    // Reset Post Data
                    wp_reset_postdata();

                    ?>

                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
</div>
<!-- /.container -->
<?php get_footer() ?>
<?php //} 
?>