<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>
<section class="pd-mb-top">
    <div class="set-w">
        <div class="container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>

                    <div class="about-us contact">
                        <div class="about-us__breadcrumb">
                            <ul class="breadcrumb-fs">
                                <?php custom_breadcrumbs(); ?>
                            </ul>


                            <h1 class="about-us__title"><?php echo get_the_title(); ?></h1>
                            <div class="page-news__description">
                                <p>
                                    <?php echo get_post_meta($post->ID, 'description-contact', true) ?>
                                </p>
                            </div>
                        </div>
                        <div class="contact__form-contact">
                            <!-- <a href="#" class="contact__link-login-fb">
                                <div class="contact__box-login-fb">
                                    <span class="contact__text-icon-lg">Autofill withs</span><span class="contact__icon-fb-lg"><i class="fab fa-facebook-f"></i></span>
                                </div>
                            </a> -->
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer() ?>