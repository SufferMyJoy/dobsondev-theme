jQuery(document).ready(function($) {
  $('#toggle-mobile-menu').click(function(){
    if ($('#toggle-mobile-menu').hasClass('hidden')) {
      $('#toggle-mobile-menu').html('Hide Menu (-)');
      $('#toggle-mobile-menu').removeClass('hidden');
      $('#toggle-mobile-menu').addClass('showing');
      $('#mobile-menu-wrapper ul').find('li').show();
    } else {
      $('#toggle-mobile-menu').html('Show Menu (+)');
      $('#toggle-mobile-menu').removeClass('showing');
      $('#toggle-mobile-menu').addClass('hidden');
      $('#mobile-menu-wrapper ul').find('li').hide();
    }
  });
});