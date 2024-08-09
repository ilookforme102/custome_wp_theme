jQuery(document).ready(function($) {
    $('.match_list').slick({
        slidesToShow: 4,
        slidesToScroll:2 ,
        autoplay: false,
        autoplaySpeed: 20000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: false,
              arrows: false
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          }
        ],
      }),
      $('.bottom-predict-container').slick({
        slidesToShow: 3,
        slidesToScroll:2 ,
        autoplay: false,
        autoplaySpeed: 20000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: false,
              arrows: false
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: false
            }
          }
        ],
      })
});
jQuery(document).ready(function($) {
  $('.tab-linkss li').on('click', function() {
      var tab_id = $(this).data('tab');
      $('#' + tab_id).addClass('actives').siblings().removeClass('actives');
      // Change/remove current tab to active
      $(this).addClass('actives').siblings().removeClass('actives');
  });
});
// jQuery(document).ready(function($) {
//   $('.menu-toggle').on('click', function() {
//       var $this = $(this);
//       var $menu = $('#primary-menu');
//       var expanded = $this.attr('aria-expanded') === 'true' || false;

//       $this.attr('aria-expanded', !expanded);
//       $menu.toggleClass('toggled');
//   });
// });
jQuery(document).ready(function($) {
  $('.menu-toggle').on('click', function() {
      // var $this = $(this);
      var $menu = $('.coblog-offcanvas-wrap');
      // var $toplogo = $('masthead .site-branding a')
      // $toplogo.addClass('logo-hide');
      //     transform: translate3d(350px, 0, 0); for $menu
      $menu.addClass('coblog-offcanvas-wrap-active');
      $('.coblog-close-canvas').addClass('coblog-offcanvas-close-active');
      $('.coblog-close-canvas').click(function(){
        $('.coblog-close-canvas').removeClass('coblog-offcanvas-close-active');
        $menu.removeClass('coblog-offcanvas-wrap-active');
      }
      );
      
  });
});