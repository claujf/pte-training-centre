/******* BACKUP CODES DO NOT DELETE !!!!!!!
/*********************************************************************************


var prepCounter; // preparation time 3 seconds
var count; // answer time 40 seconds
var myTimer;
var prepCount;

function prepTimer(){
	prepCounter = 4;
	count = 41;
	prepCount = setInterval(startTimer,1000);
	function startTimer(){
		prepCounter--;
		if (prepCounter <= 0 ){
		clearInterval(prepCount);
		document.getElementById("timer").innerHTML = "Start Now";
		myTimer = setInterval(secondTimer,1000);
		secondTimer(counter);
		return;
		}
		document.getElementById("timer").innerHTML = prepCounter + " secs"; 
		startButton.disabled= true;

	document.getElementById("timer").innerHTML = prepCounter + " secs";
	startButton.disabled = true;
}
}

function secondTimer(counter)
{
	count--;
    if(count <= 0)
    {
    	clearInterval(myTimer);
	// do something here when timer ends
    	document.getElementById("secondTimer").innerHTML= "TIMES UP";
 	    return;
 	}
	
	document.getElementById("secondTimer").innerHTML = count + " secs";
}    

**************************************************************************************/

    var onFail = function(e) {
      console.log('Rejected!', e);
    };

    var onSuccess = function(s) {
      stream = s;
    }

    window.URL = window.URL || window.webkitURL;
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

    var stream;
    var audio = document.querySelector('audio');

    function startRecording() {
      if (navigator.getUserMedia) {
        navigator.getUserMedia({
          audio: true
        }, onSuccess, onFail);
      } else {
        console.log('navigator.getUserMedia not present');
      }
    }

    function stopRecording() {
      audio.src = window.URL.createObjectURL(stream);
    }

    $(function() {
      var max = 1; // PREPARATION PERIOD HERE 
      var count = max + 1;
      var counter = setInterval(timer, 1000);
      var val = document.querySelector(progress).value();
      alert(val);


      function timer() {
        count = count - 1;
        if (count <= 0) {
          clearInterval(counter);
          $(".recording_label").html("Recording...");
          $('.loader_bg1').css({
            'min-width': '' + (100) + '%'
          })
          startRecording();
          recordingSec(1); // Change recording duration HERE
          return;
        }
        $(".recording_label").html("Recording will begin in " + count + " sec.");
        var percent = (count / max) * 100;
        $('.loader_bg1').css({
          'min-width': '' + (100 - percent) + '%'
        })
      }
    });



    function recordingSec(sec) {
      var count = sec + 1;
      var counter = setInterval(timer, 1000);

      function timer() {
        count = count - 1;
        if (count <= 0) {
          clearInterval(counter);
          $(".recording_label").html("Recording stopped...Playing");
          $('.loader_bg1').css({
            'min-width': '' + (100) + '%'
          })
          stopRecording();
          return;
        }
        $(".recording_label").html("Recording started [ " + (sec - count) + " / " + sec + " ] sec.");
        var percent = (count / sec) * 100;
        $('.loader_bg1').css({
          'min-width': '' + (100 - percent) + '%'
        })
      }
    }
