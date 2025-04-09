export function resetAnimations(slide) {
  const title = slide.querySelector(".typewriter-title");
  const text = slide.querySelector(".typewriter-text");

  [title, text].forEach((el) => {
    if (!el) return;

    el.style.animation = "none";
    el.style.width = "0";
    el.style.opacity = "0";
    void el.offsetHeight;

    if (el.dataset.originalText) {
      el.textContent = el.dataset.originalText;
    }
  });
}

export function animateElements(activeSlide, config, isFirstCycle) {
  const title = activeSlide.querySelector(".typewriter-title");
  const text = activeSlide.querySelector(".typewriter-text");

  if (title) {
    title.style.animation = `typewriter-title ${config.title.duration}ms ${config.title.easing} forwards`;
  }

  if (text) {
    setTimeout(
      () => {
        text.style.animation = `typewriter-text ${config.text.duration}ms ${config.text.easing} forwards`;
      },
      isFirstCycle ? config.text.delay : 100
    );
  }
}
