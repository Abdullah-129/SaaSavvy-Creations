$(function () {

  "use strict";

  //=========MENU FIX JS=========
  if ($('.main_menu').offset() != undefined) {
    $(window).bind('scroll', function () {
      if ($(window).scrollTop() > 50) {
        $('.main_menu').addClass('menu_fix');
      } else {
        $('.main_menu').removeClass('menu_fix');
      }
    });
  }

  //=========VENOBOX JS=========
  $('.venobox').venobox();


  //*=====TESTIMONIAL SLIDER=====
  $('.test_slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    dots: true,
    arrows: false,

    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false,
        }
      }
    ]
  });


  //========COUNTER JS=========
  $('.counter').countUp();


  //=======AOS Animation========
  AOS.init();


  //========NICE SELECT========
  $('.select_js').niceSelect();


  //*==========SCROLL BUTTON==========
  $('.scroll_btn').on('click', function () {
    $('html, body').animate({
      scrollTop: 0,
    }, 2000);
  });

  $(window).on('scroll', function () {
    var scrolling = $(this).scrollTop();

    if (scrolling > 300) {
      $('.scroll_btn').fadeIn();
    }

    else {
      $('.scroll_btn').fadeOut();
    }
  });


  //*==========DASHBOARD ORDER HISTORY==========
  $(".view_invoice").on("click", function () {
    $(".wsus_dashboard_order").fadeOut();
  });

  $('.view_invoice').on('click', function () {
    $(".wsus__invoice").fadeIn();
  });

  $(".go_back").on("click", function () {
    $(".wsus_dashboard_order").fadeIn();
  });

  $(".go_back").on("click", function () {
    $(".wsus__invoice").fadeOut();
  });


  //*==========DASHBOARD EDIT HISTORY==========
  $(".edit_history").on("click", function () {
    $(".wsus_dash_ai_history_list").fadeOut();
  });

  $('.edit_history').on('click', function () {
    $(".wsus_dash_ai_history_edit").fadeIn();
  });

  $(".back_edit").on("click", function () {
    $(".wsus_dash_ai_history_list").fadeIn();
  });

  $(".back_edit").on("click", function () {
    $(".wsus_dash_ai_history_edit").fadeOut();
  });

  //======SUMMER NOTE JS======
  $(document).ready(function () {
    $('.summer_note').summernote();
  });

});
