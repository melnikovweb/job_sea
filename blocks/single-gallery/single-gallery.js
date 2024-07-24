import Swiper, { Pagination } from "swiper";
import "swiper/css/bundle";

export const swiper = new Swiper(".singleSwiper", {
  modules: [Pagination],
  pagination: {
    el: ".swiper-pagination",
  },
  slidesPerView: 1,
  spaceBetween: 20,
  loop: true,
  loopFillGroupWithBlank: true,
});

