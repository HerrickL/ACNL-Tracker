//iterate through delete buttons, creating click functions
var buttons = document.getElementsByName("delete");
var stop = false;
for(i=0; i< buttons.length; i++){
	buttons[i].onclick = function(){
		var stop = true;
		var name = this.id;
		console.log(name);
		//ajax, delete
		$.ajax({
			type: "POST",
			url: "deleteVillager.php",
			data: 'villagerName='+ name,
			dataType: "html",
			success: function(data){
				if(data == 0){
					$('.errormess').html('Could not delete this villager from your list.'); 
				}
				else{
					//redirect to home page
					document.location.href = 'userHome.php'; 
				}

			}
		});
	}
}
