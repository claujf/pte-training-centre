<?php
if(isset($_GET['id'])){
  require_once __DIR__ . "/db.php";
  $sql = $dbh->prepare("SELECT `submission`, LENGTH(`submission`) FROM `results` WHERE `id` = ?");
  $sql->execute(array($_GET['id']));
  $result = $sql->fetch();

  $audio = $result[0];
  $size = $result[1];
 
  header("Content-Length: $size");
  header("Content-Type: audio/wav");
  echo $audio;
}