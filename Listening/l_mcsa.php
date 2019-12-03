<?php

$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
$query = "SELECT * FROM l_mcsa";

mysqli_query($con,$query) or die ('Error qury datab 1');

$result = mysqli_query($con,$query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Listening:Multiple Choice Single Answer</title>

  <!-- Theme CSS -->
  <link href="../css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/my_style.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">


  <!-- Custom fonts for this theme -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>

<body id="page-top">
  <div id = "page-container">
  <!-- Navigation -->
 <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <div class="img">
      <a href ="../index.php">
        <img border="0" alt="homepage" src="../img/my_logo.jpeg" width="100" height="70">
      </a>
     </div>  
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Listening: MCSA</a>
          <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i> 
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <div class="speakingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#speaking">Speaking <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-content">
                <a href="../Speaking/ra.php">Read Aloud</a>
                <a href="../Speaking/di.php">Describe Image</a>
                <a href="../Speaking/rs.php">Repeat Sentence</a>
                <a href="../Speaking/asq.php">Answer Short Question</a>
                <a href="../Speaking/rl.php">Re-tell Lecture</a>
                </div>
            </div>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <div class="readingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#reading">Reading <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
              <a href="../Reading/fib.php">Reading:Fill in the blanks</a>
              <a href="../Reading/rw_fib.php">Reading&Writing:Fill in the blanks</a>
              <a href="../Reading/rp.php">Reorder Paragraph</a>
              <a href="../Reading/r_mcma.php">Reading:Multiple Choice Multiple Answers</a>
              <a href="../Reading/r_mcsa.php">Reading:Multiple Choice Single Answer</a>
              </div>
            </div>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <div class="listeningdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#listening">Listening <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="../Listening/hiw.php">Highlight Incorrect Words</a>
                <a href="../Listening/hcs.php">Highlight Correct Summary</a>
                <a href="../Listening/l_fib.php">Listening:Fill in the blanks</a>
                <a href="../Listening/l_mcma.php">Listening:Multiple Choice Multiple Answers</a>
                <a>Listening:Multiple Choice Single Answer</a>
                <a href="../Listening/smw.php">Select Missing Words</a>
                <a href="../Listening/sst.php">Summarize Spoken Text</a>
                <a href="../Listening/wfd.php">Write From Dictation</a>
              </div>
            </div>
          </li>
          <li ckass="nav-item mx-0 mx-lg-1">
            <div class="writingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#writing">Writing <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="../Writing/swt.php">Summarize Written Text</a>
                <a href="../Writing/we.php">Write Essay</a>
              </div>
            </div>
          </li>  
        </ul>
      </div>
    </div>
	</nav>
    <!----------------Building Connection with Database ----------------------------->

<div class="section">
<div align="justify">

<div id="content-wrap">	
<h5>Listen to the recording and answer the single-choice question by selecting the correct response . Only one response is correct.</h5>

<div class="row begin-countdown">
  <div class="col-md-12 text-center">
      <progress value="3" max="3" id="pageBeginCountdown"></progress><br>
        <span id = "myText"> Audio starts in </span>
          <span id ="pageBeginCountdownText"> 3 </span>
  </div>
</div>
 
 <!-- Timer -->
  <div style="color:red ;">Remaining 
		<span id="time"></span> 
		<script src="../js/timer60_sec.js"></script>
  </div>


<?php
      $query = "SELECT * FROM l_mcsa";
      $array = array();

      mysqli_query($con,$query) or die ('Error query database');

      $result = mysqli_query($con,$query);

      while($row = mysqli_fetch_array($result)){
        $array[] = $row; // store the database values in array
      }

      $counter = isset($_POST['counter']) ? $_POST['counter'] : 0;
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

          if(isset($_POST["next"])){
            if ($counter < (count($array)-1)) {
              $counter++;
            } else {
              $counter = (count($array)-1);
            }
            
          }

          if(isset($_POST["prev"])){
            if($counter > 0) {
              $counter--;
            } else {
              $counter = 0;
            }
            
          }
      }
?>
<table>
  <tr>
	<div style="font-weight: bold; font-size: 20px">
    Question:<?php echo $array[$counter]['l_mcsa_id'] ?>  <?php echo $array[$counter]['l_mcsa_question'] ?>
	</div>
  </tr>
</table></br>
<?php
      $audiomp3 = $array[$counter]['path'];

      $element = "<div align='center'>";
      $element .= "<audio id = 'player' controls>";
      $element .= "<source src= '$audiomp3' type = 'audio/mpeg'>";
      $element .= "Your browser does not support audio element.";
      $element .= "</audio>";
      $element .= "</br>";
      
      $element .= "</div></br>";

      echo $element . '<br/>';
?>		
		<div id="controls">
       <button id="recordButton" style="display:none;" >Start</button>
       <button id="pauseButton" style="display:none;">Pause</button>
       <button id="stopButton" style="display:none;">Stop</button>
     </div>	
	 
	 
	 
  <form action="/sstdata.php">
  <div style="font-size: 20px; height: 150px">
        <label>
         <input type="radio" name="question1" value="option1">A) <?php echo $array[$counter]['l_mcsa_option1'] ?>
         </label>
         <br>
         <label>
         <input type="radio" name="question1" value="option2">B) <?php echo $array[$counter]['l_mcsa_option2'] ?>
         </label>
         <br>
         <label>
         <input type="radio" name="question1" value="option3">C) <?php echo $array[$counter]['l_mcsa_option3'] ?>
         </label>
         <br>
         <label>
		 <input type="radio" name="question1" value="option4">D) <?php echo $array[$counter]['l_mcsa_option4'] ?>
         </label>
         <br>
		 </div>
  </form>
  <br><br>

 
  <!-- Submit, next, previous button -->
			
				<input type="Submit" value="Submit" class="button"></input>
				<div class="popup" onclick="popupMsg()"> Answer 
						<span class="popuptext" id="myPopup"><?php echo $array[$counter]['l_mcsa_answer'] ?></span>
				</div>

				
				
<form action="l_mcsa.php" method="post">
<div style="padding-left: 300px">
        <button class="button" type="submit" name ="prev" value="prev"> Previous </button>
        <button class="button" type="submit" name="next" value="next"> Next </button>
        <input type="hidden" name="counter" value="<?php print $counter; ?>"/>
</div>
</form>	
<script src="../js/record.js"></script>
   <script src="../js/popup.js"></script>
   <script src="../js/countdown.js"></script>
 </div>
</div>
 </div></br></br>
<div class="footer">

      <a href="https://www.mia.org.au/find-an-agent" target="_blank">
        <img src="../img/mara.png" border="0" alt="find-an-agent" width="150" height="120">
      </a>
      <a href="https://www.mia.org.au/" target="_blank">
        <img src="../img/mia.jpg" border="0" alt="mia" width="150" height="120">
      </a>

      <p>Contact us: <br>
      SCVI Migration Pty Ltd <br>
      COPYRIGHT <i class="fa fa-copyright"></i> 2019 ALL RIGHTS RESERVED @ SCVI Migration</p>
    </div>
 </div>
</body>
</html>