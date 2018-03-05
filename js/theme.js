jQuery(document).ready(function($) {

  /* サブウインドウ表示 */
  $(".opensub").click(function(){
    window.open(this.href,"WindowName","width=520,height=520,resizable=yes,scrollbars=yes");
    return false;
  });


  $(window).on('scroll', function() {
    if ($(this).scrollTop() > 50) {
      $('.header-middle').addClass('fixed');
    } else {
      $('.header-middle').removeClass('fixed');
    }
  });


  $('.bxs-domesticflow').bxSlider({
    minSlides: 1,
    maxSlides: 1,
    slideMargin: 10,
    pager: true,
    controls: false
  });

  $('.bxs-studyprogram').bxSlider({
    minSlides: 2,
    maxSlides: 2,
    slideMargin: 10,
    pager: false,
    nextSelector: "#feed-next-btn",//オリジナルのナビエリアを、
    prevSelector: "#feed-prev-btn",//jQueryのセレクタで指定できる
    nextText: '&gt;',
    prevText: '&lt;',
    controls: true
  });

  $(window).on('load scroll', function() {
    var $scrPoint = $(window).scrollTop();
    if ( $scrPoint > 638 ) {
      $('#category-nav-box').addClass('fixed');
    } else {
      $('#category-nav-box').removeClass('fixed');
    }
  });



});