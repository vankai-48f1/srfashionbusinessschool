<?php
/*
*Template Name: Post courses
* Template Post Type: post
*/
?>
<?php get_header() ?>
<section class="pd-mb-top">
    <div class="set-w">
        <div class="container">
            <div class="about-us">
                <?php
                global $post;
                get_the_title($post->ID);
                //echo  get_post_type();
                ?>
                <script>
                    $(document).ready(function() {
                        $('input[name="title-post"]').val('<?php echo get_the_title($post->ID); ?>');
                    });
                </script>

                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <div class="about-us__breadcrumb">
                            <ul class="breadcrumb-fs">
                                <?php custom_breadcrumbs(); ?>
                            </ul>
                            <p><?php //echo get_the_category(11) 
                                ?> </p>
                            <h1 class="about-us__title"><?php the_title(); ?></h1>
                            <div class="page-news__description">
                                <p>
                                    <?php echo get_post_meta($post->ID, 'short_text', true); ?>
                                </p>
                            </div>
                        </div>
                        <div class="about-us__slider">
                            <!-- slider about us -->
                            <script src="<?php echo get_template_directory_uri() ?>/js/js-page/slider-about-us.js"></script>
                            <?php
                            if (have_rows('slider-top')) : ?>
                                <div class="aboutus-slider">
                                    <?php while (have_rows('slider-top')) : the_row();
                                        $img_sl_post = get_sub_field('img-slider-post'); ?>
                                        <div class="about-us__item-slider">
                                            <img src="<?php echo $img_sl_post['url']; ?>" alt="">
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php else :
                            // no rows found
                            endif; ?>
                        </div>
                        <div class="about-us__content">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                
                <div class="contact__form-contact">
                    <?php echo do_shortcode('[contact-form-7 id="610" title="Form Đăng Kí"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>