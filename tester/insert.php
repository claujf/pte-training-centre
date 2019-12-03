<?php

$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
/*
$asq_id = (isset($_GET['asq_id']) ? intval($_GET['asq_id']) : 1); // suppose you know that '1' is the first id in your table


*/

if(isset($_POST['id'])) {
	$id = $_POST['id'];
} else {
	$id = 1;
}

$query = "SELECT * FROM s_asq WHERE asq_id = '$id'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result); // this is the row you're gonna display in the form
$row2 = mysqli_fetch_assoc($result); // this will tell us about the next row



?>


<form action="insert.php" method="post">
Path: <?php print('<input type="text" name="path" value="' . $row['path'] . '"/><br>')?>
Trnascript: <?php print('<input type="text" name="transcript" value="' . $row['asq_transcript'] . '"/><br>')?>
Answer: <?php print('<input type="text" value="' . $row['asq_answer'] . '"/><br>')?>

<!--
Postal Code: <?php print('<input type="text" value="' . $row['postal_code'] . '"/><br>')?>
Website: <?php print('<input type="text" value="' . $row['website'] . '"/><br>')?>
Email 1: <?php print('<input type="text" value="' . $row['email1'] . '"/><br>')?>
Contact number 1: <?php print('<input type="text" value="' . $row['phone1'] . '"/><br>')?>
-->

<input type='hidden' name='id' value='<?php echo $id++;?>' />
<input type = submit value="Next Question" />

</form>