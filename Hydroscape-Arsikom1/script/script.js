var swiper = new Swiper(".mySwiperHeader", {
    spaceBetween: 20,
    navigation: {
      nextEl: ".bx-chevron-right-circle",
      prevEl: ".bx-chevron-left-circle",
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
     },

     autoplay: {
        delay: 1200
    }
    
  });

$(document).ready(function(){
    $('.btn-slide1').click(function(){
        $('.btn-slide1').addClass('bxs-chevron-left-circle')
        $('.btn-slide2').removeClass('bxs-chevron-right-circle')

    })

    $('.btn-slide2').click(function(){
        $('.btn-slide2').addClass('bxs-chevron-right-circle')
        $('.btn-slide1').removeClass('bxs-chevron-left-circle')
    })
})

$(document).ready(() => {
    $(document).scroll(()=> {
        $('.navbar').toggleClass('shadow-sm scrolled', $(this).scrollTop() > $('.navbar').height())
    })
})



