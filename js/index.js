let userBtn = document.querySelector('.navibar__user__btn');
let userOptions = document.querySelector('.navibar__user__options');

userBtn.addEventListener('click', function(e) {
  e.preventDefault();
  userOptions.classList.toggle('active');
});