
var x = document.getElementById("pageBeginCountdown").value;
var fourty_sec = 40;

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
  }, fourty_sec * 1000);
}