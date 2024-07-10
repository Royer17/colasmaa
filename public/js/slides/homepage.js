const initSwipers = () => {
  const commonSwiperOpts = {
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 5000,
    },
    autoHeight: true,
    navigation: {
      nextEl: ".button-next",
      prevEl: ".button-prev",
    },
  };

  const commonSwiperOpts2 = {
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 5000,
    },
    autoHeight: true,
    navigation: {
      nextEl: ".button-next",
      prevEl: ".button-prev",
    },
    slidesPerView: 3, // Mostrar 3 slides por página
    spaceBetween: 5, // Espacio entre los slides
    breakpoints: {
      320: {
        slidesPerView: 1, // Mostrar 1 slide en dispositivos pequeños
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2, // Mostrar 2 slides en dispositivos medianos
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3, // Mostrar 3 slides en dispositivos grandes
        spaceBetween: 30,
      },
      
    },
  };
  const swiperThumbsOpts = {
    spaceBetween: 0,
    slidesPerView: 3,
    direction: "vertical",
    scrollbar: {
      el: ".swiper-scrollbar",
      draggable: true,
    },
  };

  const linksSwiperOpts = {
    ...commonSwiperOpts,
    slidesPerView: 4,
    spaceBetween: 10,
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
      640: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
    },
  };

  new Swiper(".main-swiper", commonSwiperOpts);

  const newsThumbSwiper = new Swiper(".news-thumb-swiper", swiperThumbsOpts);
  new Swiper(".news-swiper", {
    ...commonSwiperOpts,
    thumbs: {
      swiper: newsThumbSwiper,
    },
  });

  const worksThumbSwiper = new Swiper(".works-thumb-swiper", swiperThumbsOpts);
  new Swiper(".works-swiper", {
    ...commonSwiperOpts,
    thumbs: {
      swiper: worksThumbSwiper,
    },
  });

  new Swiper(".photo-gallery-swiper", commonSwiperOpts2);
  new Swiper(".links-swiper", linksSwiperOpts);
};

(() => {
  initSwipers();
})();
