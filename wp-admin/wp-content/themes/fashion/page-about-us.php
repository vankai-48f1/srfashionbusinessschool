<?php
/*
Template Name: About Us
*/
?>

<?php get_header() ?>
<section class="pd-mb-top">
    <div class="set-w">
        <div class="container">
            <div class="about-us">
                <div class="about-us__breadcrumb">
                    <ul class="breadcrumb-fs">
                        <?php custom_breadcrumbs(); ?>
                    </ul>
                    <h1 class="about-us__title"><?php echo get_the_title(); ?></h1>
                </div>
                <div class="about-us__slider">
                    <!-- slider about us -->
                    <script src="<?php echo get_template_directory_uri() ?>/js/js-page/slider-about-us.js"></script>
                    <?php
                    if (have_rows('slider-about-us')) : ?>
                        <div class="aboutus-slider">
                            <?php while (have_rows('slider-about-us')) : the_row();
                                $sl_about_us = get_sub_field('slider-img'); ?>
                                <div class="about-us__item-slider">
                                    <img src="<?php echo $sl_about_us['url']; ?>" alt="">
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else :
                    // no rows found
                    endif; ?>
                </div>
                <div class="about-us__content">
                    <!-- Get post mặt định -->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile;
                    else : ?>
                        <p>Không có</p>
                    <?php endif; ?>
                    <!-- Get post mặt định -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>