        var x = document.getElementById("pageBeginCountdown").value;
          var countDown = setInterval(function() {
            x--;
            document.querySelector("#pageBeginCountdown").value = x;
            document.querySelector("#pageBeginCountdownText").innerHTML = x;

            if (x <= 0 ) {
              clearInterval(countDown);
              startRecording();
            }
          },1000);