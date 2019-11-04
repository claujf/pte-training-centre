<?php
//Step1
 $db = mysqli_connect('localhost','root','root','asq')
 or die('Error connecting to MySQL server.');
?>

<!-- If connection succeed <h1> content below should be displayed, error message otherwise -->

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL</h1>
 <button id="myBtn"> Next</button>
<br>
<?php
$query = "SELECT * FROM asq";
mysqli_query($db,$query) or die ('Error query database');
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result);
echo $row['id'] . ' ' . $row['question'] . '<br/>';
echo $row['id'] . ' ' . $row['question'] . '<br/>';
mysqli_close($db);
?>

</body>
</html>