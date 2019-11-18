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

  <title>Reading:Fill in the blanks</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../../css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/my_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <link rel="stylesheet" type="text/css" href="../../css/drag.css">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Reading:Fill in the blanks</a>
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
              <a>Reading:Fill in the blanks</a>
              <a href="../rw_fib/fib.php">Reading&Writing:Fill in the blanks</a>
              <a href="../rp.php">Reorder Paragraph</a>
              <a href="../r_mcma/r_mcma.php">Reading:Multiple Choice Multiple Answers</a>
              <a href="../r_mcsa/r_mcsa.php">Reading:Multiple Choice Single Answer</a>
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
<h3>In the text below some words are missing. Drag words from the box below to the appropriate place in the text. To undo an answer choice, drag the word back to the box below the text.</h3>


<?php
$query = "SELECT * FROM r_fib";

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
$q= "SELECT * from r_fib where r_fib_id = '$idnum[0]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');

$line = mysqli_fetch_array($result2);


if (!empty($_POST['button'])){
switch ($_POST['button']){
case 'button1':
$counter = ($_POST['counter']);

$counter = $counter +1;
if ($counter > (count($idnum)-1)) { $counter = ((count($idnum)-1));}
$q= "select * from r_fib where r_fib_id = '$idnum[$counter]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');
break;
case 'button2':
$counter = ($_POST['counter']);

$counter = $counter -1;

if ($counter < 0){ $counter =0;}
$q= "select * from r_fib where r_fib_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button3':
// pressed first
$counter = 0;

$q= "select * from r_fib where r_fib_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button4':
//pressed last
$counter = (count($idnum)-1) ;


$q= "SELECT * FROM  r_fib where r_fib_id = '$idnum[$counter]'";

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

echo "<th>$column[0] . $column[1]</th>";
echo "<br>";
echo "\t</tr>\n";
echo "</table>\n";

echo "\t\t<td>$column[2]</td>\n";
echo "\t\t<td>$column[3]</td>\n";
echo "\t\t<td>$column[4]</td>\n";
echo "\t\t<td>$column[5]</td>\n";
echo "\t\t<td>$column[6]</td>\n";
echo "\t\t<td>$column[7]</td>\n";

echo "<br>";


echo "\t</tr>\n";
echo "</table>\n";
}
else echo "Record not found.\n";
mysqli_free_result($result2);
mysqli_close($con);
?>


<!----------------------------------------------------------------------------------------------------

From the time of the very earliest civilisations man has wondered about the world he lives in, about how it was created and about how it will end. In these distant times the sun was seen to make its daily 
	<div class='ans_container' ondrop="drop(event)" ondragover="allowDrop(event)">
	<span id="word1" draggable="true" ondragstart="drag(event)"></span> 
	</div>
across the sky. At night the moon appeared. Every new night the moon waxed or waned a little and on a few nights it did not appear at all. At night the great dome of the heavens was dotted with tiny specks of light. They 

	<div class='ans_container' ondrop="drop(event)" ondragover="allowDrop(event)">
	<span id="word2" draggable="true" ondragstart="drag(event)"></span> </div>

known as the stars. It was thought that every star in the heavens had its own purpose and that the 
	<div class='ans_container' ondrop="drop(event)" ondragover="allowDrop(event)">
	<span id="word3" draggable="true" ondragstart="drag(event)"></span></div> 

of the universe could be discovered by making a study of them. In was well know that there were wandering stars, they appeared in different nightly positions against their neighbours and they became known as planets. It took centuries, in fact it took millennia, for man to 
	<div class='ans_container' ondrop="drop(event)" ondragover="allowDrop(event)">
	<span id="word4" draggable="true" ondragstart="drag(event)"></span> 
	</div>
the true nature of these wandering stars and to evolve a model of the world to accommodate them and to
	<div class='ans_container' ondrop="drop(event)" ondragover="allowDrop(event)">
	<span id="word5" draggable="true" ondragstart="drag(event)"></span> 
	</div>
their positions in the sky. <br><br>

<div class="container" ondrop="drop(event)" ondragover="allowDrop(event)">
	<span id="routine" draggable="true" ondragstart="drag(event)">routine</span>
	<span id="identify" draggable="true" ondragstart="drag(event)">identify</span>
	<span id="find" draggable="true" ondragstart="drag(event)">find</span>
	<span id="findings" draggable="true" ondragstart="drag(event)">findings</span>
	<span id="journey" draggable="true" ondragstart="drag(event)">journey</span>
	<span id="became" draggable="true" ondragstart="drag(event)">became</span>
	<span id="predict" draggable="true" ondragstart="drag(event)">predict</span>
	<span id="determine" draggable="true" ondragstart="drag(event)">determine</span>
	<span id="secrets" draggable="true" ondragstart="drag(event)">secrets</span>
</div>
<br>
----------------------------------------------------------------------------------------------------->
<div class="popup" onclick="popupMsg()"> Answer. <span class="popuptext" id="myPopup">1.journey<br>2.became<br>3.secrets<br>4.determine<br>5.predict</span>
</div>
<br><br>
<a class="button" href="../../index.php">Previous</a>
<a class="button" href="fib1.php">Next</a>

<form action="fib.php" method="post">
<div>
<button type="submit" name="button" value="button2">Previous</button>
<button type="submit" name="button" value="button1">Next</button>
<button type="submit" name="button" value="button3">First</button>
<button type="submit" name="button" value="button4">Last</button>
<input type="hidden" name="counter" value="<?php print $counter; ?>" />
</div>
</form>

</body>
</html>