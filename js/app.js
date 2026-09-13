document.addEventListener('DOMContentLoaded', () => {
  const loader = document.getElementById('pageLoader');
  const hideLoader = () => loader?.classList.add('is-hidden');

  window.setTimeout(hideLoader, 1250);
  window.addEventListener('load', () => window.setTimeout(hideLoader, 350), { once: true });

  document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener('click', (event) => {
      const target = document.querySelector(link.getAttribute('href'));
      if (!target) return;
      event.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });
});
