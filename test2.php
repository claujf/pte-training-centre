<?php
$counter = isset($_POST['counter']) ? $_POST['counter'] : 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST["next"])){
        $counter++;
        echo $counter;
    }

    if(isset($_POST["prev"])){
    	$counter--;
    	echo $counter;
    }
}
 $db = mysqli_connect('localhost','root','root','asq')
 or die('Error connecting to MySQL server.');

$query = "SELECT * FROM asq";
$array = array();

mysqli_query($db,$query) or die ('Error query database');

$result = mysqli_query($db,$query);

while($row = mysqli_fetch_array($result)){
	$array[] = $row; // store the database values in array
}


echo $array[$counter]['path'] . '<br/>';
echo $array[$counter]['name'] . '<br/>';

$audiomp3 = $array[$counter]['path'];
echo $audiomp3;

$element = "";
$element .= "<audio controls>";
$element .= "<source src = '$audiomp3' type = 'audio/mpeg'>";
$element .= "Your browser does not support audio element";
$element .= "</audio>";

echo $element . '<br/>';
?>





<!DOCTYPE html>
<html>
<head>
	<title>test 2</title>
</head>
<body>
<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = post>
    <input type = "submit" name = "next" value = "Submit" >
    <input type = "submit" name = "prev" value = "Previous">
    <input type = "hidden" name = "counter" value = "<?php print $counter; ?>"/>
</form>
</body>
</html>