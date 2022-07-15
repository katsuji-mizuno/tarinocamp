let thumb = document.querySelector('.header__movie'),
    spThumb = document.querySelector('.spHeader__movie'),
    layer = document.querySelector('.movie'),
    video = layer.querySelector('iframe'),
    notScroll = (evt) => {
      evt.preventDefault();
    },
    positionTop,
    openModal = () => {
      document.addEventListener('wheel', notScroll, { passive: false });
      document.addEventListener('touchmove', notScroll, { passive: false });
      layer.style.top = `${positionTop}px`;
      layer.classList.remove('closed');
    };

thumb.addEventListener('click', () => {
  positionTop = window.scrollY;
  openModal();
});

spThumb.addEventListener('click', () => {
  positionTop = window.scrollY;
  openModal();
});

layer.addEventListener('click', () => {
  document.removeEventListener('wheel', notScroll, { passive: false });
  document.removeEventListener('touchmove', notScroll, { passive: false });
  layer.classList.add('closed');
});

video.addEventListener('click', (evt) => {
  evt.stopPropagation();
});
