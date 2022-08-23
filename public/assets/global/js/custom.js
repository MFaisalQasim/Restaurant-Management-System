
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 15,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          1200: {
            slidesPerView: 3,
            spaceBetween: 10,
           },
          1199: {
           slidesPerView: 3,
           spaceBetween: 10,
          },
          1024: {
           slidesPerView: 3,
           spaceBetween: 10,
          },
          992: {
           slidesPerView: 3,
           spaceBetween: 10,
          },
          991: {
           slidesPerView: 2,
           spaceBetween: 30,
          },
          768: {
           slidesPerView: 2,
           spaceBetween: 30,
          },
          767: {
           slidesPerView:1,
           spaceBetween: 10,
          },
          736: {
            slidesPerView:1,
            spaceBetween: 10,
           },
           684: {
            slidesPerView:1,
            spaceBetween: 10,
           },
           640: {
            slidesPerView:1,
            spaceBetween: 10,
           },
           600: {
            slidesPerView:1,
            spaceBetween: 10,
           },
          320: {
            slidesPerView:1,
            spaceBetween: 10,
          },
          200: {
            slidesPerView:1,
            spaceBetween: 10,
          },
          
          
          }
      });