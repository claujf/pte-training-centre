var myText = document.getElementById("text");
var wordCount = document.getElementById("wordCount");

myText.addEventListener("keyup",function(){
	var characters = myText.value.split(' ');
  wordCount.innerText = characters.length-1;
});