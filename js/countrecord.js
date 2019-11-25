
var x = document.getElementById("pageBeginCountdown").value;
var time = 40;

ProgressCountdown(x, 'pageBeginCountdown', 'pageBeginCountdownText').then(value => record());

function ProgressCountdown(timeleft, bar, text) {
  return new Promise((resolve, reject) => {
    var countdownTimer = setInterval(() => {
      timeleft--;

      document.getElementById(bar).value = timeleft;
      document.getElementById(text).textContent = timeleft;

      if (timeleft <= 0) {
        clearInterval(countdownTimer);
        resolve(true);
      }
    }, 1000);
  });
}

function record() {
  startRecording();
  document.querySelector("#myText").innerHTML = "Recording..";
  document.querySelector("#pageBeginCountdownText").innerHTML = "";

  setTimeout(function() {
    stopRecording();
    document.querySelector("#myText").innerHTML = "Recording finished";
  }, x*1000);
}

/* PLAN B 
***** 
DO NOT DELETE THESE CODEs 
***** 
THESE CODE ARE COUNTDOWN TIMER WITH TRIGGERED BY BUTTON CLICK
*****

var audio = document.getElementById('player');
let time = 5;

btn.onclick = e => {
  // mark our audio element as approved by the user
  audio.play().then(() => { // pause directly
    audio.pause();
    audio.currentTime = 0;
  });
  countdown();
  btn.disabled = true;
};


function countdown() {
  pre.textContent = --time;
  if(time === 0) return onend();
  setTimeout(countdown, 1000);
}


function onend() {
  audio.play(); // now we're safe to play it
  time = 5;
  btn.disabled = false;
}
*/