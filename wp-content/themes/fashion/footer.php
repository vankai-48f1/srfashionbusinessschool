<!-- Footer -->

<footer>
  <section>
    <div class="goto-top">
      <div class="container">
        <div class="box-arrowicon">
          <span class="icon-arrowtop" id="scroll-top"><i class="fas fa-chevron-up"></i></span>
        </div>
      </div>
    </div>
  </section>

  <div class="footer set-w">
    <div class="container">
      <div class="footer-content">
        <div class="footer-top">
          <?php
          $label_social = get_theme_mod('Label_social');
          ?>
          <div class="footer-top__label">
            <?php echo $label_social ?>
          </div>
          <ul class="footer-top__social">
            <?php
            $icon_fb = get_theme_mod('Icon_fb');
            $link_fb = get_theme_mod('Link_fb');
            $icon_tw = get_theme_mod('Icon_tw');
            $link_tw = get_theme_mod('Link_tw');
            $icon_yt = get_theme_mod('Icon_yt');
            $link_yt = get_theme_mod('Link_yt');
            $icon_in = get_theme_mod('Icon_in');
            $link_in = get_theme_mod('Link_in');
            $icon_insta = get_theme_mod('Icon_insta');
            $link_insta = get_theme_mod('Link_insta');
            ?>
            <li class="footer-top__icon-social">
              <a href="<?= $link_fb ?>" class="footer-top__link-social">
                <i class="<?= $icon_fb; ?>"></i>
              </a>
            </li>
            <!--<li class="footer-top__icon-social">-->
            <!--  <a href="<?= $link_tw ?>" class="footer-top__link-social">-->
            <!--    <?= $icon_tw; ?>-->
            <!--  </a>-->
            <!--</li>-->
            <li class="footer-top__icon-social">
              <a href="<?= $link_yt; ?>" class="footer-top__link-social">
                <i class="<?= $icon_yt; ?>"></i>
              </a>
            </li>
            <li class="footer-top__icon-social">
              <a href="<?= $link_in; ?>" class="footer-top__link-social">
                <i class="<?= $icon_in; ?>"></i>
              </a>
            </li>
            <li class="footer-top__icon-social">
              <a href="<?= $link_insta; ?>" class="footer-top__link-social">
                <i class="<?= $icon_insta; ?>"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-middle">
          <nav>
            <?php
            wp_nav_menu(array(
              'theme_location'  => 'footer-nav', // Gọi menu đã đăng ký trong function
              'depth'           => 2,     // Cấu hình dropdown 2 cấp
              'container'       => false, // header-menuThẻ div bọc menu
              'menu_class'      => 'footer-menu-class', // Class của nav bootstrap
            ));
            ?>
          </nav>
        </div>
        <div class="footer-bottom">
          <div class="footer-bottom__left">
            <?php
            wp_nav_menu(array(
              'theme_location'  => 'copyright-menu', // Gọi menu đã đăng ký trong function
              'depth'           => 1,     // Cấu hình dropdown 2 cấp
              'container'       => false, // header-menuThẻ div bọc menu
              'menu_class'      => 'copyright-menu-class', // Class của nav bootstrap
            ));
            ?>

          </div>
          <div class="footer-bottom__right">
            <div class="footer-bottom__copyright">
              <?php $copyright = get_theme_mod('Copyright_content');
              echo $copyright;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

 <!-- jQuery library -->
<script src="<?php echo get_template_directory_uri() ?>/js/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- Popper JS -->
<script src="<?php echo get_template_directory_uri() ?>/js/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="<?php echo get_template_directory_uri() ?>/js/bootstrap.min.js"></script>
<!-- Slick -->
<script src="<?php echo get_template_directory_uri() ?>/slick/slick.js"></script>

<!-- dropdown menu -->
<script src="<?php echo get_template_directory_uri() ?>/js/js-home/toggle-panel.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/js-home/menu-dropdown.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/js-home/click-adclass.js"></script>

<!-- scroll nav -->
<?php if (is_front_page()) { ?>
  <script>
  (function($) {
    $(document).ready(function() {
      $(window).scroll(function() {
        if ($(window).width() > 1200) {
          var scrollBody = $('html,body').scrollTop();
          if (scrollBody > 2) {
            $('.nav__list').addClass('display-nav');
            $('.toggle-bar__button').addClass('off');
          } else {
            $('.nav__list').removeClass('display-nav');
            $('.toggle-bar__button').removeClass('off');
            $(".nav__white").removeClass("visible");
            $(".sub-menu").removeClass("visit-menu");
          }
        }
      });
    });
  })(jQuery)
  </script>
<?php } ?>


<!-- slick 1-->
<script src="<?php echo get_template_directory_uri() ?>/js/js-home/slider-primary.js"></script>
<!-- slick 2 -->
<script src="<?php echo get_template_directory_uri() ?>/js/js-home/slider-secondary.js"></script>
<!-- slick 3 -->
<script src="<?php echo get_template_directory_uri() ?>/js/js-home/slider-tertiary.js"></script>
<!-- slick 4 -->
<script src="<?php echo get_template_directory_uri() ?>/js/js-home/slider-fourth.js"></script>
<!--sticky about us-->
<script src="<?php echo get_template_directory_uri() ?>/js/js-page/sticky.js"></script>
<!-- WoW Animation -->
<script src="<?php echo get_template_directory_uri() ?>/js/wow.min.js"></script>
<script>
  new WOW().init();
</script>

<script>
  (function($) {
    $(document).ready(function() {
      if ($(window).width() > 900) {
        var widthTest = $('.slider-secondary__link-second img').offsetWidth;

        var widthSliderSecondItem = $('.slider-secondary__link-second img').width();
        var heightSliderSecondItem = (widthSliderSecondItem / 2) - 100 + 'px';
        $('.slider-secondary__item > a.slider-secondary__link-second').css('height', heightSliderSecondItem);
      } else {
        var widthSliderSecondItem = $('.slider-secondary__link-second img').width();
        var heightSliderSecondItem = (widthSliderSecondItem / 2) + 50 + 'px';
        $('.slider-secondary__item > a.slider-secondary__link-second').css('height', heightSliderSecondItem);
      }

      // <!-- go to top -->
      $('#scroll-top').click(function(event) {
        $('html , body').animate({
          scrollTop: 0
        }, 1000)
      });
    });
  })(jQuery)
</script>

<?php wp_footer() ?>
</body>

</html>