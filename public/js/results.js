let disabledBtns = document.querySelectorAll('.niveles__btns__btn--disabled');

disabledBtns.forEach(function(element) {
  element.addEventListener('click', function(e) {
    e.preventDefault();
  })
});