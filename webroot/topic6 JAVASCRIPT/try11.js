// JavaScript source code
function altRows(id)
{
	if(document.getElementsByTagName){  

		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 

		for(i = 0; i < 7; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	  }
	 }
	 window.onload=function(){
	altRows('alternatecolor');
 }
