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

  <title>Reading&Writing:Fill in the blanks</title>

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
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Reading&Writing:Fill in the blanks</a>
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
              <a href="../r_fib/fib.php">Reading:Fill in the blanks</a>
              <a>Reading&Writing:Fill in the blanks</a>
              <a href="../rp/rp.php">Reorder Paragraph</a>
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
<h3>Below is a text with blanks. Click on each blank, a list of choice will appear. Select the appropriate answer choice for each blank.</h3>


<?php
$query = "SELECT * FROM rw_fib";

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
$q= "SELECT * from rw_fib where rw_fib_id = '$idnum[0]'";
$select = "SELECT * FROM rw_select WHERE rw_select_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');
$selectresult = mysqli_query($con,$select) or die ('Selection query failed');


$line = mysqli_fetch_array($result2);
$sline = mysqli_fetch_array($selectresult);


if (!empty($_POST['button'])){
switch ($_POST['button']){
case 'button1':
$counter = ($_POST['counter']);

$counter = $counter +1;
if ($counter > (count($idnum)-1)) { $counter = ((count($idnum)-1));}
$q= "SELECT * FROM rw_fib WHERE rw_fib_id = '$idnum[$counter]'";
$select = "SELECT * FROM rw_select WHERE rw_select_id = '$idnum[$counter]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');
$selectresult = mysqli_query($con,$select) or die ('Selection query failed');
break;
case 'button2':
$counter = ($_POST['counter']);

$counter = $counter -1;

if ($counter < 0){ $counter =0;}
$q= "select * from rw_fib where rw_fib_id = '$idnum[$counter]'";
$select = "SELECT * FROM rw_select WHERE rw_select_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');
$selectresult = mysqli_query($con,$select) or die ('Selection query failed');

break;
case 'button3':
// pressed first
$counter = 0;

$q= "select * from rw_fib where rw_fib_id = '$idnum[$counter]'";
$select = "SELECT * FROM rw_select WHERE rw_select_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');
$selectresult = mysqli_query($con,$select) or die ('Selection query failed');

break;
case 'button4':
//pressed last
$counter = (count($idnum)-1) ;


$q= "SELECT * FROM  rw_fib where rw_fib_id = '$idnum[$counter]'";
$select = "SELECT * FROM rw_select WHERE rw_select_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');
$selectresult = mysqli_query($con,$select) or die ('Selection query failed');

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
$scolumn = mysqli_fetch_row($selectresult);
echo "<th>$column[0] . $column[1]</th>";
echo "<br>";
echo "\t</tr>\n";
echo "</table>\n";

echo "\t\t<td>$column[2]</td>\n";

echo "<select>";
echo "<option value=''>&nbsp;</option>";
echo "<option value='$scolumn[2]'>$scolumn[2]</option>";
echo "<option value='$scolumn[3]'>$scolumn[3]</option>";
echo "<option value='$scolumn[4]'>$scolumn[4]</option>";
echo "<option value='$scolumn[5]'>$scolumn[5]</option>";
echo "</select>";
echo "\t\t<td>$column[3]</td>\n";
echo "<select>";
echo "<option value=''>&nbsp;</option>";
echo "<option value='$scolumn[6]'>$scolumn[6]</option>";
echo "<option value='$scolumn[7]'>$scolumn[7]</option>";
echo "<option value='$scolumn[8]'>$scolumn[8]</option>";
echo "<option value='$scolumn[9]'>$scolumn[9]</option>";
echo "</select>";
echo "\t\t<td>$column[4]</td>\n";
echo "<select>";
echo "<option value=''>&nbsp;</option>";
echo "<option value='$scolumn[10]'>$scolumn[10]</option>";
echo "<option value='$scolumn[11]'>$scolumn[11]</option>";
echo "<option value='$scolumn[12]'>$scolumn[12]</option>";
echo "<option value='$scolumn[13]'>$scolumn[13]</option>";
echo "</select>";
echo "\t\t<td>$column[5]</td>\n";
echo "<select>";
echo "<option value=''>&nbsp;</option>";
echo "<option value='$scolumn[14]'>$scolumn[14]</option>";
echo "<option value='$scolumn[15]'>$scolumn[15]</option>";
echo "<option value='$scolumn[16]'>$scolumn[16]</option>";
echo "<option value='$scolumn[17]'>$scolumn[17]</option>";
echo "</select>";
echo "\t\t<td>$column[6]</td>\n";
echo "<select>";
echo "<option value=''>&nbsp;</option>";
echo "<option value='$scolumn[18]'>$scolumn[18]</option>";
echo "<option value='$scolumn[19]'>$scolumn[19]</option>";
echo "<option value='$scolumn[20]'>$scolumn[20]</option>";
echo "<option value='$scolumn[21]'>$scolumn[21]</option>";
echo "</select>";
echo "\t\t<td>$column[7]</td>\n";
echo "<select>";
echo "<option value=''>&nbsp;</option>";
echo "<option value='$scolumn[22]'>$scolumn[22]</option>";
echo "<option value='$scolumn[23]'>$scolumn[23]</option>";
echo "<option value='$scolumn[24]'>$scolumn[24]</option>";
echo "<option value='$scolumn[25]'>$scolumn[25]</option>";
echo "</select>";
echo "\t\t<td>$column[8]</td>\n";
echo "<br";
echo "\t\t<td>$column[9]</td>\n";

echo "<br";
echo "<table>";
echo "<tr>";
echo "\t\t<td>$column[10]</td>\n";
echo "<br>";
echo "\t</tr>\n";
echo "</table>";
}
else echo "Record not found.\n";
mysqli_free_result($result2);
mysqli_close($con);
?>



<!-------------------------------------------------------------------------------
<p>
As the world focuses on the heart-wrenching losses and
<select name="answer">
	<option value="">&nbsp;</option>
	<option value="surprising" >surprising</option>
	<option value="heart-breaking" >heart-breaking</option>
	<option value="worst" >worst</option>
	<option value="unbelievable">unbelievable</option>
</select>
devastation of the recent earthquake in Haiti, researchers at Michigan Technological University, discuss what happened there and why. "Every disaster situation is different,' says Bill Rose, professor of petrology in the geological and mining engineering and sciences department. "Haiti sits on a major strike-slip fault, where one side
<select name="answer">
	<option value="">&nbsp;</option>
	<option value="pushes" class="intro-heading">pushes</option>
	<option value="moves" class="intro-heading">moves</option>
	<option value="slides" class="intro-heading">slides</option>
	<option value="overlaps" class="intro-heading">overlaps</option>
</select>
 one way, and one moves another." The Caribbean plate is moving eastward relative to the North American plate," explains Wayne Pennington, professor and chair of the department. “In Hispaniola, the island containing Haiti and the Dominican Republic, the plates are further 
 <select name="answer">
 	<option value="">&nbsp;</option>
 	<option value="moved" class="intro-heading">moved</option>
 	<option value="split" class="intro-heading">split</option>
 	<option value="pushed" class="intro-heading">pushed</option>
 	<option value="crumbled" class="intro-heading">crumbled</option>
 </select>
  into one or two little plate slivers, with a northern boundary near the northern shore of the island and a southern boundary along what is called the Enriquillo fault" Pennington says. 'It is this southern fault that ruptured during the earthquake. Stress had been 
<select name="answer">
	<option value="">&nbsp;</option>
	<option value="building" class="intro-heading">building</option>
	<option value="creating" class="intro-heading">creating</option>
	<option value="increasing" class="intro-heading">increasing</option>
	<option value="piling" class="intro-heading">piling</option>
</select>
 up here since the last large earthquake along that fault, in 1751”. “As geologists, we think in different time-frames," Rose says. “An occurrence of every 200-plus years is not long, when we talk in terms of millions of years." The fault is actually similar to the San Andreas Fault in California, Rose says. And one unique 
<select name="answer">
	<option value="">&nbsp;</option>
	<option value="process" class="intro-heading">process</option>
	<option value="quality" class="intro-heading">quality</option>
	<option value="characteristic" class="intro-heading">characteristic</option>
	<option value="feature" class="intro-heading">feature</option>
</select>
 of quakes like this is that they may occur in 'timed clusters" where, when one part releases, others close by may follow.</p> <br><br>
-------------------------------------------------------------------------------->



<script src="../../js/popup.js"></script>
<script src="../../js/drag.js"></script>

 <div class="popup" onclick="popupMsg()"> Answer <span class="popuptext" id="myPopup">1.heart-breaking<br>2.overlaps<br>3.crumbled<br>4.creating<br>5.characterstic</span>
 </div>

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