$(document).ready( function() {

  var $count = $("#primary-menu").children().length;
  var $linkwidth = 100/$count;

  $(".menu-item").css({'width': $linkwidth + '%'});
});


