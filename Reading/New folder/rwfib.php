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
          <a class="navbar-brand js-scroll-trigger" href="#page-top">R&W:Fill in the blanks<a>
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
              <a href="rfib.php">Reading:Fill in the blanks</a>
              <a>Reading&Writing:Fill in the blanks</a>
              <a href="rp.php">Reorder Paragraph</a>
              <a href="r_mcma.php">Reading:Multiple Choice Multiple Answers</a>
              <a href="r_mcsa.php">Reading:Multiple Choice Single Answer</a>
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
                <a href="../Writing/swt.php">Summarize Written Text</a>
                <a href="../Writing/we.php">Write Essay</a>
              </div>
            </div>
          </li>  
        </ul>
      </div>
    </div>
	</nav>
<div class="section">
<div align="justify">
<h5>Below is a text with blanks. Click on each blank, a list of choice will appear. Select the appropriate answer choice for each blank.</h5>

<?php
      $query = "SELECT * FROM rw_fib";
      $squery = "SELECT * FROM rw_select";

      $array = array();
      $sarray = array();

      mysqli_query($con,$squery) or die ("error query select database");
      mysqli_query($con,$query) or die ('Error query database');

      $result = mysqli_query($con,$query);
      $sresult = mysqli_query($con,$squery);

      while($row = mysqli_fetch_array($result)){
        $array[] = $row; // store the database values in array
      }
      
      while($srow = mysqli_fetch_array($sresult)) {
        $sarray[] = $srow;
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




<td><?php echo $array[$counter]['rw_fib_part1'] ?> </td>
<select>
  <option value =''>&nbsp;</option>
  <option value ='<?php echo $array[$counter]['rw_select1'] ?>'><?php echo $sarray[$counter]['rw_select1'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select2'] ?>'><?php echo $sarray[$counter]['rw_select2'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select3'] ?>'><?php echo $sarray[$counter]['rw_select3'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select4'] ?>'><?php echo $sarray[$counter]['rw_select4'] ?></option>
</select>

<td><?php echo $array[$counter]['rw_fib_part2'] ?> </td>
<select>
  <option value =''>&nbsp;</option>
  <option value ='<?php echo $array[$counter]['rw_select5'] ?>'><?php echo $sarray[$counter]['rw_select_5'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select6'] ?>'><?php echo $sarray[$counter]['rw_select_6'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select7'] ?>'><?php echo $sarray[$counter]['rw_select_7'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select8'] ?>'><?php echo $sarray[$counter]['rw_select_8'] ?></option>
</select>
<td><?php echo $array[$counter]['rw_fib_part3'] ?> </td>
<select>
  <option value =''>&nbsp;</option>
  <option value ='<?php echo $array[$counter]['rw_select9'] ?>'><?php echo $sarray[$counter]['rw_select_9'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select10'] ?>'><?php echo $sarray[$counter]['rw_select_10'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select11'] ?>'><?php echo $sarray[$counter]['rw_select_11'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select12'] ?>'><?php echo $sarray[$counter]['rw_select_12'] ?></option>
</select>
<td><?php echo $array[$counter]['rw_fib_part4'] ?> </td>
<select>
  <option value =''>&nbsp;</option>
  <option value ='<?php echo $array[$counter]['rw_select13'] ?>'><?php echo $sarray[$counter]['rw_select_13'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select14'] ?>'><?php echo $sarray[$counter]['rw_select_14'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select15'] ?>'><?php echo $sarray[$counter]['rw_select_15'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select16'] ?>'><?php echo $sarray[$counter]['rw_select_16'] ?></option>
</select>
<td><?php echo $array[$counter]['rw_fib_part5'] ?> </td>
<select>
  <option value =''>&nbsp;</option>
  <option value ='<?php echo $array[$counter]['rw_select17'] ?>'><?php echo $sarray[$counter]['rw_select_17'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select18'] ?>'><?php echo $sarray[$counter]['rw_select_18'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select19'] ?>'><?php echo $sarray[$counter]['rw_select_19'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select20'] ?>'><?php echo $sarray[$counter]['rw_select_20'] ?></option>
</select>
<td><?php echo $array[$counter]['rw_fib_part6'] ?> </td>
<select>
  <option value =''>&nbsp;</option>
  <option value ='<?php echo $array[$counter]['rw_select21'] ?>'><?php echo $sarray[$counter]['rw_select_21'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select22'] ?>'><?php echo $sarray[$counter]['rw_select_22'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select23'] ?>'><?php echo $sarray[$counter]['rw_select_23'] ?></option>
  <option value ='<?php echo $array[$counter]['rw_select24'] ?>'><?php echo $sarray[$counter]['rw_select_24'] ?></option>
</select>
<td><?php echo $array[$counter]['rw_fib_part7'] ?> </td>




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



<script src="../js/popup.js"></script>
<script src="../js/drag.js"></script>

 <div class="popup" onclick="popupMsg()"> Answer <span class="popuptext" id="myPopup"><?php echo $array[$counter]['rw_fib_answer'] ?></span>
 </div>

<form action="rwfib.php" method="post">
<div>
<button type="submit" name="prev" value="prev" class="button">Previous</button>
<button type="submit" name="next" value="next" class="button">Next</button>
<input type="hidden" name="counter" value="<?php print $counter; ?>" />
</div>
</form>

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