var owl = $('.rashi-slider');
owl.owlCarousel({
    margin: 10,
    nav: true,
    loop: true,
    responsive: {
        0: {
            items: 4
        },
        600: {
            items: 4
        },
        1000: {
            items: 4
        }
    }
})
var owl = $('.video-gallery-slider');
owl.owlCarousel({
    margin: 10,
    nav: true,
    loop: true,
    responsive: {
        0: {
            items: 2.5
        },
        600: {
            items: 2.5
        },
        1000: {
            items: 2.5
        }
    }
})
$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})

$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});


$("a[href='#top']").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});