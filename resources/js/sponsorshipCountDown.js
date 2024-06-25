function updateCountdown() {
  var hoursElement = document.getElementById('hours');
  var minutesElement = document.getElementById('minutes');
  var secondsElement = document.getElementById('seconds');

  var hours = parseInt(hoursElement.innerText);
  var minutes = parseInt(minutesElement.innerText);
  var seconds = parseInt(secondsElement.innerText);

  if (hours === 0 && minutes === 0 && seconds === 0) {
    clearInterval(interval);
    document.getElementById('countdown').innerText = 'Sponsorship expired';
    return;
  }

  if (seconds === 0) {
    if (minutes === 0) {
      hours--;
      minutes = 59;
    } else {
      minutes--;
    }
    seconds = 59;
  } else {
    seconds--;
  }

  hoursElement.innerText = ('0' + hours).slice(-2) + ' hours ';
  minutesElement.innerText = ('0' + minutes).slice(-2) + ' minutes ';
  secondsElement.innerText = ('0' + seconds).slice(-2) + ' seconds';
}

// Esegui l'aggiornamento del countdown ogni secondo
var interval = setInterval(updateCountdown, 1000);
