<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Read Aloud</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../../css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/my_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Read Aloud</a>
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
                <a>Read Aloud</a>
                <a href="../di/di.php">Describe Image</a>
                <a href="../rs/rs.php">Repeat Sentence</a>
                <a href="../asq/asq.php">Answer Short Question</a>
                <a href="../rl/rl.php">Re-tell Lecture</a>
                </div>
            </div>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <div class="readingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#reading">Reading <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
              <a href="../../Reading/r_fib/fib.php">Reading:Fill in the blanks</a>
              <a href="../../Reading/rw_fib/fib.php">Reading&Writing:Fill in the blanks</a>
              <a href="../../Reading/rp/rp.php">Reorder Paragraph</a>
              <a href="../../Reading/r_mcma/r_mcma.php">Reading:Multiple Choice Multiple Answers</a>
              <a href="../../Reading/r_mcsa/r_mcsa.php">Reading:Multiple Choice Single Answer</a>
              </div>
            </div>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <div class="listeningdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#listening">Listening <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="../../Listening/hiw/hiw.php">Highlight Incorrect Words</a>
                <a href="../../Listening/hcs/hcs.php">Highlight the Correct Summary</a>
                <a href="../../Listening/l_fib/l_fib.php">Listening:Fill in the blanks</a>
                <a href="../../Listening/l_mcma/l_mcma.php">Listening:Multiple Choice Multiple Answers</a>
                <a href="../../Listening/l_mcsa/l_mcsa.php">Listening:Multiple Choice Single Answer</a>
                <a href="../../Listening/smw/smw.php">Select Missing Words</a>
                <a href="../../Listening/sst/sst.php">Summarize Spoken Text</a>
                <a href="../../Listening/wfd/wfd.php">Write From Dictation</a>
              </div>
            </div>
          </li>
          <li ckass="nav-item mx-0 mx-lg-1">
            <div class="writingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#writing">Writing <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="../../Writing/swt/swt.php">Summarize Written Text</a>
                <a href="../../Writing/we/we.php">Write Essay</a>
              </div>
            </div>
          </li>  
        </ul>
      </div>
    </div>
  </nav>
<body>

<div class = "section">
  <div class="Center"> 
    <h4 class="Center"> Look at the text below. In 40 seconds, you must read this text aloud as naturally and clearly as possible. You have 40 seconds to read aloud.</h4>
 
                <p class="Center">Imagine living all your life as the only family on your street. Then, one morning, you open the front door and discover houses all around you. You see neighbours tending their gardens and children walking to school. Where did all the people come from? What if the answer turned out to be that they had always been there — you just hadn't seen them? </p>

      <div class="Content">

              <div class="row begin-countdown">
                <div class="col-md-12 text-center">
                    <progress value="5" max="5" id="pageBeginCountdown"></progress><br>
                      <span id = "myText"> Audio starts in </span>
                        <span id ="pageBeginCountdownText"> 40 </span>
                </div>
              </div>

            <div id="controls">
             <button id="recordButton" style="display:none;" >Start</button>
             <button onclick="myFunction()">start</button>
             <button id="pauseButton" disabled>Pause</button>
             <button id="stopButton" disabled>Stop</button>
           </div>
           <div id="formats">Your Recording:</div>
           <ol id="recordingList"></ol>
      </div>

    <a class = "button" disabled>Previous</a>  
    <a href="ra1.php" class="button"> Next </a>
    </div>
</div>


  	 <script src="../../js/recorder.js"></script>
  	 <script src="../../js/record.js"></script>
     <script src="../../js/count_record.js"></script>


</body>
</html>