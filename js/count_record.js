/*
function func () {
	var x = document.querySelector("#pageBeginCountdown").value;
    var countdownTimer = setInterval(function() {
    	x--;
        document.querySelector("#pageBeginCountdown").value = x;
        document.querySelector('#pageBeginCountdownText').innerHTML = x;
        
        if (x <= 0) {
        	clearInterval(countdownTimer);
            resolve(true);
        }
    },1000);
    
}
*/

ProgressCountdown(x, 'pageBeginCountdown', 'pageBeginCountdownText');

function ProgressCountdown(timeleft, bar, text) {
  return new Promise((resolve, reject) => {
    var countdownTimer = setInterval(() => {
      timeleft--;

      document.querySelector(bar).value = timeleft;
      document.querySelector(text).textContent = timeleft;

      if (timeleft <= 0) {
        clearInterval(countdownTimer);
        resolve(true);
      }
    }, 1000);
  });
}
8?