let userBtn = document.querySelector('.navibar__user__btn');
let userOptions = document.querySelector('.navibar__user__options');

if(userBtn) {
  userBtn.addEventListener('click', function(e) {
    e.preventDefault();
    userOptions.classList.toggle('navibar__user__options--active');
  });
}
