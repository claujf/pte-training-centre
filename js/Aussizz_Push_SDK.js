var users = detect.parse(navigator.userAgent);
var browserInfo = users.browser.family + "|" + users.browser.version + "|" + users.os.name;
var config = {
	apiKey: "AIzaSyA2yK4iKUQqrFTXMUKK1E6VsHsexpWjm6Q",
	authDomain: "mynotifications-152106.firebaseapp.com",
	databaseURL: "https://mynotifications-152106.firebaseio.com",
	storageBucket: "mynotifications-152106.appspot.com",
	messagingSenderId: "176560971854"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();
messaging.requestPermission()
.then(function () {
	console.log('Notification permission granted.');
	return messaging.getToken();
})
.then(function (token) {
	userTokenRegister(token, 'sub');
	console.log(token);
})
.catch(function (err) {
	var x = readCookie('_setBrowserUnSubNoty');
	console.log(x);
	if (x == null) {
		console.log(x);
		createCookie('_setBrowserUnSubNoty', '1', 365);
		userTokenRegister('', 'unsub');
	}
	console.log('Unable to get permission to notify.', err);
});
function userTokenRegister(o, u) {
	var w = location.protocol + '//' + location.hostname + (location.port ? ':' + location.port : '');
	$.ajax({
		type: "POST",
		url: "https://fly365.com.au/NewPushApi/api/v1/usertokenregister",
		data: "{'ApiToken':'" + o + "','WebsiteName':'" + w + "','IpAddress':'" + userip + "','Action':'" + u + "','BrowserInfo':'" + browserInfo + "'}",
		contentType: "application/json; charset=utf-8",
		datatype: "json",
		async: false,
		success: function (o)
		{ console.log(o.d); },
		failure: function (o) {
			console.error("Error sending subscription to server:");
		}
	});
}
function createCookie(name, value, days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + value + expires + "; path=/";
}
function eraseCookie(name) {
	createCookie(name, null, -1);
}
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i]; while (c.charAt(0) == ' ')
			c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0)
			return c.substring(nameEQ.length, c.length);
	} return null;
}