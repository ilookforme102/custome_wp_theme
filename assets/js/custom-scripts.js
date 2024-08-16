jQuery(document).ready(function($) {
    $('.match_list').slick({
        slidesToShow: 4,
        slidesToScroll:2 ,
        autoplay: false,
        autoplaySpeed: 20000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        centerMode: true,
        centerPadding: '20px',
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2,
              infinite: true,
              dots: false,
              arrows: false
            }
          },
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
              arrows: false,
              centerMode: true,
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
      centerMode: true,
      centerPadding: '40px',
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
// jQuery(document).ready(function($) {
//   $('.menu-item-has-children > a').on('click', function(e) {
//       e.preventDefault(); // Prevent the default link behavior
//       $(this).next('.sub-menu').slideToggle(); // Toggle the sub-menu
//   });
// });
jQuery(document).ready(function($) {
  $('.coblog-offcanvas-wrap .menu-top-menu-container li.menu-item-has-children').click(function(e) {
      // e.preventDefault(); 


      // Toggle the active class on the clicked parent item
      $(this).toggleClass('active');

      // Slide toggle the sub-menu
      $(this).find('.sub-menu').slideToggle();
  });
});