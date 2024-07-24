import {gsap, ScrollTrigger, ScrollToPlugin} from "gsap/all";
const sideNavigation = () => {
  const sideMain = document.querySelector("main.content-wrapper");
  const sideMainChildren = [...sideMain.children];

  if (!sideMainChildren.length || !sideMain) return;

  const sideNavigation = document.createElement('div');
  sideNavigation.className = "side-navigation";

  sideNavigation.innerHTML += `
  <div class="side-navigation">
    <ul class="side-navigation-list">
    ${sideMainChildren.map((item, index) => {
      return `<li class="side-navigation-item">
                  <a href="#side-${index + 1}" class="side-navigation-link" data-navigation-to></a>
              </li>`
      }).join("")}
      </ul>
    </div>`;

  sideMainChildren.forEach((item, index) => {
    item.setAttribute('data-navigation', 'side-' + (index + 1));
  })

  document.body.appendChild(sideNavigation);

  gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

  const siteNavigationLinks = gsap.utils.toArray(".side-navigation-list a");

  document.addEventListener('click', (e) => {
    if (e.target.dataset.navigationTo !== undefined) {
      e.preventDefault();
      const section = sideMainChildren.find(section => section.dataset.navigation === e.target.getAttribute("href").slice( 1 ));
      section && gsap.to(window, {duration: 1, scrollTo: section});
    }
  })

  function getContrastYIQ(color){
    const blue = 'rgb(35, 72, 145)';
    return (blue === color) ? 'white-list' : false;
  }

  const sections = gsap.utils.toArray("[data-navigation]");
  const navigationList = document.querySelector('.side-navigation-list');

  sections.forEach((section, i) => {
    ScrollTrigger.create({
      trigger: section,
      start: "top 43%",
      end: "bottom 43%",

      onEnter: () => {
       const sectionBg = window.getComputedStyle( sections[i] , null).getPropertyValue( 'background-color' );
        getContrastYIQ(sectionBg) ? navigationList.classList.add(getContrastYIQ(sectionBg)) : navigationList.classList.remove("white-list");
        gsap.set(".side-navigation-list a", { className:"side-navigation-link" });
        siteNavigationLinks[i].classList.add('active');
      },
      onEnterBack: () => {
        const sectionBg = window.getComputedStyle( sections[i] , null).getPropertyValue( 'background-color' );
        getContrastYIQ(sectionBg) ? navigationList.classList.add(getContrastYIQ(sectionBg)) : navigationList.classList.remove("white-list");
        gsap.set(".side-navigation-list a", { className:"side-navigation-link" });
        siteNavigationLinks[i].classList.add('active');
      },
    });
  });
}
export default sideNavigation;

