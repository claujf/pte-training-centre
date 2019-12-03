<?php

print_r($_FILES); //this will print out the received name, temp name, type, size, etc.
$size = $_FILES['audio_data']['size']; //the size in bytes
$input = $_FILES['audio_data']['tmp_name']; //temporary name that PHP gave to the uploaded file
$output = $_FILES['audio_data']['name'].".wav"; //letting the client control the filename is a rather bad idea
//move the file from temp name to local folder using $output name

move_uploaded_file($input, $output)

/*

$file_name = $_FILES['audio_data']['name'];

if($_FILES['audio_data']['type']=='audio/mpeg' || $_FILES['audio_data']['type']=='audio/mpeg3' || $_FILES['audio_data']['type']=='audio/x-mpeg3' || $_FILES['audio_data']['type']=='audio/mp3' || $_FILES['audio_data']['type']=='audio/x-wav' || $_FILES['audio_data']['type']=='audio/wav')
{ 
 $new_file_name=$_FILES['audio_data']['name'];

 // Where the file is going to be placed
 $target_path = "../audio/".$new_file_name;
 
 //target path where u want to store file.

 //following function will move uploaded file to audios folder. 
if(move_uploaded_file($_FILES['audio_data']['tmp_name'], $target_path)) {

 //insert query if u want to insert file
}
}
/*
?>