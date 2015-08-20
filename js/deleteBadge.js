var buttons = document.getElementsByName("bdelete");
var stop = false;
for(i=0; i< buttons.length; i++){
	buttons[i].onclick = function(){
		var stop = true;
		var bname = this.id;
		console.log(bname);
		//ajax, delete
		$.ajax({
			type: "POST",
			url: "deleteBadge.php",
			data: 'badgeName='+ bname,
			dataType: "html",
			success: function(data){
				if(data == 0){
					$('.errormess').html('Could not delete this badge from your list.'); 
				}
				else{
					//redirect to home page
					document.location.href = 'userHome.php'; 
				}

			}
		});
	}
}