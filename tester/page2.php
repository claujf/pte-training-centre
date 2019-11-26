<?php

$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
$query = "SELECT * FROM s_asq";

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
$q= "SELECT * from s_asq where asq_id = '$idnum[0]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');

$line = mysqli_fetch_array($result2);


if (!empty($_POST['button'])){
switch ($_POST['button']){
case 'button1':
$counter = ($_POST['counter']);

$counter = $counter +1;
if ($counter > (count($idnum)-1)) { $counter = ((count($idnum)-1));}
$q= "select * from s_asq where asq_id = '$idnum[$counter]'";
$result2 = mysqli_query($con,$q) or die('Query failed: ');
break;
case 'button2':
$counter = ($_POST['counter']);

$counter = $counter -1;

if ($counter < 0){ $counter =0;}
$q= "select * from s_asq where asq_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button3':
// pressed first
$counter = 0;

$q= "select * from s_asq where asq_id = '$idnum[$counter]'";

$result2 = mysqli_query($con,$q) or die('Query failed: ');

break;
case 'button4':
//pressed last
$counter = (count($idnum)-1) ;


$q= "SELECT * FROM  s_asq where asq_id = '$idnum[$counter]'";

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
echo "<p>Click next to start your practice </p>";
echo "<table>\n";
echo "\t<tr>\n";
$column = mysqli_fetch_row($result2);
echo "\t\t<td>$column[0]</td>\n";
echo "\t\t<td>$column[2]</td>\n";
echo "\t\t<td>$column[3]</td>\n";

echo "\t</tr>\n";
echo "</table>\n";
}
else echo "Record not found.\n";
mysqli_free_result($result2);
mysqli_close($con);
?>


<form action="page2.php" method="post">
<div>
<button type="submit" name="button" value="button2">Previous</button>
<button type="submit" name="button" value="button1">Next</button>
<button type="submit" name="button" value="button3">First</button>
<button type="submit" name="button" value="button4">Last</button>
<input type="hidden" name="counter" value="<?php print $counter; ?>" />
</div>
</form>
