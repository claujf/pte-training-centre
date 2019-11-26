<html>
<head>
</head>
<body>
<?php
$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}



$query ="SELECT * FROM s_asq";

mysqli_query($con,$query) or die ('Error query database'); 

if(isset($_POST['update'])){
$UpdateQuery = "UPDATE s_asq SET asq_answer ='$_POST[answer]', asq_transcript='$_POST[transcript]', path='$_POST[path]' WHERE asq_id='$_POST[hidden]'";               
mysqli_query($con,$UpdateQuery);
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM s_asq WHERE asq_id='$_POST[hidden]'";          
mysqli_query($con, $DeleteQuery);
};

if(isset($_POST['add'])){
$AddQuery = "INSERT INTO s_asq (path, asq_transcript, asq_answer) VALUES ('$_POST[upath]','$_POST[utranscript]','$_POST[uanswer]')";         
mysqli_query($con,$AddQuery);
};


$myData = mysqli_query($con,$query);
echo "<table border=1>
<tr>
<th>Path</th>
<th>Transcript</th>
<th>Answer</th>
</tr>";
while($record = mysqli_fetch_array($myData)){
echo "<form action=mydata5.php method=post>";
echo "<tr>";
echo "<td>" . "<input type=text name=path value='" . $record['path'] . "' </td>";
echo "<td>" . "<input type=text name=transcript value='" . $record['asq_transcript'] . "' </td>";
echo "<td>" . "<input type=text name=answer value='" . $record['asq_answer'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden value='" . $record['asq_id'] . "' </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "<form action=mydata5.php method=post>";
echo "<tr>";
echo "<td><input type=text name=upath></td>";
echo "<td><input type=text name=utranscript></td>";
echo "<td><input type=text name=uanswer></td>";
echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "</tr>";
echo "</form>";
echo "</table>";
mysqli_close($con);

?>
</body>
</html>