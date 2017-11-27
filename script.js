(function($){
  $(document).ready(function(){

    $('.owl-carousel').owlCarousel({
      items:1,
      loop:false,
      margin:10,
      nav:true,
      autoplay:true,
      rewind:true,
      smartSpeed:1000,
      navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
    });

    // Smooth scroll
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 500);
          return false;
        }
      }
    });

    // Sticky Post Nav
    $(window).scroll(function(){
      var scroll = $(window).scrollTop();

      console.log(scroll);
      if(scroll >= 240){
        $('.main-nav-post').removeClass('active');

      } else {
        $('.main-nav-post').addClass('active');
      }
    });

    $('.main-nav-post').fixTo('body', {
      top: 500
    });

    // top menu hover style
    $('#header .top-center ul.menu').addClass('top-menu');
    var $el, leftPos, newWidth, $mainNav = $(".top-menu");
        $mainNav.append("<li id='magic-line'></li>");
        var $magicLine = $("#magic-line");
        $magicLine
            .width($(".current_page_item").width())
            .css("left", $(".current_page_item").position().left)
            .data("origLeft", $magicLine.position().left)
            .data("origWidth", $magicLine.width());

        $(".top-menu li").hover(function() {
            $el = $(this);
            leftPos = $el.position().left;
            newWidth = $el.parent().width();
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth
            });
        }, function() {
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth")
            });
        });

        // Disable Right Click
      var message = "";
      function clickIE() {
          if (document.all) {
              (message);
              return false;
          }
      }

      function clickNS(e) {
          if (document.layers || (document.getElementById && !document.all)) {
              if (e.which == 2 || e.which == 3) {
                  (message);
                  return false;
              }
          }
      }
      if (document.layers) {
          document.captureEvents(Event.MOUSEDOWN);
          document.onmousedown = clickNS;
      } else {
          document.onmouseup = clickNS;
          document.oncontextmenu = clickIE;
      }

      document.oncontextmenu = new Function("return false")        


  });
}(jQuery));
