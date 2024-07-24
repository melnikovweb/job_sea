import Swiper, { Navigation } from 'swiper';

const updatesSlider = () => {
    const sliders = [...document.querySelectorAll(".updates-slider-updates.swiper")];
    if (!sliders.length) return;
      sliders.forEach(slider => {
       new Swiper (slider, {
        loop: true,
        modules: [Navigation],
        slidesPerView: 1,
        spaceBetween: 50,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          512: {
            slidesPerView: 2,
            spaceBetween: 50,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 50,
          },
        },
      })
    })
}
window.addEventListener('load', updatesSlider );
