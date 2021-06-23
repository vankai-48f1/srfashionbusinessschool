<?php get_header() ?>
<!-- Page Content -->
<div class="container">
  <div class="page-tag">
    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-2 mb-4 page-header">
          Thẻ:
          <small><?php single_tag_title() ?></small>
        </h1>

        <?php if (have_posts()) : ?>

          <?php while (have_posts()) : the_post(); ?>
            <div class="list-post-tag">
              <?php the_post_thumbnail() ?>
              <h2 class=""><?php the_title() ?></h2>
              <a href="<?php the_permalink() ?>" class="tag-read-more"><span>Read more</span> </a>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

        <!-- Pagination -->
        <?php mini_blog_pagination() ?>

      </div>
    </div>
    <!-- /.row -->
  </div>
</div>
<!-- /.container -->
<?php get_footer() ?>