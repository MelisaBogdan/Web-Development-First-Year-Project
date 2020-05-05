
// function clears out everything inside the text and title box
function clearAll() {
	var yesno=confirm("Do you want to clear everything?");
	if(yesno==true) {
		document.getElementById("title").value = "";
		document.getElementById("message").value = "";
     }
}
function ff() { 
   window.location.assign("login.html");
}

function redirect(){ 
	window.location.assign("addPost.html");
}
function goBackToWebsite(){
	window.location.assign("index.php");
}
function logout(){
	window.location.assign("logout.php");
}
function viewPost() { 
   window.location.assign("preview.php");
}