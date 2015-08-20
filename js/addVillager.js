//iterate through delete buttons, creating click functions
var buttons = document.getElementsByName("add");
var stop = false;
for(i=0; i< buttons.length; i++){
	buttons[i].onclick = function(){
		var stop = true;
		var name = this.id;
		//ajax, delete
		$.ajax({
			type: "POST",
			url: "addVillager.php",
			data: 'villagerName='+ name,
			dataType: "html",
			success: function(data){
				if(data == 0){
					$('.errormess').html('Could not add this villager from your list.'); 
				}
				else{
					//redirect to home page
					document.location.href = 'userHome.php'; 
				}

			}
		});
	}
}

//iterate through delete buttons, creating click functions
var buttons = document.getElementsByName("badd");
var stop = false;
for(i=0; i< buttons.length; i++){
	buttons[i].onclick = function(){
		var stop = true;
		var name = this.id;
		//ajax, delete
		$.ajax({
			type: "POST",
			url: "addBadge.php",
			data: 'badgeName='+ name,
			dataType: "html",
			success: function(data){
				if(data == 0){
					$('.errormess').html('Could not add this badge from your list.'); 
				}
				else{
					//redirect to home page
					document.location.href = 'userHome.php'; 
				}

			}
		});
	}
}