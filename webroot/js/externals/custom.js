$(function(){
    console.log($(".navbar-brand img").attr("src"));
    var num = 1;
    $('.navbar-brand img').attr("src","img/mk_logo_weiss_quer.png");
    
    $(window).scroll(function () { 
      num = $(window).scrollTop();
 
      if(num < 100){
        $('.navbar-brand img').attr("src","img/mk_logo_weiss_quer.png");
      }
      
      if(num >= 100){
        $('.navbar-brand img').attr("src","img/cropped-mk_logo_4c_quer-3.png");
      }
    });
 });