<?php

$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Read Aloud</title>

  <!-- Custom fonts for this theme -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  
  <!-- Theme CSS -->
  <link href="../../css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/my_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
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
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Read Aloud</a>
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
                <a>Read Aloud</a>
                <a href="../../Speaking/di/di.html">Describe Image</a>
                <a href="../../Speaking/rs/rs.html">Repeat Sentence</a>
                <a href="../../Speaking/asq/asq.html">Answer Short Question</a>
                <a href="../../Speaking/rl/rl.html">Re-tell Lecture</a>
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
          <li ckass="nav-item mx-0 mx-lg-1">
            <div class="writingdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#writing">Writing <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="../../Writing/swt/swt.html">Summarize Written Text</a>
                <a href="../we/we.html">Write Essay</a>
              </div>
            </div>
          </li>  
        </ul>
      </div>
    </div>
	</nav>
	

<body>

<div class="section"> 
<div align="justify">
    <h5> Look at the text below. In 40 seconds, you must read this text aloud as naturally and clearly as possible. You have 40 seconds to read aloud.</h5>

        <div class="row begin-countdown">
          <div class="col-md-12 text-center">
              <progress value="40" max="40" id="pageBeginCountdown"></progress></br></br>
                <span id = "myText" style="color: red"> Prepare </span>
                  <span id ="pageBeginCountdownText" style="color: red"> 40 </span></br>
				  <script src="../../js/countdown.js"></script>
          </div>
        </div>
            
<?php
$query = "SELECT * FROM s_ra";

mysqli_query($con,$query) or die ('Error qury datab 1');

$result = mysqli_query($con,$query);



$counter = 0;
$incr1 = 0;
while ($incr1 < mysqli_num_rows($result)) {
$id = mysqli_fetch_row($result); //get first row data
$idnum[$incr1]= $id[0];
$incr1=($incr1+1);
}
$incr1=($incr1-1);
$q= "SELECT * from s_ra where ra_id = '$idnum[0]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');

$line = mysqli_fetch_array($result2);

if (!empty($_POST['button'])){
switch ($_POST['button']){
case 'button1':
$counter = ($_POST['counter']);

$counter = $counter + 1;
if ($counter > (count($idnum)-1)) { $counter = ((count($idnum)-1));}
$q= "select * from s_ra where ra_id = '$idnum[$counter]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');
break;
case 'button2':
$counter = ($_POST['counter']);

$counter = $counter -1;

if ($counter < 0){ $counter =0;}
$q= "select * from s_ra where ra_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button3':
// pressed first
$counter = 0;

$q= "select * from s_ra where ra_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button4':
//pressed last
$counter = (count($idnum)-1) ;


$q= "SELECT * FROM  s_ra where ra_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;

default:
$yes = 'yes default';
break;
}
}

if ($line) {

echo "<table>\n";
echo "\t<tr>\n";
$column = mysqli_fetch_row($result2);
echo "\t\t<td>$column[0] . $column[1]</td>\n";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "\t\t<td>$column[2]</td>\n";
echo "<br>";

echo "\t</tr>\n";
echo "</table>\n";
}
else echo "Record not found.\n";
mysqli_free_result($result2);
mysqli_close($con);

?>

</div>
            
			
	<div id="controls">
	<button id="recordButton" style="display:none;" >Record</button>
	<button id="pauseButton" disabled class="button">Pause</button>
	<button id="stopButton" disabled class="button">Stop</button>
					
<form action="ra.php" method="post">
<div>
<button type="submit" name="button" value="button2">Previous</button>
<button type="submit" name="button" value="button1">Next</button>
<button type="submit" name="button" value="button3">First</button>
<button type="submit" name="button" value="button4">Last</button>
<input type="hidden" name="counter" value="<?php print $counter; ?>" />
</div>
</form>
					
					<div class="popup" onclick="popupMsg()">Stress Guide
						<span class="popuptext" id="myPopup"style="height:200px; width:600px; text-align:left"> family morning front door neighbours gardens children</span>
					</div>
					<div class="popup" onclick="popupAns()">Pause Guide
						<span class="popuptext" id="mySecondPopup"  style="height:200px; width:600px; text-align:left">Imagine living all your life /as the only family on your street. Then,/ one morning,/ you open the front door and discover houses all around you./ You see neighbours tending their gardens and children walking to school./ Where did all the people come from? /What if the answer turned out to be that they had always been there —/ you just hadn't seen them? </p>
            
													
						</span>
					</div>
			</div></br>
			
			
				<div id="formats" style="padding-left: 250px">Your Recording:</div>
				<ol id="recordingsList"></ol>
</div>
</div>

  	 <script src="../js/recorder.js"></script>
  	 <script src="../js/record.js"></script>
	 <script src="../../js/popup.js"></script>

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