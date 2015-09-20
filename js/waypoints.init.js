var sticky = new Waypoint.Sticky(
{
  element: $('.site-header')[0],
  stuckClass: 'sticky',
  offset: '-100px',
  handler: function(direction) {
    if (direction == 'down') {

      $('.site-header').css('display', 'none').fadeOut(100, function() {
        if ($('.site-header').hasClass('unstuck')) {
          $(this).removeClass('unstuck');
        }
        $("#primary-menu > li.menu-item").css({'width': ''});
        $(this).fadeIn(250);
      });
    } else {
      $('.site-header').css('display','none').fadeIn(250);
      $(".site-header:not(.unstuck)").addClass('unstuck');
      $("#primary-menu > li.menu-item").css({'width': ''});
      var $windowWidth = $(window).width() / parseFloat($("body").css("font-size"));
      var $count = $("#primary-menu").children('.menu-item').length;
      var $linkwidth = 100/$count;
      if ($windowWidth >= 40.0625) {
        $("#primary-menu > li").css({'width': $linkwidth + '%'});
      }
    }
  }
})


