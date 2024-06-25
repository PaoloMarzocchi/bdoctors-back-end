
const passwordEl = document.querySelector('#password');
const showPasswordButton = document.querySelector('.showPassword');

showPasswordButton.addEventListener('click', function () {

  const showPassword = showPasswordButton.querySelector('.fa-eye');
  const hidePassword = showPasswordButton.querySelector('.fa-eye-slash');

  if (passwordEl.value != '') {
    if (passwordEl.type === 'password') {
      passwordEl.type = 'text';
      showPassword.classList.add('d-none');
      hidePassword.classList.remove('d-none');
    } else {
      passwordEl.type = 'password';
      showPassword.classList.remove('d-none');
      hidePassword.classList.add('d-none');
    }
  }
})