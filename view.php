<?php 

if($_POST['submit'] && $_POST['submit'] != 0)
{
   $animal=$_POST['animal'];
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Tesitng</title>
 </head>
 <body>
 <select id="animal" name="animal">                      
  <option value="0">--Select Animal--</option>
  <option value="Cat">Cat</option>
  <option value="Dog">Dog</option>
  <option value="Cow">Cow</option>
</select>
 </body>
 </html>