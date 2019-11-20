
	var audio = document.getElementById("player");
	var x = document.getElementById("pageBeginCountdown").value;



ProgressCountdown(x, 'pageBeginCountdown', 'pageBeginCountdownText').then(value => record_progress());

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