<?php

$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
$query = "SELECT * FROM s_rs";

mysqli_query($con,$query) or die ('Error qury datab');

$result = mysqli_query($con,$query);

$counter = 0;
$incr1 = 0;
while ($incr1 < mysqli_num_rows($result)) {
$id = mysqli_fetch_row($result); //get first row data
$idnum[$incr1]= $id[0];
$incr1=($incr1+1);
}
$incr1=($incr1-1);
$q= "SELECT * from s_rs where rs_id = '$idnum[0]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');

$line = mysqli_fetch_array($result2);


if (!empty($_POST['button'])){
switch ($_POST['button']){
case 'button1':
$counter = ($_POST['counter']);

$counter = $counter +1;
if ($counter > (count($idnum)-1)) { $counter = ((count($idnum)-1));}
$q= "select * from s_rs where rs_id = '$idnum[$counter]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');
break;
case 'button2':
$counter = ($_POST['counter']);

$counter = $counter -1;

if ($counter < 0){ $counter =0;}
$q= "select * from s_rs where rs_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button3':
// pressed first
$counter = 0;

$q= "select * from s_rs where rs_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button4':
//pressed last
$counter = (count($idnum)-1) ;


$q= "SELECT * FROM  s_rs where rs_id = '$idnum[$counter]'";

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
echo "<p>Click next to start your practice </p>";
echo "<table>\n";
echo "\t<tr>\n";
$column = mysqli_fetch_row($result2);
echo "\t\t<td>$column[0]</td>\n";
echo "\t\t<td>$column[1]</td>\n";
echo "\t\t<td>$column[2]</td>\n";
echo "<br>";

$element = "";
$element .="<audio controls>";
$element .= "<source src='audio/" . $column[2] . " ' type='audio/mpeg'>";
$element .= "Your browser does not support audio element.";
$element .= "</audio>";

echo $element . '<br/>';

echo "\t</tr>\n";
echo "</table>\n";
}
else echo "Record not found.\n";
mysqli_free_result($result2);
mysqli_close($con);
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
                <a href="../ra/ra.php">Read Aloud</a>
                <a href="../di/di.php">Describe Image</a>
                <a>Repeat Sentence</a>
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
<h3>You will hear a sentence. Please repeat the sentence exactly as you hear it. You will hear the sentence only once.</h3>

<audio controls>
<source src="audio/rs_1.mp3" type="audio/mpeg">
</audio>

<p id="timer"></p>
<p id="secondTimer"></p>

	<div id="controls">
  	 <button id="recordButton" onclick = "prepTimer();startRecording();">Record</button>
 	 <button id="pauseButton" disabled>Pause</button>
  	 <button id="stopButton" disabled onclick = "clearInterval(myTimer)">Stop</button>
    </div>
	
	<div id="formats">Format: sample rate:</div>
	<ol id="recordingsList"></ol>

<div class="popup" onclick="popupMsg()"> Show transcipt.
	<span class="popuptext" id="myPopup"> To measure distance could take as much as three weeks.</span>
</div>


<form action="rs.php" method="post">
<div>
<button type="submit" name="button" value="button2">Previous</button>
<button type="submit" name="button" value="button1">Next</button>
<button type="submit" name="button" value="button3">First</button>
<button type="submit" name="button" value="button4">Last</button>
<input type="hidden" name="counter" value="<?php print $counter; ?>" />
</div>
</form>

  	<script src="../../js/recorder.js"></script>
  	<script src="../../js/record.js"></script>
	<script src="../../js/timer.js"></script>
	<script>
	// answer popup
	function popupMsg(){
		var popup = document.getElementById("myPopup");
		popup.classList.toggle("show");
	}
	</script>

</body>
</html>