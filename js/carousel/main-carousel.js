import { ANIMATION_CONFIG } from "./carousel-config.js";
import { resetAnimations, animateElements } from "./carousel-animations.js";
import { setupCarouselEvents } from "./carousel-events.js";
import { initializeCarouselItems } from "./carousel-init.js";

export function setupMainCarousel() {
  const carousel = document.getElementById("mainCarousel");
  if (!carousel) return;

  let isFirstCycle = true;

  function handleAnimation() {
    const activeSlide = document.querySelector(".carousel-item.active");
    if (!activeSlide) return;

    resetAnimations(activeSlide);

    if (activeSlide.classList.contains("active")) {
      animateElements(activeSlide, ANIMATION_CONFIG, isFirstCycle);
    }

    if (activeSlide.dataset.index === "0" && !isFirstCycle) {
      isFirstCycle = false;
    }
  }

  initializeCarouselItems(carousel);
  setupCarouselEvents(carousel, handleAnimation);

  setTimeout(handleAnimation, 300);
}
