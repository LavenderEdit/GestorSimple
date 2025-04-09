export function setupCarouselEvents(carousel, animationHandler) {
  carousel.addEventListener("slid.bs.carousel", () => {
    setTimeout(animationHandler, 50);
  });
}
