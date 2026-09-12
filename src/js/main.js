/**
 * Main Theme JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {
  initMobileMenu();
  initDropdownMenus();
  initBackToTop();
});

/**
 * Accessible Mobile Navigation Drawer
 */
function initMobileMenu() {
  const toggleBtn = document.getElementById('mobile-menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  const closeBtn = document.getElementById('mobile-menu-close');

  if (!toggleBtn || !mobileMenu) return;

  const openMenu = () => {
    mobileMenu.classList.remove('hidden');
    toggleBtn.setAttribute('aria-expanded', 'true');
    document.body.classList.add('overflow-hidden');
  };

  const closeMenu = () => {
    mobileMenu.classList.add('hidden');
    toggleBtn.setAttribute('aria-expanded', 'false');
    document.body.classList.remove('overflow-hidden');
  };

  toggleBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
    if (isExpanded) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  if (closeBtn) {
    closeBtn.addEventListener('click', closeMenu);
  }

  // Close on Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
      closeMenu();
      toggleBtn.focus();
    }
  });

  // Close when clicking outside menu container
  document.addEventListener('click', (e) => {
    if (!mobileMenu.classList.contains('hidden') && !mobileMenu.contains(e.target) && !toggleBtn.contains(e.target)) {
      closeMenu();
    }
  });
}

/**
 * Dropdown Menus Keyboard & Click Accessibility
 */
function initDropdownMenus() {
  const menuItems = document.querySelectorAll('.menu-item-has-children');

  menuItems.forEach((item) => {
    const link = item.querySelector('a');
    const subMenu = item.querySelector('.sub-menu');

    if (!link || !subMenu) return;

    // Toggle dropdown button for mobile or keyboard
    const toggleButton = item.querySelector('.dropdown-toggle');
    if (toggleButton) {
      toggleButton.addEventListener('click', (e) => {
        e.preventDefault();
        const expanded = toggleButton.getAttribute('aria-expanded') === 'true';
        toggleButton.setAttribute('aria-expanded', !expanded);
        subMenu.classList.toggle('hidden');
      });
    }
  });
}

/**
 * Back to Top Smooth Scroll
 */
function initBackToTop() {
  const backToTop = document.getElementById('back-to-top');
  if (!backToTop) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
      backToTop.classList.remove('opacity-0', 'pointer-events-none');
      backToTop.classList.add('opacity-100');
    } else {
      backToTop.classList.add('opacity-0', 'pointer-events-none');
      backToTop.classList.remove('opacity-100');
    }
  });

  backToTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });
  });
}
