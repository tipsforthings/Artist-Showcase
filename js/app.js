jQuery(document).foundation();

$(document).ready( function() {

  var $count = $("#primary-menu").children('.menu-item').length;
  var $linkwidth = 100/$count;

  var $windowWidth = $(window).width() / parseFloat($("body").css("font-size"));
  if ($windowWidth >= 40.0625) {
    $("#primary-menu > li.menu-item").css({'width': $linkwidth + '%'});
  }
});
$(window).resize( function() {

  var $count = $("#primary-menu").children('.menu-item').length;
  var $linkwidth = 100/$count;
  var $windowWidth = $(window).width() / parseFloat($("body").css("font-size"));

  if ($windowWidth >= 40.0625) {
    $("#primary-menu > li").css({'width': $linkwidth + '%'});
  }
  if ($windowWidth <= 40.0625) {
    $("#primary-menu > li.menu-item").css({'width': ''});
  }
});
