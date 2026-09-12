import Swiper from 'swiper';
import { Navigation, Pagination, A11y } from 'swiper/modules';

document.addEventListener('DOMContentLoaded', () => {
  initHeader();
  initMenuOverlay();
  initRevealAnimations();
  initSwipers();
  initExperiences();
});

function initHeader() {
  const header = document.querySelector('[data-site-header]');
  if (!header) return;

  const update = () => header.classList.toggle('is-scrolled', window.scrollY > 80);
  update();
  window.addEventListener('scroll', update, { passive: true });
}

function initMenuOverlay() {
  const overlay = document.querySelector('[data-menu-overlay]');
  const openButton = document.querySelector('[data-menu-open]');
  const closeButton = overlay?.querySelector('[data-menu-close]');
  if (!overlay || !openButton || !closeButton) return;

  const navItems = [...overlay.querySelectorAll('.overlay-menu > li')];
  const images = [...overlay.querySelectorAll('[data-menu-image]')];
  let lastFocused = null;

  const setImage = (index) => {
    const safeIndex = Math.min(index, images.length - 1);
    images.forEach((image, imageIndex) => image.classList.toggle('is-active', imageIndex === safeIndex));
  };

  navItems.forEach((item, index) => {
    item.addEventListener('mouseenter', () => setImage(index));
    item.addEventListener('focusin', () => setImage(index));
  });

  const getFocusable = () => [...overlay.querySelectorAll('a[href], button:not([disabled])')]
    .filter((element) => element.offsetParent !== null);

  const openMenu = () => {
    lastFocused = document.activeElement;
    overlay.classList.add('is-open');
    overlay.setAttribute('aria-hidden', 'false');
    openButton.setAttribute('aria-expanded', 'true');
    document.body.classList.add('menu-open');
    setImage(0);
    window.setTimeout(() => closeButton.focus(), 50);
  };

  const closeMenu = () => {
    overlay.classList.remove('is-open');
    overlay.setAttribute('aria-hidden', 'true');
    openButton.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('menu-open');
    if (lastFocused instanceof HTMLElement) lastFocused.focus();
  };

  openButton.addEventListener('click', openMenu);
  closeButton.addEventListener('click', closeMenu);
  overlay.addEventListener('click', (event) => {
    if (event.target === overlay) closeMenu();
  });

  document.addEventListener('keydown', (event) => {
    if (!overlay.classList.contains('is-open')) return;
    if (event.key === 'Escape') {
      event.preventDefault();
      closeMenu();
      return;
    }
    if (event.key !== 'Tab') return;
    const focusable = getFocusable();
    if (!focusable.length) return;
    const first = focusable[0];
    const last = focusable[focusable.length - 1];
    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  });
}

function initRevealAnimations() {
  const elements = document.querySelectorAll('.reveal');
  if (!elements.length) return;

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
    elements.forEach((element) => element.classList.add('is-visible'));
    return;
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    });
  }, { rootMargin: '0px 0px -10% 0px', threshold: 0.12 });

  elements.forEach((element) => observer.observe(element));
}

function initSwipers() {
  const concierge = document.querySelector('.concierge-swiper');
  if (concierge) {
    new Swiper(concierge, {
      modules: [Navigation, A11y],
      slidesPerView: 1.15,
      spaceBetween: 18,
      navigation: { prevEl: '.concierge-prev', nextEl: '.concierge-next' },
      breakpoints: {
        640: { slidesPerView: 1.6, spaceBetween: 24 },
        1024: { slidesPerView: 1.85, spaceBetween: 28 },
      },
    });
  }

  const reviews = document.querySelector('.reviews-swiper');
  if (reviews) {
    new Swiper(reviews, {
      modules: [Pagination, A11y],
      slidesPerView: 1,
      spaceBetween: 40,
      autoHeight: true,
      pagination: { el: reviews.querySelector('.swiper-pagination'), clickable: true },
    });
  }

  const experienceMobile = document.querySelector('.experience-mobile-swiper');
  if (experienceMobile) {
    new Swiper(experienceMobile, {
      modules: [A11y],
      slidesPerView: 'auto',
      spaceBetween: 18,
    });
  }

  const villas = document.querySelector('.villas-swiper');
  if (!villas) return;
  let villasSwiper = null;
  const media = window.matchMedia('(max-width: 1024px)');
  const toggleVillasSwiper = () => {
    if (media.matches && !villasSwiper) {
      villasSwiper = new Swiper(villas, {
        modules: [A11y],
        slidesPerView: 1.25,
        spaceBetween: 16,
        breakpoints: { 640: { slidesPerView: 1.8, spaceBetween: 22 } },
      });
    } else if (!media.matches && villasSwiper) {
      villasSwiper.destroy(true, true);
      villasSwiper = null;
    }
  };
  toggleVillasSwiper();
  media.addEventListener('change', toggleVillasSwiper);
}

function initExperiences() {
  const tabs = [...document.querySelectorAll('[data-experience-tab]')];
  const imageTrack = document.querySelector('[data-experience-track]');
  if (!tabs.length) return;

  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      const index = Number(tab.dataset.experienceTab);
      tabs.forEach((candidate) => {
        const active = candidate === tab;
        candidate.setAttribute('aria-expanded', active ? 'true' : 'false');
        candidate.closest('.experience-tab')?.classList.toggle('is-open', active);
      });
      if (imageTrack) imageTrack.style.transform = `translateY(${-20 * index}%)`;
    });
  });
}
