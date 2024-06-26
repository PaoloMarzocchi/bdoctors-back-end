// Ottieni il valore di $remainingTime dal backend
let remainingTime = document.getElementById('remainingTime').innerHTML;

// Funzione per aggiornare il countdown
function updateCountdown() {
  let timeElement = document.getElementById('remainingTime');
  // console.log(timeElement);
  let timeParts = remainingTime.split(' ');

  // Estrai giorni, ore, minuti e secondi dall'array
  let days = parseInt(timeParts[0]);
  let hours = parseInt(timeParts[2]);
  let minutes = parseInt(timeParts[4]);
  let seconds = parseInt(timeParts[6]);

  // Aggiorna il countdown decrementando il tempo
  if (seconds > 0) {
    seconds--;

  } else {
    seconds = 59;
    if (minutes > 0) {
      minutes--;
    } else {
      minutes = 59;
      if (hours > 0) {
        hours--;
      } else {
        hours = 23;
        if (days > 0) {
          days--;
        } else {
          // Se il countdown è terminato, puoi gestire l'output qui
          clearInterval(countdownInterval);
          timeElement.innerText = "Expired";
          return;
        }
      }
    }
  }

  // Formatta il tempo rimanente
  remainingTime = days + " days " + hours + " hours " + minutes + " minutes " + seconds + " seconds";
  timeElement.innerText = remainingTime;
}

// Aggiorna il countdown ogni secondo
let countdownInterval = setInterval(updateCountdown, 1000);






/* ############## BEFORE ##################### */


// Oggetto per tenere traccia degli intervalli per ciascun countdown
/* let intervals = {}; */

// Funzione per aggiornare il countdown per un dato ID
/* function updateCountdown(id) {
  let countdownElement = document.getElementById('countdown-' + id);
  let secondsRemaining = parseInt(countdownElement.dataset.secondsRemaining);

  console.log(secondsRemaining);

  let hours = Math.floor(secondsRemaining / 3600);
  let minutes = Math.floor((secondsRemaining % 3600) / 60);
  let seconds = secondsRemaining % 60;

  let formattedHours = ('0' + hours).slice(-3);
  let formattedMinutes = ('0' + minutes).slice(-2);
  let formattedSeconds = ('0' + seconds).slice(-2);

  document.getElementById('hours-' + id).innerText = formattedHours;
  document.getElementById('minutes-' + id).innerText = formattedMinutes;
  document.getElementById('seconds-' + id).innerText = formattedSeconds;

  secondsRemaining--;

  if (secondsRemaining < 0) {
    clearInterval(intervals[id]);
    countdownElement.innerText = 'Sponsorship expired';
  } else {
    countdownElement.dataset.secondsRemaining = secondsRemaining;
  }
}
 */
// Funzione per inizializzare i countdown all'avvio della pagina
/* function initializeCountdowns() {

  let countdownElements = document.querySelectorAll('.countdown');

  countdownElements.forEach(function (countdownElement) {

    let id = countdownElement.id.replace('countdown-', '');

    intervals[id] = setInterval(function () { updateCountdown(id); }, 1000);

    updateCountdown(id); // Inizializza il countdown all'avvio

  });
}
 */
// Esegui l'inizializzazione dei countdown quando la pagina è completamente caricata
/* document.addEventListener('DOMContentLoaded', function () {
  initializeCountdowns();
}); */

// Esegui l'aggiornamento dinamico del countdown all'avvio
/* $(document).ready(function () {
  initializeCountdowns()
});; */
/* // Rileva l'URL dell'endpoint API dall'attributo data
var apiSponsorshipsUrl = apiSponsorshipsUrl || '';

// Funzione per aggiornare il countdown dinamicamente tramite AJAX
function updateCountdownsDynamic() {
  $.ajax({
    url: apiSponsorshipsUrl, // Utilizza l'URL dell'endpoint API
    type: 'GET',
    success: function (data) {

      var countdownElement = document.getElementById('countdown-' + data.id);
      console.log(countdownElement)
      console.log(data)
      countdownElement.dataset.secondsRemaining = data.time_remaining.total_seconds;
      updateCountdown(data.id);

    },
    complete: function () {
      // Richiama la funzione ogni secondo
      setTimeout(updateCountdownsDynamic, 1000);
    }
  });
}
*/
