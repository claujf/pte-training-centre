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
              <a>Reading:Fill in the blanks</a>
              <a href="rwfib.php">Reading&Writing:Fill in the blanks</a>
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
<body>
<div class="section"> 
<div align="justify">
<h5>In the text below some words are missing. Drag words from the box below to the appropriate place in the text. To undo an answer choice, drag the word back to the box below the text.</h5>


<?php
      $query = "SELECT * FROM r_fib";
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

  <span class = "Sentence">  
  <?php echo $array[$counter]['r_fib_part1'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part2'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part3'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part4'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part5'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part6'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part7'] ?> 
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part8'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part9'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>
    <?php echo $array[$counter]['r_fib_part10'] ?>
  <div data-draggable='target'><div data-draggable='item'></div></div>

<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word1'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word2'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word3'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word4'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word5'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word6'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word7'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word8'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word9'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word10'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word11'] ?></div></div>
<div data-draggable='target'><div data-draggable='item'><?php echo $array[$counter]['r_fib_word12'] ?></div></div>



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

<div class="popup" onclick="popupMsg()"> Answer 
									<span class="popuptext" id="myPopup">
										<?php echo "\t\t<td>$column[24]</td>\n";
										?>
									</span>
							</div>	

<br><br>

<script src="../js/popup.js"></script>
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


<form action="rfib.php" method="post">
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