<?php
$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
$query = "SELECT * FROM s_rs";

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

  <title>Repeat Sentence</title>

  <!-- Custom fonts for this theme -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  
  <!-- Theme CSS -->
  <link href="../css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/my_style.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body id="page-top">

  <!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <div class="img">
      <a href ="../index.php">
        <img border="0" alt="homepage" src="../img/my_logo.jpeg" width="100" height="70">
      </a>
     </div>  
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Repeat Sentence</a>
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
                <a href="ra.php">Read Aloud</a>
                <a href="di.php">Describe Image</a>
                <a>Repeat Sentence</a>
                <a href="asq.php">Answer Short Question</a>
                <a href="rl.php">Re-tell Lecture</a>
                </div>
            </div>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <div class="readingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#reading">Reading <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
              <a href="../Reading/r_fib/fib.php">Reading:Fill in the blanks</a>
              <a href="../Reading/rw_fib/fib.php">Reading&Writing:Fill in the blanks</a>
              <a href="../Reading/rp/rp.php">Reorder Paragraph</a>
              <a href="../Reading/r_mcma/r_mcma.php">Reading:Multiple Choice Multiple Answers</a>
              <a href="../Reading/r_mcsa/r_mcsa.php">Reading:Multiple Choice Single Answer</a>
              </div>
            </div>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <div class="listeningdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#listening">Listening <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="../Listening/hiw/hiw.php">Highlight Incorrect Words</a>
                <a href="../Listening/hcs/hcs.php">Highlight the Correct Summary</a>
                <a href="../Listening/l_fib/l_fib.php">Listening:Fill in the blanks</a>
                <a href="../Listening/l_mcma/l_mcma.php">Listening:Multiple Choice Multiple Answers</a>
                <a href="../Listening/l_mcsa/l_mcsa.php">Listening:Multiple Choice Single Answer</a>
                <a href="../Listening/smw/smw.php">Select Missing Words</a>
                <a href="../Listening/sst/sst.php">Summarize Spoken Text</a>
                <a href="../Listening/wfd/wfd.php">Write From Dictation</a>
              </div>
            </div>
          </li>
          <li ckass="nav-item mx-0 mx-lg-1">
            <div class="writingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#writing">Writing <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="../Writing/swt/swt.php">Summarize Written Text</a>
                <a href="../we/we.php">Write Essay</a>
              </div>
            </div>
          </li>  
        </ul>
      </div>
    </div>
</nav>
<body>
<div class="section"> 

	<h5 align="justify">You will hear a sentence. Please repeat the sentence exactly as you hear it. You will hear the sentence only once.</h5>

		<div class="Center">
			<div class="content">
				<div class="row begin-countdown">
					<div class="col-md-12 text-center">
						<progress value="5" max="5" id="pageBeginCountdown"></progress></br></br>
						<span id = "myText" style="color: red"> Audio starts in </span>
						<span id ="pageBeginCountdownText" style="color: red"> 5 </span></br></br>
					</div>
				</div>

<?php
      $query = "SELECT * FROM s_rs";
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
            echo $counter;
          }

          if(isset($_POST["prev"])){
            if($counter > 0) {
              $counter--;
            } else {
              $counter = 0;
            }
            echo $counter;
          }
      }


      $audiomp3 = $array[$counter]['path'];

      $element = "";
      $element .= "<audio id = 'player' controls>";
      $element .= "<source src='audio/" . $audiomp3 . "' type = 'audio/mpeg'>";
      $element .= "Your browser does not support audio element.";
      $element .= "</audio>";

      echo $element . '<br/>';
    
?>				


	<div align="justify">
				<div id="controls">
					<button id="recordButton" style="display:none;" >Record</button>
					<button id="pauseButton" disabled class="button">Pause</button>
					<button id="stopButton" disabled class="button">Stop</button>
							<div class="popup" onclick="popupMsg()">Transcipt
								<span class="popuptext" id="myPopup"> <?php echo $array[$counter]['resen_answer'];?> </span>
							</div>
				</div></br>

	
				<div id="formats">Your Recording:</div>
				<ol id="recordingsList"></ol>
			
<form action="rs.php" method="post">
<div style="padding-left: 300px">
        <button type="submit" name ="prev" value="prev"> Previous </button>
        <button type="submit" name="next" value="next"> Next </button>
        <input type="hidden" name="counter" value="<?php print $counter; ?>"/>
</div>
</form>			
	</div>
	
  	<script src="../js/recorder.js"></script>
  	<script src="../js/record.js"></script>
	<script src="../js/popup.js"></script>
	<script src="../js/countdown.js"></script>
</div>
</div>

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

</body>
</html>