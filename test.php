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
<br>

<?php
$query = "SELECT * FROM asq";
$array = array();

mysqli_query($db,$query) or die ('Error query database');

$result = mysqli_query($db,$query);

while($row = mysqli_fetch_array($result)){
	$array[] = $row; // store the database values in array
}
$counter = 0;
echo $array[$counter]['question'] . '<br/>';

$counter = isset($_POST['counter']) ? $_POST['counter'] : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["next"])){
        $counter++;
        echo $counter;
    }
}
//echo $array[3]['question']; // print value based on index of the array

/*
while ($row = mysqli_fetch_array($result)){
	echo $row['id'] . ' ' . $row['question'] . $row['ans'] . ' ' . $row['comment'] .'<br/>';
}
*/
mysqli_close($db);
?>

<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = post>
    <input type = "submit" name = "button" value = "Submit" >
    <input type = "hidden" name = "counter" value = "<?php print $counter; ?>"; />
</form>

 <button id="myBtn"> Next</button>
<br>
</body>
</html>