<?php
$db = mysqli_connect('localhost','root','root','asq') or die ('Error connecting to MYSQL Server.');

$counter = 0;

$query = "SELECT * FROM asq";
$array = array();

mysqli_query($db,$query) or die ('Error query database');

$result = mysqli_query($db,$query);

while ($row = mysqli_fetch_array($result)){
	$audiomp3 = $array[$counter]['path'];
	echo $audiomp3;

	//$array[] = $row;
	$element = "";
	$element .= "<audio controls>";
	$element .= "<source src = '$audiomp3' type = 'audio/mpeg'>";
	$element .= "Your browser does not support audio element";
	$element .= "</audio>";

	echo $element . '<br/>';
	$counter++;
}
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
    <input type = "hidden" name = "counter" value = "<?php print $counter; ?>"; />
</form>
</body>
</html>