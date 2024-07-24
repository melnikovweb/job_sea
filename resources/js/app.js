import sideHeaderMenu from "./modules/side-menu.js";
import sideNavigation from "./modules/side-navigation";

window.addEventListener('load', () => {
  const menu = document.querySelector('.side-menu');
  menu && sideHeaderMenu(menu);
  if (document.body.classList.contains('home')) {
    setTimeout(sideNavigation, 1000);
  }
});
