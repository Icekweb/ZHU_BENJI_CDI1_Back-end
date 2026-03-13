var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3, 
  spaceBetween: 30, 
  loop: true,       
  centerInsufficientSlides: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

const main = document.querySelector(".first-page-hero"); 

gsap.set(".first-page-hero", { perspective: 650 }); 

const outerRX = gsap.quickTo(".reveal-text", "rotationX", { ease: "power3" });
const outerRY = gsap.quickTo(".reveal-text", "rotationY", { ease: "power3" });
const innerX = gsap.quickTo(".reveal-text", "x", { ease: "power3" });
const innerY = gsap.quickTo(".reveal-text", "y", { ease: "power3" });

main.addEventListener("pointermove", (e) => {
  outerRX(gsap.utils.interpolate(15, -15, e.y / window.innerHeight));
  outerRY(gsap.utils.interpolate(-15, 15, e.x / window.innerWidth));
  innerX(gsap.utils.interpolate(-30, 30, e.x / window.innerWidth));
  innerY(gsap.utils.interpolate(-30, 30, e.y / window.innerHeight));
});

main.addEventListener("pointerleave", (e) => {
  outerRX(0);
  outerRY(0);
  innerX(0);
  innerY(0);
});