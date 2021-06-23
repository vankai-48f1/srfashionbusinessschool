<?php get_header() ?>
<section class="pd-mb-top">
  <div class="set-w">
    <div class="container">
      <div class="about-us">
        <?php
        global $post;
        get_the_title($post->ID);
	    $cats = wp_get_post_categories(get_the_ID(), array('fields' => 'names'));
    	$cats[0];
		//echo $cats[0];
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
              <div class="">
                <?php //the_post_thumbnail(); ?>
              </div>
              <div class="page-news__description">
                <p><?php //the_excerpt(); ?></p>
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
      </div>
    </div>
  </div>
</section>
<?php get_footer() ?>