	<?php
	$dbh = new PDO("mysql:host=localhost;dbname=asq","root","root");
	if(isset($_POST['btn'])){
		$name = $_FILES['myfile']['name']; //might need to change (match with database)
		$type = $_FILES['myfile']['type'];
		$data = file_get_contents($_FILES['myfile']['tmp_name']);
		$stmt = $dbh->prepare("insert into myblob values('',?,?,?)");
		$stmt->bindParam(1,$name);
		$stmt->bindParam(2,$type);
		$stmt->bindParam(3,$data);
		$stmt->execute();
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta charset="utf-8"/>
</head>
<body>
	<form method="POST" enctype="multipart/form-data">
		<input type="file" name="myfile"/>
		<button name="btn">Upload</button>
<p></p>
<ol>
	<?php
	$stat = $dbh->prepare("select * from asq");
	$stat->execute();
	while($row = $stat->fetch()){
		echo "<li><a target='_blank' href='view.php?id=".$row['id']."'>".$row['name']."</a><br/><embed src = 'data:".$row['mime'].";base64,".base64_encode($row['data'])."' width ='200'/></li>";
	}
	?>
</ol>	
</body>
</html>