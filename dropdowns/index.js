$(function() {
  $('.dropdown ul li').on('click', function() {
    var label = $(this).parent().parent().children('label');
    label.attr('data-value', $(this).attr('data-value'));
    label.html($(this).html());

    $(this).parent().children('.selected').removeClass('selected');
    $(this).addClass('selected');
  });
    
    $('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
});

$(document).on('click', '.dropdown', function (e) {
  e.stopPropagation();
});