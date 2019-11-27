<?php

$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
$query = "SELECT * FROM w_swt";

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

  <title>Summarize Written Text</title>

  <!-- Custom fonts for this theme -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

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
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Summarize Written Text</a>
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
          <li ckass="nav-item mx-0 mx-lg-1">
            <div class="writingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#writing">Writing <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a>Summarize Written Text</a>
                <a href="we.php">Write Essay</a>
              </div>
            </div>
          </li>  
        </ul>
      </div>
    </div>
	</nav>
 


<div class="section"> 
<div align="justify">

	<h5>Read the passage below and summarize it using one sentence. Type your response in the box at the bottom of the screen. You have 10 minutes to finish this task. Your response will be judged on the quality of your writing and on how well your response presents the key points in the passage.</h5>
<div class="section2">
<?php
      $query = "SELECT * FROM w_swt";
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
    Question:<?php echo $array[$counter]['swt_id'] ?>  <?php echo $array[$counter]['swt_title']?> 
	</div>
  </tr>
</table></br>
    <p> <?php echo $array[$counter]['swt_paragraph'] ?> </p>
	
	<!--  action page is where the input going to be send to  -->
		<form action ="/action_page.php" style="height: 100px">
			Answer: 
			<span style="color:red; padding-left: 930px;">Remain:</span>
			<span id ="time" style="color:red"></span>
			<script src="../js/start.js"></script>
			<script src="../js/countdown.js"></script>
			<textarea id="text" id="text" style="width:1100px;height:150px; font-size:20px;"></textarea>
			<span id="wordCount">0</span> Character
			<script src="../js/word_count.js"></script>
		</form>
</div>
<form action="swt.php" method="post">
	<span style="padding-left:360px">
    <button type="submit" class="button" name ="prev" value="prev"> Previous </button>
    <button type="submit" class="button" name="next" value="next"> Next </button>
    <input type="hidden" name="counter" value="<?php print $counter; ?>"/>
	<input type="Submit" value="Submit" class="button"></input>
	</span>
</form>	

</div>		
</div></br></br></br>

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

</head>
</html>