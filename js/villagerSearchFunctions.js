//variations of card search
$(function(){
	//name search
	$("#typeSearch").click(function(){
		//set variables
		var name = $("input#animalType").val();
		//name can't be blank or null
		if(name == ""){
			$('.errormess').html('You must enter a type name.');
		}	
		//get card
		sendType(name);
	});
	//type search
	$("#personalitySearch").click(function(){
		//set variables
		var name = $("input#personality").val();
		//type can't be blank or null
		if(name == ""){
			$('.errormess').html('You must enter a personality type.');
		}
		//http://api.mtgdb.info/cards/?types=
		sendPersonality(name);
	});
	//color search
	$("#allVillagers").click(function(){
		//set variables
		sendAll();

	});
	//badge search
	$("#allBadges").click(function(){
		//set variables
		badgeAll();

	});
});


function sendType(name){
	//redirect
	$.ajax({
		type: "POST",
		url: "villagerRedirectT.php",
		data: 'animalType='+ name,
		dataType: "html",
		success: function(data){
			if(data == 0){
				$('.errormess').html('Could not redirect to results.'); 
			}
			else{
				//redirect
				document.location.href = 'displayResult.php'; 
			}
		}
	});
	
}


function sendPersonality(name){
	//redirect
	$.ajax({
		type: "POST",
		url: "villagerRedirectP.php",
		data: 'personality='+ name,
		dataType: "html",
		success: function(data){
			if(data == 0){
				$('.errormess').html('Could not redirect to results.'); 
			}
			else{
				//redirect
				document.location.href = 'displayResult.php'; 
			}
		}
	});
	
}

function sendAll(){
	//redirect
	$.ajax({
		type: "POST",
		url: "villagerRedirectA.php",
		data: 'all='+ 'true',
		dataType: "html",
		success: function(data){
			if(data == 0){
				$('.errormess').html('Could not redirect to results.'); 
			}
			else{
				//redirect
				document.location.href = 'displayResult.php'; 
			}
		}
	});
	
}

function badgeAll(){
	//redirect
	$.ajax({
		type: "POST",
		url: "badgeRedirectA.php",
		data: 'badge='+ 'true',
		dataType: "html",
		success: function(data){
			if(data == 0){
				$('.errormess').html('Could not redirect to results.'); 
			}
			else{
				//redirect
				document.location.href = 'displayResult.php'; 
			}
		}
	});
	
}