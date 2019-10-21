var x = document.getElementById("player");
var seconds = document.getElementById("countdown").textContent;


document.getElementById("trigger").addEventListener("click",function(){
	var context = new AudioContext();
})

var countdown = setInterval(function(){
    seconds--;
    document.getElementById("countdown").textContent = seconds;
    if (seconds <= 0) {
    	clearInterval(countdown);
    	
    	x.load();
    	x.play();
    }
},1000);   

/* let time = 5;

btn.onlick = e => {
	x.play().then (() => {
	x.pause();
	x.currentTime = 0;
	});
	countdown();
};

function countdown() {
	pre.textContent = --time;
	if (time===0) return onend();
	setTimeout(countdown,1000);
}

function onend(){
	audio.play();
	time=5;
}

// html code here 
<button id="btn">start countdown</button><br>
<pre id="pre"></pre>

/*