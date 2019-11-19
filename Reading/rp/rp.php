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

  <title>Reorder Paragraph</title>

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
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Reorder Paragraph</a>
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
              <a href="../r_fib/r_fib.html">Reading:Fill in the blanks</a>
              <a href="../rw_fib/fib.html">Reading&Writing:Fill in the blanks</a>
              <a>Reorder Paragraph</a>
              <a href="../r_mcma/r_mcma.html">Reading:Multiple Choice Multiple Answers</a>
              <a href="../r_mcsa/r_mcsa.html">Reading:Multiple Choice Single Answer</a>
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
                <a href="../../Writing/we/we.html">Write Essay</a>
              </div>
            </div>
          </li>  
        </ul>
      </div>
    </div>
  </nav>
<body>

	<!-- Task and description -->
<p>Re-order Paragraphs</p>
  <!-- # Item number and item Title -->
  
  <!-- Timer -->
  <div>Remaining 
  <span id="time"></span> 
  <script src="timer60_sec.js"> </script>
  </div>
 </br></br>
  <!-- questions -->
 <div class="container">
  <div class="row">
    <div class="column">
      <ul class="connected-sortable droppable-area1">
        <li class="draggable-item">Item 1</li>
        <li class="draggable-item">Item 2</li>
        <li class="draggable-item">Item 3</li>
        <li class="draggable-item">Item 4</li>
        
      </ul>
    </div>
    
    <div class="column">
      <ul class="connected-sortable droppable-area2">
        <li class="draggable-item"></li>
        
      </ul>
    </div>
  </div>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
 <script src="script.js"></script>
 </body>
</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>



  <!-- Submit, next, previous button -->
  <input type="submit" class="button1" value="Submit"> 
  <button class="button1" type="button" ng-click="display = !display" >Answer</button> 
  <a href="#" class="previous round">&#8249;</a>
  <a href="#" class="next round">&#8250;</a>
 
 <!-- Search question no -->
  <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Search</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="#about">1</a>
    <a href="#base">2</a>
    <a href="#blog">3</a>
  </div>
  </div>
<script src="search_btn.js"></script>

  </head>
</html>