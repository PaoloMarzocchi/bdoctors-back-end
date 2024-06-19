console.log('validaiton');

const input = document.querySelectorAll('input');
const nameEl = document.querySelector('#name');
const surnameEl = document.querySelector('#surname');
const addressEl = document.querySelector('#address');
const emailEl = document.querySelector('#email');
const passwordEl = document.querySelector('#password');
const passwordConfirmationEl = document.querySelector('#password_confirmation');
const specializationEl = document.querySelectorAll('[id^="specialization-"]');

const showPasswordButton = document.querySelector('.showPassword');
const showConfirmedPasswordButton = document.querySelector('.showConfirmedPassword');

const form = document.getElementById('registrationForm');


const isRequired = value => value === '' ? false : true;

const isBetween = (length, min, max) => length < min || length > max ? false : true;

function isEmailValid(email) {
  const regex = /^(([^<>()\[\]\\.,;:\s@"]+))@((([a-z\-0-9]+\.)+[a-z]{2,}))$/;

  /* Regex explanation:
      -'^' indicates the beginning of the string.
      - '$' indicates the end of the string.
      - '(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))' indicates the part before the '@'
        - '[^<>()\[\]\\.,;:\s@"]+' matches one or more characters that are not among the mentioned special characters.
      - '@' is the email symbol that separates the local part from the domain.
          -((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,})) handles domain names.
            - [a-zA-Z\-0-9]+ matches one or more alphanumeric characters or hyphens.
            - (\.[a-zA-Z\-0-9]+)* allows for additional subdomains (e.g., sub.domain.com).
            - [a-zA-Z]{2,} requires that the top-level domain (e.g., it, com, net, org) has at least two alphabetic characters.
  */

  return regex.test(email);
};

/* function isPasswordSecure(password) {
   const regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@?$%&*])(?=.{8,})");
   return regex.test(password);

  password = passwordEl.value;

  const min = 8;

  const regexWeak = /[a-z]/g;
  const regexMedium = /[A-Z]/g;
  const regexStrong = /[0-9]/g;
  const regexStronger = /.[@, $, !, %, *, ?, &, ^, #]/g;

  let passwordStrenght = 0;
  let regex = '';

  if (isBetween(password.trim().length, min)) {
    passwordStrenght++;
  } else if (regexWeak.test(password)) {
    passwordStrenght++;
  } else if (regexMedium.test(password)) {
    passwordStrenght++;
  } else if (regexStrong.test(password)) {
    passwordStrenght++;
  } else if (regexStronger.test(password)) {
    passwordStrenght++;
  }

  console.log(passwordStrenght);
  return passwordStrenght;
}; */

function showError(input, message) {

  // get the form-field element and icons
  const formField = input.parentElement;
  const successIcon = formField.querySelector('.fa-circle-check');
  const errorIcon = formField.querySelector('.fa-circle-exclamation');

  // add error class and icon
  input.classList.add('error');
  errorIcon.classList.remove('d-none');

  // remove success class and icon
  input.classList.remove('success');
  successIcon.classList.add('d-none');

  // show the error message
  const error = formField.querySelector('small');
  error.textContent = message;

};

function showSuccess(input) {

  // get the form-field element and icons
  const formField = input.parentElement;
  const successIcon = formField.querySelector('.fa-circle-check');
  const errorIcon = formField.querySelector('.fa-circle-exclamation');

  // add success class and icon
  input.classList.add('success');
  successIcon.classList.remove('d-none');

  // remove error class and icon
  input.classList.remove('error');
  errorIcon.classList.add('d-none');

  // hide the error message
  const error = formField.querySelector('small');
  error.textContent = '';
}

function checkName() {

  let valid = false;
  const min = 3,
    max = 25;
  const name = nameEl.value.trim();

  if (!isRequired(name)) {
    showError(nameEl, 'Name cannot be blank.');
  } else if (!isBetween(name.length, min, max)) {
    showError(nameEl, `Name must be between ${min} and ${max} characters.`)
  } else {
    showSuccess(nameEl);
    valid = true;
  }
  return valid;
}

function checkSurname() {

  let valid = false;
  const min = 3,
    max = 25;
  const surname = surnameEl.value.trim();

  if (!isRequired(surname)) {
    showError(surnameEl, 'Surname cannot be blank.');
  } else if (!isBetween(surname.length, min, max)) {
    showError(surnameEl, `Surname must be between ${min} and ${max} characters.`)
  } else {
    showSuccess(surnameEl);
    valid = true;
  }
  return valid;
}

function checkAddress() {
  let valid = false;
  const address = addressEl.value.trim();

  if (!isRequired(address)) {
    showError(addressEl, 'Address cannot be blank.');
  } else {
    showSuccess(addressEl);
    valid = true;
  }
  return valid;
}

function checkEmail() {
  let valid = false;
  const email = emailEl.value.trim();
  if (!isRequired(email)) {
    showError(emailEl, 'Email cannot be blank.');
  } else if (!isEmailValid(email)) {
    showError(emailEl, 'Email is not valid.')
  } else {
    showSuccess(emailEl);
    valid = true;
  }
  return valid;
}

/* function checkPassword() {
  let valid = false;

  const passwordRules = document.getElementById('passwordRules');
  const password = passwordEl.value.trim();

  const min = 8;

  const regexWeak = /[a-z]/;
  const regexMedium = /[A-Z]/;
  const regexStrong = /[0-9]/;
  const regexStronger = /[@$!%*?&^#]/;

  console.log(isBetween(password.length, min, Infinity));
  console.log(regexWeak.test(password));
  console.log(regexMedium.test(password));
  console.log(regexStrong.test(password));
  console.log(regexStronger.test(password));

  const weakRule = document.getElementById('weak');
  const weakIcon = weakRule.querySelector('.weakIcon');

  const mediumRule = document.getElementById('medium');
  const mediumIcon = mediumRule.querySelector('.mediumIcon');

  const strongRule = document.getElementById('strong');
  const strongIcon = strongRule.querySelector('.strongIcon');

  const strongerRule = document.getElementById('stronger');
  const strongerIcon = strongerRule.querySelector('.strongerIcon');

  const strongestRule = document.getElementById('strongest');
  const strongestIcon = strongestRule.querySelector('.strongestIcon');

  if (!isRequired(password)) {
    showError(passwordEl, 'Password cannot be blank.');
  } else if (!isBetween(password.length, min, Infinity)) {
    showError(passwordEl);
    weakIcon.classList.add('fa-triangle-exclamation');
    weakIcon.classList.remove('fa-circle-check', 'text-success');
    passwordRules.classList.remove('d-none');
  } else if (!regexWeak.test(password)) {
    showError(passwordEl);
    mediumIcon.classList.add('fa-triangle-exclamation');
    mediumIcon.classList.remove('fa-circle-check', 'text-success');
  } else if (!regexMedium.test(password)) {
    showError(passwordEl);
    strongIcon.classList.add('fa-triangle-exclamation');
    strongIcon.classList.remove('fa-circle-check', 'text-success');
  } else if (!regexStrong.test(password)) {
    showError(passwordEl);
    strongerIcon.classList.add('fa-triangle-exclamation');
    strongerIcon.classList.remove('fa-circle-check', 'text-success');
  } else if (!regexStronger.test(password)) {
    showError(passwordEl);
    strongestIcon.classList.add('fa-triangle-exclamation');
    strongestIcon.classList.remove('fa-circle-check', 'text-success');
  } else {
    weakIcon.classList.remove('fa-triangle-exclamation');
    mediumIcon.classList.remove('fa-triangle-exclamation');
    strongIcon.classList.remove('fa-triangle-exclamation');
    strongerIcon.classList.remove('fa-triangle-exclamation');
    strongestIcon.classList.remove('fa-triangle-exclamation');

    weakIcon.classList.add('fa-circle-check', 'text-success');
    mediumIcon.classList.add('fa-circle-check', 'text-success');
    strongIcon.classList.add('fa-circle-check', 'text-success');
    strongerIcon.classList.add('fa-circle-check', 'text-success');
    strongestIcon.classList.add('fa-circle-check', 'text-success');

    showSuccess(passwordEl);
    passwordRules.classList.add('passwordRulesSuccess');
    valid = true;
  }

  return valid;
} */

function toggleIcon(icon, isValid) {
  if (isValid) {
    icon.classList.remove('fa-triangle-exclamation');
    icon.classList.add('fa-circle-check', 'text-success');
  } else {
    icon.classList.remove('fa-circle-check', 'text-success');
    icon.classList.add('fa-triangle-exclamation');
  }
}

function checkPassword() {
  let valid = false;

  const passwordRules = document.getElementById('passwordRules');
  const password = passwordEl.value.trim();

  const min = 8;

  const regexWeak = /[a-z]/;
  const regexMedium = /[A-Z]/;
  const regexStrong = /[0-9]/;
  const regexStronger = /[@$!%*?&^#]/;

  const weakRule = document.getElementById('weak');
  const weakIcon = weakRule.querySelector('.weakIcon');

  const mediumRule = document.getElementById('medium');
  const mediumIcon = mediumRule.querySelector('.mediumIcon');

  const strongRule = document.getElementById('strong');
  const strongIcon = strongRule.querySelector('.strongIcon');

  const strongerRule = document.getElementById('stronger');
  const strongerIcon = strongerRule.querySelector('.strongerIcon');

  const strongestRule = document.getElementById('strongest');
  const strongestIcon = strongestRule.querySelector('.strongestIcon');

  // Controllo di tutte le regole e aggiornamento delle icone
  toggleIcon(weakIcon, isBetween(password.length, min, Infinity));
  toggleIcon(mediumIcon, regexWeak.test(password));
  toggleIcon(strongIcon, regexMedium.test(password));
  toggleIcon(strongerIcon, regexStrong.test(password));
  toggleIcon(strongestIcon, regexStronger.test(password));

  // Mostrare il div delle regole della password
  passwordRules.classList.remove('d-none');
  passwordRules.classList.add('passwordRulesDanger');

  // Verifica se tutte le regole sono soddisfatte
  if (!isRequired(password)) {
    showError(passwordEl, 'Password cannot be blank.');
    valid = false;
  } else if (!isBetween(password.length, min, Infinity) ||
    !regexWeak.test(password) ||
    !regexMedium.test(password) ||
    !regexStrong.test(password) ||
    !regexStronger.test(password)) {
    showError(passwordEl);
    passwordRules.classList.add('passwordRulesDanger');
    passwordRules.classList.remove('passwordRulesSuccess');
    valid = false;
  } else {
    showSuccess(passwordEl);
    passwordRules.classList.add('passwordRulesSuccess');

  }

  return valid;
}


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


function checkConfirmPassword() {
  let valid = false;

  // check confirm password
  const passwordConfirmation = passwordConfirmationEl.value.trim();
  const password = passwordEl.value.trim();

  if (!isRequired(passwordConfirmation)) {
    showError(passwordConfirmationEl, 'Password confirmation cannot be blank.');
  } else if (password !== passwordConfirmation) {
    showError(passwordConfirmationEl, 'Confirm password does not match');
  } else if (isRequired(password) && password == passwordConfirmation) {
    showSuccess(passwordConfirmationEl);
    valid = true;
  }

  return valid;
};

showConfirmedPasswordButton.addEventListener('click', function () {

  const showPassword = showConfirmedPasswordButton.querySelector('.fa-eye');
  const hidePassword = showConfirmedPasswordButton.querySelector('.fa-eye-slash');

  if (passwordConfirmationEl.value != '') {
    if (passwordConfirmationEl.type === 'password') {
      passwordConfirmationEl.type = 'text';
      showPassword.classList.add('d-none');
      hidePassword.classList.remove('d-none');
    } else {
      passwordConfirmationEl.type = 'password';
      showPassword.classList.remove('d-none');
      hidePassword.classList.add('d-none');
    }
  }
})

/* function checkSpecializations() {
  let valid = false;
  console.log(specializationEl);

  specializationEl.forEach(element => {
    if (!element.classList.contains('checked')) {
      showError(specializationEl, 'Name cannot be blank.');
    } else {
      // showSuccess(specializationEl);
      showError(specializationEl, 'Name cannot be blank.');
      valid = true;
    }
  });

  return valid;
} */

function debounce(fn, delay = 500) {

  let timeoutId;

  return (...args) => {
    // cancel the previous timer
    if (timeoutId) {
      clearTimeout(timeoutId);
    }
    // setup a new timer
    timeoutId = setTimeout(() => {
      fn.apply(null, args)
    }, delay);
  };
};

form.addEventListener('input', function (e) {
  // prevent the form from submitting
  e.preventDefault();


  switch (e.target.id) {
    case 'name':
      checkName();
      break;
    case 'surname':
      checkSurname();
      break;
    case 'address':
      checkAddress();
      break;
    case 'email':
      checkEmail();
      break;
    case 'password':
      checkPassword();
      break;
    case 'password_confirmation':
      checkConfirmPassword();
      break;
  }


  /*   switch (true) {
      case e.target.id === 'name':
        checkName();
        break;
      case e.target.id === 'surname':
        checkSurname();
        break;
      case e.target.id === 'email':
        checkEmail();
        break;
      case e.target.id === 'password':
        checkPassword();
        break;
      case e.target.id === 'password_confirmation':
        checkConfirmPassword();
        break;
      case e.target.id.includes('specialization-'):
             checkSpecializations();
            break; 
    } */



})

form.addEventListener('submit', function (e) {


  // validate forms
  let isNameValid = checkName();
  let isSurnameValid = checkSurname();
  let isAddressValid = checkAddress();
  let isEmailValid = checkEmail();
  let isPasswordValid = checkPassword();
  let isConfirmPasswordValid = checkConfirmPassword();
  // let isSpecializationValid = checkSpecializations();


  let isFormValid = isNameValid &&
    isSurnameValid &&
    isAddressValid &&
    isEmailValid &&
    isPasswordValid &&
    isConfirmPasswordValid;
  // isSpecializationValid;

  const submitButton = document.getElementById('submitButton');
  // submit to the server if the form is valid
  console.log(isFormValid);
  if (!isFormValid) {
    // prevent the form from submitting
    e.preventDefault();
  }
})


