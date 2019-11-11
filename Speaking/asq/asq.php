<?php

$counter = isset($_POST['counter']) ? $_POST['counter'] : 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["next"])){
        $counter++;
        echo $counter;
    }

    if(isset($_POST["prev"])){
      $counter--;
      echo $counter;
    }
}
 $db = mysqli_connect('localhost','root','root','pte_db')
 or die('Error connecting to MySQL server.');

 $query = "SELECT * FROM s_asq";
$array = array();

mysqli_query($db,$query) or die ('Error query database');

$result = mysqli_query($db,$query);

while($row = mysqli_fetch_array($result)){
  $array[] = $row; // store the database values in array
}
echo $array[$counter]['path'] . '<br/>';
$audiomp3 = $array[$counter]['path'];

$element = "";
$element .= "<audio controls>";
$element .= "<source src= '$audiomp3' type = 'audio/mpeg'>";
$element .= "Your browser does not support audio element.";
$element .= "</audio>";

echo $element . '<br/>';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Answer Short Question</title>

  <!-- Theme CSS -->
  <link href="../../css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/my_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">


  <!-- Custom fonts for this theme -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <div class="img">
      <a href ="../../index.html">
        <img border="0" alt="homepage" src="../../img/my_logo.jpeg" width="100" height="70">
      </a>
     </div>  
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Answer Short Question</a>
          <!--
          <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i> 
          </button>-->
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mx-0 mx-lg-1">
                <div class="speakingdd">
                  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#speaking">Speaking <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-content">
                    <a href="../ra/ra.html">Read Aloud</a>
                    <a href="../di/di.html">Describe Image</a>
                    <a href="../rs/rs.html">Repeat Sentence</a>
                    <a>Answer Short Question</a>
                    <a href="../rl/rl.html">Re-tell Lecture</a>
                    </div>
                </div>
              </li>
              <li class="nav-item mx-0 mx-lg-1">
                <div class="readingdd">
                  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#reading">Reading <i class="fa fa-caret-down"></i></a>
                  <div class="dropdown-content">
                  <a href="../../Reading/r_fib/fib.html">Reading:Fill in the blanks</a>
                  <a href="../../Reading/rw_fib/fib.html">Reading&Writing:Fill in the blanks</a>
                  <a href="../../Reading/rp/rp.html">Reorder Paragraph</a>
                  <a href="../../Reading/r_mcma/r_mcma.html">Reading:Multiple Choice Multiple Answers</a>
                  <a href="../../Reading/r_mcsa/r_mcsa.html">Reading:Multiple Choice Single Answer</a>
                  </div>
                </div>
              </li>
              <li class="nav-item mx-0 mx-lg-1">
                <div class="listeningdd">
                  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#listening">Listening <i class="fa fa-caret-down"></i></a>
                  <div class="dropdown-content">
                    <a href="../../Listening/hiw/hiw.html">Highlight Incorrect Words</a>
                    <a href="../../Listening/hcs/hcs.html">Highlight the Correct Summary</a>
                    <a href="../../Listening/l_fib/l_fib.html">Listening:Fill in the blanks</a>
                    <a href="../../Listening/l_mcma/l_mcma.html">Listening:Multiple Choice Multiple Answers</a>
                    <a href="../../Listening/l_mcsa/l_mcsa.html">Listening:Multiple Choice Single Answer</a>
                    <a href="../../Listening/smw/smw.html">Select Missing Words</a>
                    <a href="../../Listening/sst/sst.html">Summarize Spoken Text</a>
                    <a href="../../Listening/wfd/wfd.html">Write From Dictation</a>
                  </div>
                </div>
              </li>
              <li class="nav-item mx-0 mx-lg-1">
                <div class="writingdd">
                  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#writing">Writing <i class="fa fa-caret-down"></i></a>
                  <div class="dropdown-content">
                    <a href="../../Writing/swt/swt.html">Summarize Written Text</a>
                    <a href="../../Writing/we/we.html">Write Essay</a>
                  </div>
                </div>
              </li>  
            </ul>
          </div>
        </div>
      </nav>





    <div class="section">

    <p>You will hear a question. Please give a simple and short answer. Often just one or a few words is enough.</p><br>



    <br>
    <div class="Center">
      <div class="content">
        <div class="row begin-countdown">
          <div class="col-md-12 text-center">
              <progress value="5" max="5" id="pageBeginCountdown"></progress><br>
                <span id = "myText"> Audio starts in </span>
                  <span id ="pageBeginCountdownText"> 5 </span>
          </div>
        </div>
           
     <!-- AUDIO FILES HERE --> 
     <audio id="player" controls >
      <source src="audio/d23310c5-6ddf-43be-a87a-4c5277b0b9d1.mp3" type="audio/mpeg">
    </audio>



     <div id="controls">
       <button id="recordButton" style="display:none;" >Start</button>
       <button id="pauseButton" disabled>Pause</button>
       <button id="stopButton" disabled>Stop</button>
     </div>
  
    <div id="formats">Your Recording:</div>
    <ol id="recordingsList"></ol>
  </div>
</div>

    <div class="main">
      <div class="left">
        <div class="popup" onclick="popupMsg()"> Show transcipt.
         <span class="popuptext" id="myPopup"> What stage is a ten-year old child in?</span>
        </div>
        <div class="popup" onclick="popupAns()">Show answer.
         <span class="popuptext" id="mySecondPopup">Adolescence</span>
        </div>
      </div>
        <div class="right">
           <a class="button" disabled>Previous</a>
           <a href="asq1.html" class="button">Next</a>
           <br>
        </div>
    </div>

<script type="text/javascript">
  var aud = document.getElementById('player');

  aud.onended = function(){
    startRecording();
  }
</script>

<script src="../../js/recorder.js"></script>
<script src="../../js/record.js"></script>
<script src="../../js/popup.js"></script>
<script src="../../js/countdown.js"></script>



</div>

    <div class="footer">

      <a href="https://www.mia.org.au/find-an-agent" target="_blank">
        <img src="../../img/mara.png" border="0" alt="find-an-agent" width="150" height="120">
      </a>
      <a href="https://www.mia.org.au/" target="_blank">
        <img src="../../img/mia.jpg" border="0" alt="mia" width="150" height="120">
      </a>

      <p>Contact us: <br>
      SCVI Migration Pty Ltd <br>
      COPYRIGHT <i class="fa fa-copyright"></i> 2019 ALL RIGHTS RESERVED @ SCVI Migration</p>

    </div>

    </body>
    </html>