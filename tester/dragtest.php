<?php
$con = mysqli_connect("localhost","root","root","pte_db");
if (!$con){
die("Can not connect: " . mysqli_error());
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>test</title>

<style>

/* canvas styles */
html, body
{
	font:normal normal normal 100%/1.4 tahoma, sans-serif;
	background:#f9f9f9;
	color:#000;
}
body
{
	font-size:0.8em;
}

/* draggable targets */
[data-draggable="target"]
{
	list-style-type:none;
	display: inline-block;
	
	width:85px;
	height:30px;
	overflow-y:auto;
	
	margin:0 0.5em 0.5em 0;
	padding:0.5em;
	
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
<body>


<?php
	$query = "SELECT * FROM r_fib";
	mysqli_query($con,$query) or die ('error r_fib query');
	$result = mysqli_query($con,$query);
	$column = mysqli_fetch_row($result);

	echo "<table>\n";
	echo "\t<tr>\n";
	echo "\t\t<th>$column[0] . $column[1]</th>";
	echo "</br>";
	echo "</tr>";
	echo "</table>";

    
	echo "\t\t$column[2]" ;

	echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

	echo "\t\t$column[3]";

	echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

	echo "\t\t$column[4]";

	echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

	echo "\t\t$column[5]";
	echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

	echo "\t\t$column[6]";
	echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

	echo "\t\t$column[7]";
	echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

	echo "\t\t$column[8]";
	echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

	echo "\t\t$column[9]";
	echo "<div data-draggable='target'><div data-draggable='item'></div></div>";

	echo "\t\t$column[10]";
	echo "\t\t$column[11]";

	echo "<br><br>";

	echo "<div data-draggable='target'><div data-draggable='item'>$column[12]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[13]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[14]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[15]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[16]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[17]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[18]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[19]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[20]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[21]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[22]</div></div>";
	echo "<div data-draggable='target'><div data-draggable='item'>$column[23]</div></div>";

	echo "</tr>";
	echo "</table>"

	
?>


<!--
<div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
  <p draggable="true" ondragstart="drag(event)" id="drag1"> Draggable text </p>
</div>
<div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
-->

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

<script src="drag.js"></script>

</body>
</html>