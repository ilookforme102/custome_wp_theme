jQuery(document).ready(function($) {
    $('.match_list').slick({
        slidesToShow: 3,
        slidesToScroll:2 ,
        autoplay: false,
        autoplaySpeed: 20000,
        arrows: false,
        dots: false,
        pauseOnHover: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: false,
              arrows: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrows: true
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
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true,
              dots: false,
              arrows: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 3,
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
