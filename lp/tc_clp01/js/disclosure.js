let targets = document.querySelectorAll('.qAndA__disclosure dt');

targets.forEach((target) => {
  target.addEventListener('click', () => {
    target.parentElement.classList.toggle('closed');
  });
});
