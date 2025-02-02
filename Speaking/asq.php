<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
 $db = mysqli_connect('localhost','root','root','pte_db')
 or die('Error connecting to MySQL server.');

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
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <div class="img">
      <a href ="../index.php">
        <img border="0" alt="homepage" src="../img/my_logo.jpeg" width="100" height="70">
      </a>
     </div>  
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Answer Short Question</a>
          
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
                    <a href="rs.php">Repeat Sentence</a>
                    <a>Answer Short Question</a>
                    <a href="rl.php">Re-tell Lecture</a>
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
                    <a href="../Listening/hcs.php">Highlight the Correct Summary</a>
                    <a href="../Listening/l_fib.php">Listening:Fill in the blanks</a>
                    <a href="../Listening/l_mcma.php">Listening:Multiple Choice Multiple Answers</a>
                    <a href="../Listening/l_mcsa.php">Listening:Multiple Choice Single Answer</a>
                    <a href="../Listening/smw.php">Select Missing Words</a>
                    <a href="../Listening/sst.php">Summarize Spoken Text</a>
                    <a href="../Listening/wfd.php">Write From Dictation</a>
                  </div>
                </div>
              </li>
              <li class="nav-item mx-0 mx-lg-1">
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
        <a href="../logout.php" class="button"> Sign Out </a>
      </nav>
</body>

<div id = "page-container">
    <div class="section">


    <h5>You will hear a question. Please give a simple and short answer. Often just one or a few words is enough.</h5><br>
    <h5> Your student ID is: <b><?php echo htmlspecialchars($_SESSION["id"]); ?> </b>. </h5>


    <br>
    <div class="Center">
      <div class="content">
        <div class="row begin-countdown">
          <div class="col-md-12 text-center">
              <progress value="5" max="5" id="pageBeginCountdown"></progress><br>
                <span id = "myText"style="color: red"> Audio starts in </span>
                  <span id ="pageBeginCountdownText" style="color: red"> 5 </span>
          </div>
        </div>
           
     <!-- AUDIO FILES HERE --> 
      <?php
      $query = "SELECT * FROM s_asq";
      $array = array();

      mysqli_query($db,$query) or die ('Error query database');

      $result = mysqli_query($db,$query);

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
    Question:<?php echo $array[$counter]['asq_id'] ?>  
	</div>
  </tr>
</table>
<?php
		echo '<br/>';
      $audiomp3 = $array[$counter]['path'];

      $element = "";
      $element .= "<audio id = 'player' controls>";
      $element .= "<source src= '$audiomp3' type = 'audio/mpeg'>";
      $element .= "Your browser does not support audio element.";
      $element .= "</audio>";

      echo $element . '<br/>';
      ?>
<audio id = "beep">
  <source src="beep-07.wav">
</audio>


     <div id="controls">
       <button id="recordButton" style="display:none;" >Start</button>
       <button id="pauseButton" disabled class="button">Pause</button>
       <button id="stopButton" disabled class="button">Stop</button>
     </div>
  
    
  </div>
</div>

    <div class="main">
		<div class="left">
				<div class="popup" onclick="popupMsg()">Transcipt
					<span class="popuptext" id="myPopup"style="height:35px; width:600px; text-align:center"> <?php echo $array[$counter]['asq_transcript']; ?></span>
				</div>
				<div class="popup" onclick="popupAns()">Answer
					<span class="popuptext" id="mySecondPopup"><?php echo $array[$counter]['asq_answer']; ?></span>
				</div>
		</div>
       
		<div class="right">		
			<form action="asq.php" method="POST">
				<div>
					<button type="submit" class="button" name ="prev" value="prev"> Previous </button>
					<button type="submit" class="button" name="next" value="next"> Next </button>
					<input type="hidden" name="counter" value="<?php print $counter; ?>"/>
				</div>
			</form>
		</div>
	</div>

<?php 
/*
  $id = $_SESSION["id"];
  $name = $_SESSION["username"];
  
if(isset($_POST['submit'])) {
  $add = "INSERT INTO results (studentid,name,sectionid,submission ) VALUES ('$id', '$name', 'asq','$_POST[record]')";
  mysqli_query($db,$add);
} 
---------------------------------------------------------------------------------------
if(isset($_POST['Submit']))
{
$file_name = $_FILES['audio_file']['name'];

if($_FILES['audio_file']['type']=='audio/mpeg' || $_FILES['audio_file']['type']=='audio/mpeg3' || $_FILES['audio_file']['type']=='audio/x-mpeg3' || $_FILES['audio_file']['type']=='audio/mp3' || $_FILES['audio_file']['type']=='audio/x-wav' || $_FILES['audio_file']['type']=='audio/wav')
{ 
 $new_file_name=$_FILES['audio_file']['name'];

 // Where the file is going to be placed
 $target_path = "audio/".$new_file_name;
 
 //target path where u want to store file.

 //following function will move uploaded file to audios folder. 
if(move_uploaded_file($_FILES['audio_file']['tmp_name'], $target_path)) {

 //insert query if u want to insert file
}
}
}
*/


?> 


<form action="" method="POST" name="audio_form" id="audio_form" enctype="multipart/form-data">

	<div id="formats">Your Recording:</div>
						<ol name="record" id="recordingsList"></ol>	

<!--  <button type="submit" name="submit" value="submit">Submit</button>  -->
</form>


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

</div>
</html>