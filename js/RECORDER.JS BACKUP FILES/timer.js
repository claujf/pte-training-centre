var prepCounter; // preparation time 3 seconds
var count; // answer time 40 seconds
var myTimer;
var prepCount;


function prepTimer(){
	prepCounter = 4;
	count = 41;
	prepCount = setInterval(startTimer,1000);
	function startTimer(){
		prepCounter--;
		if (prepCounter <= 0 ){
		clearInterval(prepCount);
		document.getElementById("timer").innerHTML = "Start Now";
		myTimer = setInterval(secondTimer,1000);
		secondTimer(counter);
		return;
		}
		document.getElementById("timer").innerHTML = prepCounter + " secs"; 
		startButton.disabled= true;

	document.getElementById("timer").innerHTML = prepCounter + " secs";
	startButton.disabled = true;
}
}

function secondTimer(counter)
{
	count--;
    if(count <= 0)
    {
    	clearInterval(myTimer);
	// do something here when timer ends
    	document.getElementById("secondTimer").innerHTML= "TIMES UP";
 	    return;
 	}
	
	document.getElementById("secondTimer").innerHTML = count + " secs";
} 