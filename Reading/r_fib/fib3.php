<?php

$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
$query = "SELECT * FROM r_fib";

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

  <title>Reading:Fill in the blanks</title>

  <!-- Theme CSS -->
  <link href="../../css/freelancer.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/my_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <link rel="stylesheet" type="text/css" href="../../css/drag.css">
   


  <!-- Custom fonts for this theme -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  
  <style type="text/css">
/* draggable targets */
[data-draggable="target"]
{
  list-style-type:none;
  display: inline-block;
  
  width:140px;
  height:30px;

  
  margin:0 0.5em 0.5em 0;
 
  
  border:2px solid #888;
  border-radius:0.2em;
  
  background:#ddd;
  color:#555;
}

/* draggable items */
[data-draggable="item"]
{
  display:inline-block;
  list-style-type:none;
  
  margin:0 0 2px 0;
  padding:0.2em 0.4em;
  
  
  border-radius:0.2em;
  line-height:1.3;
  
}   
  </style>
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
          <a class="navbar-brand js-scroll-trigger" href="#page-top">Fill in the blanks<a>
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
                <a href="../../Speaking/ra/ra.html">Read Aloud</a>
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
              <a>Reading:Fill in the blanks</a>
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
                <a href="../../Listening/hcs/hcs.html">Highlight Correct Summary</a>
                <a href="../../Listening/l_fib/l_fib.html">Listening:Fill in the blanks</a>
                <a href="../../Listening/l_mcma/l_mcma.html">Listening:Multiple Choice Multiple Answers</a>
                <a href="../../Listening/l_mcsa/l_mcsa.html">Listening:Multiple Choice Single Answer</a>
                <a href="../../Listening/smw/smw.html">Select Missing Words</a>
                <a href="../../Listening/sst/sst.html">Summarize Spoken Text</a>
                <a href="../../Listening/wfd/wfd.html">Write From Dictation</a>
              </div>
            </div>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
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

<div class="section">
<div align="justify">
<h5>In the text below some words are missing. Drag words from the box below to the appropriate place in the text. To undo an answer choice, drag the word back to the box below the text.</h5>

<div style="color:red ; padding-right:200px">Remaining 
		<span id="time"></span> 
		<script src="../../js/timer60_sec.js"></script>
</div>

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
$column = mysqli_fetch_row($result2);

  echo "<table>\n";
  echo "\t<tr>\n";
  echo "\t\t<th>$column[0] . $column[1]</th>";
  echo "</br>";
  echo "</tr>";
  echo "</table>";

    
  echo "\t\t$column[2]" ;

  echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

  echo "\t\t$column[3]";

  echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

  echo "\t\t$column[4]";

  echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

  echo "\t\t$column[5]";
  echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

  echo "\t\t$column[6]";
  echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

  echo "\t\t$column[7]";
  echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

  echo "\t\t$column[8]";
  echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

  echo "\t\t$column[9]";
  echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

  echo "\t\t$column[10]";
  echo "\t\t$column[11]";

  echo "<br><br>";

  echo "<div data-draggable='target'><div data-draggable='item'>$column[12]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[13]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[14]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[15]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[16]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[17]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[18]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[19]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[20]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[21]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[22]</div></div>";
  echo "<div data-draggable='target'><div data-draggable='item'>$column[23]</div></div>";

  echo "</tr>";
  echo "</table>";
}
else echo "Record not found.\n";
mysqli_free_result($result2);
mysqli_close($con);
?>


				
						<input type="Submit" value="Submit" class="button"></input>
							<div class="popup" onclick="popupMsg()"> Answer 
									<span class="popuptext" id="myPopup">
										<?php echo "\t\t<td>$column[24]</td>\n";
										?>
									</span>
							</div>	

<br><br>
<script type="text/javascript">
(function()
{

  //exclude older browsers by the features we need them to support
  //and legacy opera explicitly so we don't waste time on a dead browser
  if
  (
    !document.querySelectorAll 
    || 
    !('draggable' in document.createElement('span')) 
    || 
    window.opera
  ) 
  { return; }
  
  //get the collection of draggable items and add their draggable attribute
  for(var 
    items = document.querySelectorAll('[data-draggable="item"]'), 
    len = items.length, 
    i = 0; i < len; i ++)
  {
    items[i].setAttribute('draggable', 'true');
  }



  //variable for storing the dragging item reference 
  //this will avoid the need to define any transfer data 
  //which means that the elements don't need to have IDs 
  var item = null;

  //dragstart event to initiate mouse dragging
  document.addEventListener('dragstart', function(e)
  {
    //set the item reference to this element
    item = e.target;
    
    //we don't need the transfer data, but we have to define something
    //otherwise the drop action won't work at all in firefox
    //most browsers support the proper mime-type syntax, eg. "text/plain"
    //but we have to use this incorrect syntax for the benefit of IE10+
    e.dataTransfer.setData('text', '');
  
  }, false);

  //dragover event to allow the drag by preventing its default
  //ie. the default action of an element is not to allow dragging 
  document.addEventListener('dragover', function(e)
  {
    if(item)
    {
      e.preventDefault();
    }
  
  }, false);  

  //drop event to allow the element to be dropped into valid targets
  document.addEventListener('drop', function(e)
  {
    //if this element is a drop target, move the item here 
    //then prevent default to allow the action (same as dragover)
    if(e.target.getAttribute('data-draggable') == 'target')
    {
      e.target.appendChild(item);
      
      e.preventDefault();
    }
  
  }, false);
  
  //dragend event to clean-up after drop or abort
  //which fires whether or not the drop target was valid
  document.addEventListener('dragend', function(e)
  {
    item = null;
  
  }, false);

})(); 
  
</script>


<form action="fib.php" method="post">
<div>
<button type="submit" name="button" value="button2" class="button">Previous</button>
<button type="submit" name="button" value="button1" class="button">Next</button>
<input type="hidden" name="counter" value="<?php print $counter; ?>" />
</div>
</form>		
</div>
</div>

<script src="../../js/popup.js"></script>
<script src="../../js/drag.js"></script>

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
</html>