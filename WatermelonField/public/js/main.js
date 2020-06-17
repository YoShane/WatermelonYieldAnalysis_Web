/**
* Template Name: eStartup - v2.0.0
* Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
!(function($) {
  "use strict";

  $(window).scroll(function() {
    var height = $(window).height();
    var scroll = $(window).scrollTop();
    if (scroll) {
      $(".header-hide").addClass("scroll-header");
    } else {
      $(".header-hide").removeClass("scroll-header");
    }

  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {
      opacity: 'show'
    },
    speed: 400
  });

  // Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }

  // Smooth scroll for the menu and links with .scrollto classes
  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if (!$('#header').hasClass('header-fixed')) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Modal video
  new ModalVideo('.js-modal-btn', {
    channel: 'youtube'
  });

  // Init Owl Carousel
  $('.owl-carousel').owlCarousel({
    items: 4,
    autoplay: true,
    loop: true,
    margin: 30,
    dots: true,
    responsiveClass: true,
    responsive: {

      320: {
        items: 1
      },
      480: {
        items: 2
      },
      600: {
        items: 2
      },
      767: {
        items: 3
      },
      768: {
        items: 3
      },
      992: {
        items: 4
      }
    }
  });

})(jQuery);



/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#imageResult')
              .attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
  }
}

$(function () {
  $('#upload').on('change', function () {
      readURL(input);
  });
});

/*  ==========================================
  SHOW UPLOADED IMAGE NAME
* ========================================== */
if(document.body.contains(document.getElementById( 'upload' ))){
  var input = document.getElementById( 'upload' );
  var infoArea = document.getElementById( 'upload-label' );

  input.addEventListener( 'change', showFileName );
}

function showFileName( event ) {
var input = event.srcElement;
var fileName = input.files[0].name;
infoArea.textContent = 'File name: ' + fileName;
}

$("#list .mr-2.rounded.img-fluid").click(function() {
  $('#output_img').attr('src','http://163.18.42.219:5000/pic/'+$(this).parent().find("#picList").text());
   
  $('#model').modal('show');
   
  $('#count').text($(this).parent().find(".d-block.text-gray-dark").text());
  
  $('#price').text('Market value：'+ $(this).parent().find("#priceList").text());
  $('#processTime').text($(this).parent().find("#recTimeList").text()+ ' sec.');
  
  $('#totalProcessTime').text($(this).parent().find("#totalTimeList").text()+ ' sec.');
  });


  $(document).ready(function() {
      $('#example').DataTable( {
        "order": [[ 5, "desc" ]]
    } );
  } );
