<?php get_header() ?>
<!-- Page Content -->
<!-- /.container -->

<section>
  <div class="pd-mb-top">
    <div class="set-w">
      <div class="page-search">
        <div class="container">

          <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
              <ul class="breadcrumb-fs">
                <?php custom_breadcrumbs(); ?>
              </ul>

              <h1 class="my-2 mb-4 page-header title-search">
                Tìm kiếm:
                <span><?php the_search_query(); ?></span>
              </h1>

              <?php if (have_posts()) : ?>
                <div class="row list-item-search">
                  <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/content', get_post_format());
                    ?>

                  <?php endwhile; ?>
                </div>
              <?php else : ?>

                <p>
                  Không có bài viết nào phù hợp với từ khóa: <strong><?php the_search_query(); ?></strong>
                </p>

                <form method="GET" action="<?php bloginfo('url'); ?>">
                  <div class="input-group">
                    <input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="submit">Go!</button>
                    </span>
                  </div>
                </form>
              <?php endif; ?>
              <!-- Pagination -->
              <?php mini_blog_pagination() ?>

            </div>

          </div>
          <!-- /.row -->

        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer() ?>