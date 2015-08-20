//variations of card search
$(function(){
	//name search
	$("#addVillager").click(function(){
		//set variables
		var name = $("input#vName").val();
		var type = $("input#vType").val();
		var personality = $("input#vPersonality").val();
		var bday = $("input#vBday").val();
		//name can't be blank or null
		if(name == ""){
			$('.errormess').html('You must enter a type name.');
		}	
		//get card
		newVillager(name, type, personality, bday);
	});
	//type search
	$("#addBadge").click(function(){
		//set variables
		var badge = $("input#bName").val();
		//type can't be blank or null
		if(badge == ""){
			$('.errormess').html('You must enter a personality type.');
		}
		//http://api.mtgdb.info/cards/?types=
		newBadge(badge);
	});
});



function newVillager(name, type, personality, bday){
	//redirect
	$.ajax({
		type: "POST",
		url: "newVillager.php",
		data: "name="+ name + "&type=" + type + "&personality="+ personality+ "&bday="+ bday,
		dataType: "html",
		success: function(data){
			if(data == 0){
				$('.errormess').html('Could not redirect to results.'); 
			}
			else{
				//redirect
				$('.errormess').html('New Villager submitted.  If it is a duplicate, no copy has been made.')
			}
		}
	});
	
}


function newBadge(badge){
	//redirect
	$.ajax({
		type: "POST",
		url: "newBadge.php",
		data: 'badge='+ badge,
		dataType: "html",
		success: function(data){
			if(data == 0){
				$('.errormess').html('Could not redirect to results.'); 
			}
			else{
				//redirect
				$('.errormess').html('New badge submitted.  If it is a duplicate, no copy has been made.')
			}
		}
	});
	
}