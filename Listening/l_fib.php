<?php

$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
$query = "SELECT * FROM l_fib";

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

  <title>Listening:Fill in the blanks</title>

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
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Fill in the blanks</a>
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
                <a href="../Speaking/ra/ra.php">Read Aloud</a>
                <a href="../Speaking/di/di.php">Describe Image</a>
                <a href="../Speaking/rs/rs.php">Repeat Sentence</a>
                <a href="../Speaking/asq/asq.php">Answer Short Question</a>
                <a href="../Speaking/rl/rl.php">Re-tell Lecture</a>
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
                <a href="../Listening/hcs/hcs.php">Highlight Correct Summary</a>
                <a>Listening:Fill in the blanks</a>
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
    <!----------------Building Connection with Database ----------------------------->

<div class="section">
<div align="justify">
	<!-- Task and description -->
<h5>You will hear a recording. Type the missing words in each blank.</h5>
  <!-- # Item number and item Title -->
  <?php
$counter = 0;
$incr1 = 0;
while ($incr1 < mysqli_num_rows($result)) {
$id = mysqli_fetch_row($result); //get first row data
$idnum[$incr1]= $id[0];
$incr1=($incr1+1);
}
$incr1=($incr1-1);
$q= "SELECT * from l_fib where l_fib_id  = '$idnum[0]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');

$line = mysqli_fetch_array($result2);


if (!empty($_POST['button'])){
switch ($_POST['button']){
case 'button1':
$counter = ($_POST['counter']);

$counter = $counter +1;
if ($counter > (count($idnum)-1)) { $counter = ((count($idnum)-1));}
$q= "select * from l_fib where l_fib_id  = '$idnum[$counter]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');
break;
case 'button2':
$counter = ($_POST['counter']);

$counter = $counter -1;

if ($counter < 0){ $counter =0;}
$q= "select * from l_fib where l_fib_id  = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button3':
// pressed first
$counter = 0;

$q= "select * from l_fib where l_fib_id  = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button4':
//pressed last
$counter = (count($idnum)-1) ;


$q= "SELECT * FROM  l_fib where l_fib_id  = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;

default:
$yes = 'yes default';
break;
}
}
else
{
//$inc = 0;
}
if ($line) {


echo "\t<tr>\n";
$column = mysqli_fetch_row($result2);
echo "Question: \t\t<td>$column[0]</td>\n";
echo "<br>";


$array = array();

mysqli_query($con,$query) or die ('Error query database');

$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){
  $array[] = $row; // store the database values in array
}

$audiomp3 = $array[$counter]['path'];
$element = "";
$element .="<audio  controls>";
$element .= "<source src= '$audiomp3' type = 'audio/mpeg'>";
$element .= "Your browser does not support audio element.";
$element .= "</audio>";

echo $element . '<br/>';

echo "Title:\t\t<td>$column[1]</td>\n";
echo "<br>";
echo "\t\t<td>$column[2]</td>\n";
echo "\t</tr>\n";

}
else echo "Record not found.\n";
mysqli_free_result($result2);
mysqli_close($con);
?>	
  <!-- Timer -->
  <div style="color:red ; padding-right:200px">Remaining 
		<span id="time"></span> 
		<script src="../js/timer60_sec.js"></script>
  </div>
 
   <!-- Recording audio -->
  <audio autoplay id="player" controls style="padding-left: 320px">
  <source src="listening 1.mp3" type="audio/mpeg">
  <source src="listening 2.mp3" type="audio/mpeg">
  Your browser does not support the audio tag.
  </audio>
<div style="padding-bottom: 100px">  
  <!-- questions -->      
<p>The capital of Palestine is 
<input type="text" class="check003" id="input001" size="15" />
<text class="button002" id="check001"></text>, and the capital of Jordan is 
<input id="input002" size="15" />
<text class="button002" id="check002"></text>, and the capital of England is 
<input id="input003" size="15" /> 
<text class="button002" id="check003"></text> and the capital of Brazil is 
<input id="input004" size="15" />
<text class="button002" id="check004"></text>, and the capital of Canada is 
<input id="input005" size="15" />
<text class="button002" id="check005"></text>.</p>
</div>                      
    
 </br>

  <!-- Submit, next, previous button -->
	
			<input type="Submit" value="Submit" class="button"></input>

				<div class="popup" onclick="popupMsg()"> Answer 
						<span class="popuptext" id="myPopup">1.mostly<br>2.greater<br>3.packet<br>4.price<br>5.about</span>
				</div>

				<div class="popup" onclick="popupAns()"> Transcript 
					<span class="popuptext" id="mySecondPopup">1)"mainly" due to ecomomic...<br>2)society offered "growing" numbers...<br>3)the first "package" tour;...<br>4)the "cost" - travel;hotel and...<br>5)opportunity to travel "abroad".
					</span>
				</div>
	
<form action="l_fib.php" method="post">
<div style="padding-left: 300px">
<button type="submit" name="button" value="button3" class="button">First</button>
<button type="submit" name="button" value="button2"class="button">Previous</button>
<button type="submit" name="button" value="button1" class="button">Next</button>
<button type="submit" name="button" value="button4"class="button">Last</button>
<input type="hidden" name="counter" value="<?php print $counter; ?>" />
</div>
</form>	
</div>
</div>

<script src="../js/popup.js"></script>

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