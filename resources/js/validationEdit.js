console.log('validaiton edit');

const input = document.querySelectorAll('input');
const addressEl = document.querySelector('#address');
const specializationEl = document.querySelectorAll('[id^="specialization-"]');

const form = document.getElementById('editForm');

const isRequired = value => value === '' ? false : true;

const isBetween = (length, min, max) => length < min || length > max ? false : true;

console.log(addressEl);
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
  const error = document.querySelector('.errorMessage');
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
  const error = document.querySelector('.errorMessage');
  error.textContent = '';
}

function showSpecializationError(message) {
  // get the form-field element
  const input = document.querySelector('.specialization_wrapper');

  // add error class 
  input.classList.add('specError');

  // show the error message
  const error = document.querySelector('.specialization_error_message');
  error.innerHTML = message;
}

function removeSpecializationError() {
  // get the form-field element
  const input = document.querySelector('.specialization_wrapper');

  // remove error class 
  input.classList.remove('specError');

  // hide the error message
  const error = document.querySelector('.specialization_error_message');
  error.innerHTML = '';
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

function checkSpecializations() {
  let valid = false;

  // console.log(specializationEl);

  // Convert the nodelist in array
  const specializationArray = Array.from(specializationEl);

  // Check if at least one element has the "checked" property
  const hasChecked = specializationArray.some(element => element.checked);

  console.log(hasChecked);

  if (!hasChecked) {
    // console.log('error');
    showSpecializationError('Select at least one specialization.');
  } else {
    // console.log('success');
    removeSpecializationError()
    valid = true;
  }


  return valid;
}

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

Array.from(specializationEl).forEach(element => {
  element.addEventListener('click', function (e) {
    checkSpecializations()
  })
});

form.addEventListener('input', debounce(function (e) {
  if (e.target.id === 'address') {
    checkAddress();
  }

}))

form.addEventListener('submit', function (e) {


  checkSpecializations();

  // validate forms
  let isAddressValid = checkAddress();
  let isSpecializationValid = checkSpecializations();


  let isFormValid = isAddressValid && isSpecializationValid;

  console.log(isAddressValid, isSpecializationValid)

  // submit to the server if the form is valid
  console.log(isFormValid);

  if (!isFormValid) {

    // prevent the form from submitting
    e.preventDefault();
  }
})


