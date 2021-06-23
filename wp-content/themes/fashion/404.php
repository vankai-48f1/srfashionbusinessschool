<?php get_header() ?>
<section>
  <div class="pd-mb-top">
    <div class="page-404">
      <div class="set-w">
        <div class="container">
          <div class="content-404">
            <h1> Không tìm thấy trang: <span>Error 404</span></h1>
            <div class="pss-center-404">
              <p>
                Xin lỗi vì sự cố này! trang bạn đang tìm kiếm không tồn tại. Vui lòng tìm kiếm lại ở khung bên dưới.
              </p>
              <form action="<?php bloginfo('url'); ?>/">
                <div class="input-group">
                  <input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer() ?>