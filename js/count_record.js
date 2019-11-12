
function func () {
	var x = document.querySelector('#pageBeginCountdown').value;
    var countdownTimer = setInterval(function() {
    	x--;
        document.querySelector('#pageBeginCountdown').value = x;
        document.querySelector('#pageBeginCountdownText').innerHTML = x;
        
        if (x <= 0) {
        	clearInterval(countdownTimer);
            resolve(true);
        }
    },1000);
}

function myFunction() {
  alert("Hello! I am an alert box!");
}


/*
var x = document.querySelector("#pageBeginCountdown").value;
document.querySelector("pageBeginCountdownText").innerHTML = x;

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
**********************************************************************************************************************************
<!DOCTYPE html>
<html>
<body>

Downloading progress:
<progress value="5" max="10" id="prog">
</progress>
<button onClick="myFunction()">click</button>

<p id ="myText"><strong>Note:</strong> The progress tag is not supported in Internet Explorer 9 and earlier versions.</p>


<script>
function myFunction() {
var x = document.getElementById("prog").value;
  var countDown = setInterval(function() {
      x--;
        document.querySelector("#prog").value = x;
        document.querySelector("#myText").innerHTML = x;
        
        if (x <= 0) {
          clearInterval(countDown);
        }
    },1000);
}
</script>
</body>
</html>






*/