<?php get_header() ?>
<section class="pd-mb-top">
    <div class="set-w">
        <div class="container">
            <div class="about-us">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <div class="about-us__breadcrumb">
                            <ul class="breadcrumb-fs">
                                <?php custom_breadcrumbs(); ?>
                            </ul>
                            <h1 class="about-us__title"><?php the_title(); ?></h1>
                            <div class="">
                                <?php //the_post_thumbnail(); 
                                        ?>
                            </div>
                        </div>
                        <div class="about-us__content">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>