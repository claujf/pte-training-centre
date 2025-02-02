<?php

$con = mysqli_connect("localhost","root","","pte");
if (!$con){
die("Can not connect: " . mysqli_error());
}
$query = "SELECT * FROM r_mcma";

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

  <title>Reading:Multiple Choice Multiple Answers</title>

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
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Reading: MCMA</a>
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
                <a href="../../Speaking/ra/ra.php">Read Aloud</a>
                <a href="../../Speaking/di/di.php">Describe Image</a>
                <a href="../../Speaking/rs/rs.php">Repeat Sentence</a>
                <a href="../../Speaking/asq/asq.php">Answer Short Question</a>
                <a href="../../Speaking/rl/rl.php">Re-tell Lecture</a>
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
              <a>Reading:Multiple Choice Multiple Answers</a>
              <a href="../../Reading/r_mcsa/r_mcsa.php">Reading:Multiple Choice Single Answer</a>
              </div>
            </div>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <div class="listeningdd">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#listening">Listening <i class="fa fa-caret-down"></i></a>
              <div class="dropdown-content">
                <a href="../../Listening/hiw/hiw.php">Highlight Incorrect Words</a>
                <a href="../../Listening/hcs/hcs.php">Highlight Correct Summary</a>
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
                <a href="../we/we.php">Write Essay</a>
              </div>
            </div>
          </li>  
        </ul>
      </div>
    </div>
	</nav>
<div class="section">
<div align="justify">
<h5>Read the text and answer the question by selecting all the correct responses. More than one response is correct.</h5>
  <!-- # Item number and item Title -->
  
  <!-- Timer -->
  <div style="color:red;">Remaining 
		<span id="time"></span> 
		<script src="../../js/timer60_sec.js"></script>
  </div>
	<br>
  <!-- questions -->
<?php
$counter = 0;
$incr1 = 0;
while ($incr1 < mysqli_num_rows($result)) {
$id = mysqli_fetch_row($result); //get first row data
$idnum[$incr1]= $id[0];
$incr1=($incr1+1);
}
$incr1=($incr1-1);
$q= "SELECT * from r_mcma where mcma_id = '$idnum[0]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');

$line = mysqli_fetch_array($result2);


if (!empty($_POST['button'])){
switch ($_POST['button']){
case 'button1':
$counter = ($_POST['counter']);

$counter = $counter +1;
if ($counter > (count($idnum)-1)) { $counter = ((count($idnum)-1));}
$q= "select * from r_mcma where mcma_id = '$idnum[$counter]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');
break;
case 'button2':
$counter = ($_POST['counter']);

$counter = $counter -1;

if ($counter < 0){ $counter =0;}
$q= "select * from r_mcma where mcma_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button3':
// pressed first
$counter = 0;

$q= "select * from r_mcma where mcma_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button4':
//pressed last
$counter = (count($idnum)-1) ;


$q= "SELECT * FROM  r_mcma where mcma_id = '$idnum[$counter]'";

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
echo "\t\t<td>$column[1]</td>\n";
echo "<br>";
echo "\t\t<td>$column[2]</td>\n";
echo "</br></br>";
echo "Question: \t\t<td>$column[3]</td>\n";
echo "<br>";
?>
<form action="/sstdata.php">
<input type="checkbox" name="Option1" value="Option1">
<?php
echo "A)\t\t<td>$column[4]</td>\n";
echo "<br>";
?>
<input type="checkbox" name="Option2" value="Option2">
<?php
echo "B)\t\t<td>$column[5]</td>\n";
echo "<br>";
?>
<input type="checkbox" name="Option3" value="Option3">
<?php
echo "C)\t\t<td>$column[6]</td>\n";
echo "<br>";
?>
<input type="checkbox" name="Option4" value="Option4">
<?php
echo "D)\t\t<td>$column[7]</td>\n";
echo "<br>";
?>
<input type="checkbox" name="Option5" value="Option5">
<?php
echo "E)\t\t<td>$column[8]</td>\n";
echo "<br>";
?>
<input type="checkbox" name="Option6" value="Option6">
<?php
echo "F)\t\t<td>$column[9]</td>\n";
echo "<br>";
?>
</form>
<input type="Submit" value="Submit" class="button"></input>
<div class="popup" onclick="popupMsg()"> Answer 
<span class="popuptext" id="myPopup"
<?php
echo "\t\t<td>$column[10]</td>\n";
echo "<br>";
}
else echo "Record not found.\n";
mysqli_free_result($result2);
mysqli_close($con);
?>
</span>
</div></br></br>

  <!-- options -->
  

<form action="r_mcma.php" method="post">
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

</head>
</html>