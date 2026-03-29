export default function StatsBanner() {
  const banners = document.querySelectorAll('.stats-banner');
  if (!banners.length) return;

  /**
   * Animate only the numeric portions of a string from 0 → final value.
   * e.g. "17% CHEAPER" → animates "17", keeps "% CHEAPER" static.
   */
  function animateTitle(el) {
    const original = el.dataset.original;
    if (!original) return;

    // Find all numeric substrings and their positions
    const numRegex = /\d+(\.\d+)?/g;
    const matches = [];
    let match;
    while ((match = numRegex.exec(original)) !== null) {
      matches.push({ value: parseFloat(match[0]), start: match.index, end: match.index + match[0].length });
    }

    if (!matches.length) {
      el.textContent = original;
      return;
    }

    const duration = 1600;
    const startTime = performance.now();

    function easeOut(t) {
      return 1 - Math.pow(1 - t, 3);
    }

    function frame(now) {
      const elapsed = now - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const eased = easeOut(progress);

      // Rebuild the string replacing each number with its animated value
      let result = '';
      let lastIndex = 0;
      for (const m of matches) {
        result += original.slice(lastIndex, m.start);
        const current = m.value * eased;
        // Preserve decimal if original had one
        result += Number.isInteger(m.value) ? Math.round(current) : current.toFixed(1);
        lastIndex = m.end;
      }
      result += original.slice(lastIndex);
      el.textContent = result;

      if (progress < 1) requestAnimationFrame(frame);
    }

    requestAnimationFrame(frame);
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;

      const titles = entry.target.querySelectorAll('.stats-banner__item-title[data-original]');
      titles.forEach(animateTitle);

      observer.unobserve(entry.target);
    });
  }, { threshold: 0.3 });

  banners.forEach((banner) => observer.observe(banner));
}
