document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.querySelector(".mobile-toggle");
  const menuWrap = document.querySelector(".nav-menu-wrap");
  if (toggle && menuWrap) {
    toggle.addEventListener("click", function () {
      menuWrap.classList.toggle("open");
    });
  }

  window.addEventListener('scroll', () => {
    document.body.classList.toggle('scrolled', window.scrollY > 10);
  });
});
