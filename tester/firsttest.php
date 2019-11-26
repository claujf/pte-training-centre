
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<body id="page-top">

        <div class="row begin-countdown">
          <div class="col-md-12 text-center">
              <progress value="5" max="5" id="pageBeginCountdown"></progress></br></br>
                <span id = "myText" style="color: red"> Prepare </span>
                <span id ="pageBeginCountdownText" style="color: red"> 5 </span></br>
          </div>
        </div>
                     			
	        <div id="controls">
					<button id="recordButton">Record</button>
					<button id="pauseButton" disabled class="button">Pause</button>
					<button id="stopButton" disabled class="button">Stop</button>					
			    </div></br>
			
				<div id="formats">Your Recording:</div>
				<ol id="recordingsList"></ol>			

<script src="/js/recorder.js"></script>
<script src="record2.js"></script>
<script src="/js/countrecord.js"></script>


</body>
</html>