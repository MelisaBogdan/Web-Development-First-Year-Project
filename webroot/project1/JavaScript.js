
// function clears out everything inside the text and title box
function clearAll() {
	var yesno=confirm("Do you want to clear everything?");
	if(yesno==true) {
		document.getElementById("title").value = "";
		document.getElementById("post").value = " ";
     }
}
function goToBlog() { 
   window.location.assign("viewBlog.php");
}
function ff() { 
   window.location.assign("login.html");
}
function goToMenu() { 
   window.location.assign("centralMenu.php");
}
function redirectMenuAdmin(){ 
	window.location.assign("menu.html");
}
function redirectMenuUser(){ 
	window.location.assign("menuUser.html");
}
function redirect(){ 
	window.location.assign("addPost.html");
}
function goBackToWebsite(){
	window.location.assign("myWebsite.html");
}
function logout(){
	window.location.assign("logout.php");
}
//#function viewPost() { 
//	window.location.assign("preview.php");
//}
 function preventDefault() {
	  var fieldTitle = document.forms["blog"]["title"].value;
	  var fieldPost = document.forms["blog"]["text"].value;
	  // when both fields are empty
	  if( (fieldTitle== "" || fieldTitle == null) && (fieldPost== "" || fieldPost == null) ){
		alert("Both fields are missing.");
		return false;
	  }
	  //when the title is empty
	  if (fieldTitle== "" || fieldTitle == null) {
		alert("The TITLE filed is missing.");
		return false; // exit function
	  }
	  //when the post text is empty
	  if (fieldPost== "" || fieldPost == null) {
		alert("The BODY filed is missing.");
		return false;
  }
  
 
}