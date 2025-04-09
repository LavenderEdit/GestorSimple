import { resetAnimations } from "./carousel-animations.js";
import { CAROUSEL_OPTIONS } from "./carousel-config.js";

export function initializeCarouselItems(carousel) {
  document.querySelectorAll(".carousel-item").forEach((item, index) => {
    item.dataset.index = index;
    const title = item.querySelector(".typewriter-title");
    const text = item.querySelector(".typewriter-text");

    if (title) title.dataset.originalText = title.textContent;
    if (text) text.dataset.originalText = text.textContent;

    resetAnimations(item);
  });

  return new bootstrap.Carousel(carousel, CAROUSEL_OPTIONS);
}
